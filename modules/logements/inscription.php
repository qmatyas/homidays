<?php

// Vérification des droits d'accès de la page
if (utilisateur_est_connecte()) {

	// On affiche la page d'erreur comme quoi l'utilisateur est déjà connecté   
	include CHEMIN_VUE_GLOBALE.'erreur_deja_connecte.php';
	
}

else {

// Ne pas oublier d'inclure la librarie Form
include CHEMIN_LIB.'form.php';

// "formulaire_inscription_offre" est l'ID unique du formulaire
$form_inscription_offre = new Form('formulaire_inscription_offre');

$form_inscription_offre->method('POST');

$form_inscription_offre->add('Text', 'nom')
                 ->label("Nom");

$form_inscription_offre->add('Text', 'rue')
                 ->label("Rue");

$form_inscription_offre->add('Text', 'code_postal')
                 ->label("Code postale");

$form_inscription_offre->add('Text', 'ville')
                 ->label("Ville");

$form_inscription_offre->add('Text', 'pays')
                 ->label("Pays");

$form_inscription_offre->add('File', 'just_log')
                 ->filter_extensions('jpg', 'png', 'gif')
                 ->max_size(8192) // 8 Kb
                 ->label("Justicatif de logement")
                 ->Required(false);

$form_inscription_offre->add('File', 'photo')
                 ->filter_extensions('jpg', 'png', 'gif')
                 //->max_size(8192) // 8 Kb
                 ->label("Photo(s) du logement")
                 ->Required(false);

$form_inscription_offre->add('Text', 'type')
                 ->label("Type");

$form_inscription_offre->add('Text', 'superficie')
                 ->label("Superficie");

$form_inscription_offre->add('Text', 'nb_piece')
                 ->label("Nombre de pièce");

$form_inscription_offre->add('Text', 'nb_chambre')
                 ->label("Nombre de chambre");

$form_inscription_offre->add('Text', 'nb_salle_bain')
                 ->label("Nombre de salle de bain");

$form_inscription_offre->add('Textarea', 'description')
                 ->label("Description");

$form_inscription_offre->add('Textarea', 'point_fort')
                 ->label("Point(s) fort(s)");

$form_inscription_offre->add('Radio', 'activites')
                       ->choices(array(
                                'musee' => 'Musée',
                                'sport' => 'Sport',
                                'parc_attraction' => 'Parc d\'attraction',
                                'shopping' => 'Shopping'
                                ))
                        ->add('Text', 'autre')
                        ->label("Autre");

$form_inscription_offre->add('Textarea', 'restauration')
                 ->label("Restauration");

$form_inscription_offre->add('Radio', 'transports')
                       ->choices(array(
                                'metro' => 'Métro',
                                'velib' => 'Velib',
                                'bus' => 'Bus',
                                'tramway' => 'Tramway'
                                ))
                        ->add('Text', 'autre')
                        ->label("Autre");
            
$form_inscription_offre->add('Radio', 'environnements')
                       ->choices(array(
                                'lac' => 'Lac',
                                'foret' => 'Forêt',
                                'campagne' => 'Campagne',
                                'mer' => 'Mer',
                                'ville' => 'Ville'
                                ))
                        ->add('Text', 'autre')
                        ->label("Autre");

$form_inscription_offre->add('Radio', 'contraintes')
                       ->choices(array(
                                'pas_fumer' => 'Ne pas fumer',
                                'pas_bruit' => 'Pas de bruit après 23h',
                                'pas_enfant' => 'Enfants refusés',
                                'pas_animaux' => 'Animaux refusés'
                                ))
                        ->add('Text', 'autre')
                        ->label("Autre");

$form_inscription_offre->add('Radio', 'services')
                       ->choices(array(
                                'fermer' => 'Fermer la porte à double tour en sortant',
                                'garder_animaux' => 'Garder les animaux domestiques',
                                'arroser_plantes' => 'Arroser les plantes',
                                'discuter_voisine' => 'Discuter avec la vieille voisine',
                                'menage' => 'Faire le ménage avant de quitter le logement'
                                ))
                        ->add('Text', 'autre')
                        ->label("Autre");

$form_inscription_offre->add('Radio', 'options')
                       ->choices(array(
                                'wifi' => 'Accès Wifi',
                                'voiture' => 'Accès à la voiture',
                                'jardin_terrase' => 'Jardin / Terrase',
                                'piscine' => 'Piscine privée',
                                'equipement_sportif' => 'Equipement sportif',
                                'acces_handicape' => 'Accès handicapé'
                                ))
                        ->add('Text', 'autre')
                        ->label("Autre");

$form_inscription_offre->add('Submit', 'submit')
                 ->value("J'enregistre mon offre");

// Pré-remplissage avec les valeurs précédemment entrées (s'il y en a)
$form_inscription_offre->bound($_POST);

// Création d'un tableau des erreurs
$erreurs_inscription_offre = array();

// Tentative d'ajout du membre dans la base de donnees
list($nom, $rue, $code_postal, $ville, $pays, $just_log, $photo, $type, $superficie, $nb_piece, $nb_chambre, $nb_salle_bain, $description, $point_fort, $activites, $restauration, $transports, $environnements, $contraintes, $services, $options) =
	$form_inscription_offre->get_cleaned_data('nom', 'rue', 'code_postal', 'ville', 'pays', 'just_log', 'photo', 'type', 'superficie', 'nb_piece', 'nb_chambre', 'nb_salle_bain', 'description', 'point_fort', 'activites', 'restauration', 'transports', 'environnements', 'contraintes', 'services', 'options');

// On veut utiliser le modele de l'inscription (~/modeles/inscription.php)
include CHEMIN_MODELE.'inscription.php';

// ajouter_logement_dans_bdd() est défini dans ~/modeles/inscription.php
$id_logement = ajouter_logement_dans_bdd($nom, $rue, $code_postal, $ville, $pays, $type, $superficie, $nb_piece, $nb_chambre, $nb_salle_bain, $description, $point_fort, $activites, $restauration, $transports, $environnements, $contraintes, $services, $options);

// Si la base de données a bien voulu ajouter le logement (pas de doublons)
if (ctype_digit($id_logement)) {
    
    // On transforme la chaine en entier
    $id_logement = (int) $id_logement;
    
    // Redimensionnement et sauvegarde du justificatif de logement dans le bon dossier
	if (!empty($just_log)) {

		// On souhaite utiliser la librairie Image
		include CHEMIN_LIB.'image.php';
	
		// Redimensionnement et sauvegarde du justificatif de logement
		$just_log = new Image($just_log);
		$just_log->resize_to('JUST_LOG_LARGEUR_MAXI', 'JUST_LOG_HAUTEUR_MAXI'); 
		$just_log_filename = 'DOSSIER_JUST_LOG'.$id_logement .'.'.strtolower(pathinfo($just_log->get_filename(), PATHINFO_EXTENSION));
		$just_log->save_as($just_log_filename);

		// On veut utiliser le modele des logements (~/modeles/logements.php)
		include CHEMIN_MODELE.'logements.php';
		
		// Mise à jour du justificatif de logement dans la table
		// maj_just_log_logement() est défini dans ~/modeles/logements.php
                maj_just_log_logement($id_logement , $just_log_filename);
        }
        
        // Redimensionnement et sauvegarde de la photo dans le bon dossier
	if (!empty($photo)) {

		// On souhaite utiliser la librairie Image
		include CHEMIN_LIB.'image.php';
	
		// Redimensionnement et sauvegarde de la photo
		$photo = new Image($photo);
		$photo->resize_to('PHOTO_LARGEUR_MAXI', 'PHOTO_HAUTEUR_MAXI'); 
		$photo_filename = 'DOSSIER_PHOTO'.$id_logement .'.'.strtolower(pathinfo($photo->get_filename(), PATHINFO_EXTENSION));
		$photo->save_as($photo_filename);

		// On veut utiliser le modele des logements (~/modeles/logements.php)
		include CHEMIN_MODELE.'logements.php';
		
		// Mise à jour de la photo dans la table
		// maj_photo_logement() est défini dans ~/modeles/logements.php
                maj_photo_logement($id_logement , $photo_filename);
        }
        
        // Affichage de la confirmation de l'inscription
	include CHEMIN_VUE.'inscription_effectuee.php';
    
}

// Gestion des doublons
else {

	// Changement de nom de variable (plus lisible)
	$erreur =& $id_logement;
	
	// On vérifie que l'erreur concerne bien un doublon
	if (23000 == $erreur[0]) { // Le code d'erreur 23000 siginife "doublon" dans le standard ANSI SQL
	
		preg_match("`Duplicate entry '(.+)' for key \d+`is", $erreur[2], $valeur_probleme);
		$valeur_probleme = $erreur[1];
	}
        
        else {
	
		$erreurs_inscription_offre[] = sprintf("Erreur ajout SQL : cas non traité (SQLSTATE = %d).", $erreur[0]);
	}
	
}

}

