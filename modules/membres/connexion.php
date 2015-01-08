<?php

// Vérification des droits d'accès de la page
if (utilisateur_est_connecte()) {

	// On affiche la page d'erreur comme quoi l'utilisateur est déjà connecté   
	include CHEMIN_VUE_GLOBALE.'erreur_deja_connecte.php';
	
} 

else {


// Ne pas oublier d'inclure la librairie Form
include CHEMIN_LIB.'form.php';

// "formulaire_connexion" est l'ID unique du formulaire
$form_connexion = new Form('formulaire_connexion');

$form_connexion->method('POST');

$form_connexion->add('Text', 'pseudo')
               ->label("Pseudo");

$form_connexion->add('Password', 'pass')
               ->label("Mot de passe");

$form_connexion->add('Checkbox', 'connexion_auto')
               ->label("Connexion automatique")
               ->Required(false);

$form_connexion->add('Submit', 'submit')
               ->value("Se connecter");

// Pré-remplissage avec les valeurs précédemment entrées (s'il y en a)
$form_connexion->bound($_POST);

// Création d'un tableau des erreurs
$erreurs_connexion = array();

// Validation des champs suivant les règles
if ($form_connexion->is_valid($_POST)) {
	
	list($pseudo, $pass) =
		$form_connexion->get_cleaned_data('pseudo', 'pass');
	
	// On veut utiliser le modèle des membres (~/modeles/membres.php)
	include CHEMIN_MODELE.'membres.php';
	
	// combinaison_connexion_valide() est définit dans ~/modeles/membres.php
	$id_utilisateur = combinaison_connexion_valide($pseudo, sha1($pass));
	
	// Si les identifiants sont valides
	if (false !== $id_utilisateur) {

		$infos_utilisateur = lire_infos_utilisateur($id_utilisateur);
		
		// On enregistre les informations dans la session
                $_SESSION['Utilisateur']       = $infos_utilisateur;
		$_SESSION['Utilisateur']['id'] = $id_utilisateur;
                
                // Mise en place des cookies de connexion automatique
		if (false != $form_connexion->get_cleaned_data('connexion_auto'))
		{
			$navigateur = (!empty($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : '';
			$hash_cookie = sha1('aaa'.$pseudo.'bbb'.$pass.'ccc'.$navigateur.'ddd');
			
			setcookie( 'id',            $_SESSION['Utilisateur']['id'], strtotime("+1 year"), '/');
			setcookie('connexion_auto', $hash_cookie,    strtotime("+1 year"), '/');
		}
                
		// Affichage de la confirmation de la connexion
		include CHEMIN_VUE.'connexion_ok.php';
	} 
        
        else {

		$erreurs_connexion[] = "Couple pseudo / mot de passe inexistant.";
                
                // Suppression des cookies de connexion automatique
		setcookie('id', '');
		setcookie('connexion_auto', '');
		
		// On réaffiche le formulaire de connexion
		include CHEMIN_VUE.'formulaire_connexion.php';
	}	
        
        // Vérifications pour la connexion automatique

        // On a besoin du modèle des membres
        

        // Le mec n'est pas connecté mais les cookies sont là, on y va !
        if (!utilisateur_est_connecte() && !empty($_COOKIE['id']) && !empty($_COOKIE['connexion_auto']))
        {
            $infos_utilisateur = lire_infos_utilisateur($_COOKIE['id']);
	
            if (false !== $infos_utilisateur)
                {
                    $navigateur = (!empty($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : '';
                    $hash = sha1('aaa'.$infos_utilisateur['pseudo'].'bbb'.$infos_utilisateur['pass'].'ccc'.$navigateur.'ddd');
		
                    if ($_COOKIE['connexion_auto'] == $hash)
                    {
			// On enregistre les informations dans la session
			$_SESSION['id']     = $_COOKIE['id'];
			$_SESSION['pseudo'] = $infos_utilisateur['pseudo'];
			$_SESSION['avatar'] = $infos_utilisateur['avatar'];
			$_SESSION['email']  = $infos_utilisateur['email'];
                    }
                }
        }
} 

else {

    // On réaffiche le formulaire de connexion
    include CHEMIN_VUE.'formulaire_connexion.php';
}

}
