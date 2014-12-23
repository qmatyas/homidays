<?php

// Vérification des droits d'accès de la page
if (utilisateur_est_connecte()) {

	// On affiche la page d'erreur comme quoi l'utilisateur est déjà connecté   
	include CHEMIN_VUE_GLOBALE.'erreur_deja_connecte.php';
	
} 

else {

// Création d'un tableau des erreurs
$erreurs_inscription = array();


// Validation des champs suivant les règles en utilisant les données du tableau $_POST
if ($form_inscription->is_valid($_POST)) {
    // On vérifie si les 2 mots de passe correspondent
    if ($form_inscription->get_cleaned_data('pass') != $form_inscription->get_cleaned_data('pass_verif')) {

        $erreurs_inscription[] = "Les deux mots de passes entrés sont différents !";
    }

    // Si d'autres erreurs ne sont pas survenues
    if (empty($erreurs_inscription)) {
        
        // Ne pas oublier d'inclure la librarie Form
        include CHEMIN_LIB . 'form.php';

        // "formulaire_inscription" est l'ID unique du formulaire
        $form_inscription = new Form('formulaire_inscription');

        $form_inscription->method('POST');

        $form_inscription->add('Text', 'nom')
                ->label("Nom :");

        $form_inscription->add('Text', 'prenom')
                ->label("Prénom :");

        $form_inscription->add('Checkbox', 'sexe')
                ->label("Sexe :");

        $form_inscription->add('Date', 'date_naissance')
                ->label("Date de naissance :");

        $form_inscription->add('Text', 'profession')
                ->label("Profession :");

        $form_inscription->add('File', 'carte_ID')
                ->filter_extensions('jpg', 'png', 'gif')
                ->max_size(8192) // 8 Kb
                ->label("Copie Carte ID :")
                ->Required(false);

        $form_inscription->add('Email', 'email')
                ->label("Adresse email :");

        $form_inscription->add('Number', 'tel')
                ->label("Numéro de téléphone :");

        $form_inscription->add('Text', 'rue')
                ->label("Rue :");

        $form_inscription->add('Number', 'code_postal')
                ->label("Code postal :");

        $form_inscription->add('Text', 'ville')
                ->label("Ville :");

        $form_inscription->add('Text', 'pays')
                ->label("Pays :");

        $form_inscription->add('Text', 'pseudo')
                ->label("Pseudo :");

        $form_inscription->add('Password', 'pass')
                ->label("Mot de passe :");

        $form_inscription->add('Password', 'pass_verif')
                ->label("Mot de passe (vérification) :");

        $form_inscription->add('File', 'avatar')
                ->filter_extensions('jpg', 'png', 'gif')
                ->max_size(8192) // 8 Kb
                ->label("Avatar :")
                ->Required(false);

        $form_inscription->add('Number', 'nb_adulte')
                ->min(0)
                ->label("Adultes :");

        $form_inscription->add('Number', 'nb_enfant')
                ->min(0)
                ->label("Enfants :");

        $form_inscription->add('Textarea', 'interet')
                ->label("Centres d'intérêt :");

        $form_inscription->add('Submit', 'submit')
                ->value("Suivant");

        $form_inscription->add('Reset', 'reset')
                ->value("Annuler");

        // Pré-remplissage avec les valeurs précédemment entrées (s'il y en a)
        $form_inscription->bound($_POST);
    }
    else {

		// On affiche à nouveau le formulaire d'inscription
		include CHEMIN_VUE.'formulaire_inscription.php';
	}

}

else {

	// On affiche à nouveau le formulaire d'inscription
	include CHEMIN_VUE.'formulaire_inscription.php';
}


// Tire de la documentation PHP sur <http://fr.php.net/uniqid>
$hash_validation = md5(uniqid(rand(), true));


// Tentative d'ajout du membre dans la base de donnees
list($nom, $prenom, $sexe, $date_naissance, $profession, $carte_ID, $email, $tel, $rue, $code_postal, $ville, $pays, $pseudo, $pass, $avatar, $nb_adulte, $nb_enfant, $interet) =
	$form_inscription->get_cleaned_data('nom', 'sexe', 'date_naissance', 'profession', 'carte_ID', 'email', 'tel', 'rue', 'code_postal', 'ville', 'pays', 'pseudo', 'pass', 'avatar', 'nb_adulte', 'nb_enfant', 'interet');


// On veut utiliser le modele de l'inscription (~/modeles/inscription.php)
include CHEMIN_MODELE.'inscription.php';


// ajouter_membre_dans_bdd() est défini dans ~/modeles/inscription.php
$id_utilisateurs = ajouter_membre_dans_bdd($nom, $prenom, $sexe, $date_naissance, $profession, $carte_ID, $email, $tel, $rue, $code_postal, $ville, $pays, $pseudo, sha1($pass), $hash_validation, $avatar, $nb_adulte, $nb_enfant, $interet);


// Si la base de données a bien voulu ajouter l'utilisateur (pas de doublons)
if (ctype_digit($id_utilisateurs)) {

	// On transforme la chaine en entier
	$id_utilisateurs = (int) $id_utilisateurs;
	
	// Preparation du mail
	$message_mail = '<html><head></head><body>
	<p>Merci de vous être inscrit sur "mon site" !</p>
	<p>Veuillez cliquer sur <a href="'.$_SERVER['PHP_SELF'].'?module=membres&amp;action=valider_compte&amp;hash='.$hash_validation.'">ce lien</a> pour activer votre compte !</p>
	</body></html>';
	
	$headers_mail  = 'MIME-Version: 1.0'                           ."\r\n";
	$headers_mail .= 'Content-type: text/html; charset=utf-8'      ."\r\n";
	$headers_mail .= 'From: "Homidays" <contact@homidays.com>'      ."\r\n";
	
	// Envoi du mail
	mail($form_inscription->get_cleaned_data('email'), 'Inscription sur <homidays.com>', $message_mail, $headers_mail);
	
	// Redimensionnement et sauvegarde de l'avatar (eventuel) dans le bon dossier
	if (!empty($avatar)) {

		// On souhaite utiliser la librairie Image
		include CHEMIN_LIB.'image.php';
	
		// Redimensionnement et sauvegarde de l'avatar
		$avatar = new Image($avatar);
		$avatar->resize_to(AVATAR_LARGEUR_MAXI, AVATAR_HAUTEUR_MAXI);
		$avatar_filename = 'DOSSIER_AVATAR'.$id_utilisateur .'.'.strtolower(pathinfo($avatar->get_filename(), PATHINFO_EXTENSION));
		$avatar->save_as($avatar_filename);

		// On veut utiliser le modele des membres (~/modeles/membres.php)
		include CHEMIN_MODELE.'membres.php';
		
		// Mise à jour de l'avatar dans la table
		// maj_avatar_membre() est défini dans ~/modeles/membres.php
		maj_avatar_membre($id_utilisateur , $avatar_filename);

	}
        
        // Redimensionnement et sauvegarde de la carte d'identité (eventuelle) dans le bon dossier
	if (!empty($carte_ID)) {

		// On souhaite utiliser la librairie Image
		include CHEMIN_LIB.'image.php';
	
		// Redimensionnement et sauvegarde de la carte d'identité
		$carte_ID = new Image($carte_ID);
		$carte_ID->resize_to(CARTE_ID_LARGEUR_MAXI, CARTE_ID_HAUTEUR_MAXI);
		$carte_ID_filename = 'DOSSIER_CARTE_ID'.$id_utilisateur .'.'.strtolower(pathinfo($carte_ID->get_filename(), PATHINFO_EXTENSION));
		$carte_ID->save_as($carte_ID_filename);

		// On veut utiliser le modele des membres (~/modeles/membres.php)
		include CHEMIN_MODELE.'membres.php';
		
		// Mise à jour de la carte d'identité dans la table
		// maj_carte_ID_membre() est défini dans ~/modeles/membres.php
		maj_carte_ID_membre($id_utilisateur , $carte_ID_filename);

	}
	
	// Affichage de la confirmation de l'inscription
	include CHEMIN_VUE.'inscription_effectuee.php';

// Gestion des doublons
}

else {

	// Changement de nom de variable (plus lisible)
	$erreur =& $id_utilisateur;
	
	// On vérifie que l'erreur concerne bien un doublon
	if (23000 == $erreur[0]) { // Le code d'erreur 23000 siginife "doublon" dans le standard ANSI SQL
	
		preg_match("`Duplicate entry '(.+)' for key \d+`is", $erreur[2], $valeur_probleme);
		$valeur_probleme = $valeur_probleme[1];
		
		if ($nom == $valeur_probleme) {
		
			$erreurs_inscription[] = "Ce nom d'utilisateur est déjà utilisé.";
		
		} 
                
                else if ($email == $valeur_probleme) {
		
			$erreurs_inscription[] = "Cette adresse e-mail est déjà utilisée.";
		
		} 
                
                else {
		
			$erreurs_inscription[] = "Erreur ajout SQL : doublon non identifié présent dans la base de données.";
		}
	
	} 
        
        else {
	
		$erreurs_inscription[] = sprintf("Erreur ajout SQL : cas non traité (SQLSTATE = %d).", $erreur[0]);
	}
	
	// On reaffiche le formulaire d'inscription
	include CHEMIN_VUE.'formulaire_inscription.php';
}

}

