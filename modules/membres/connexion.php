<?php

// Vérification des droits d'accès de la page
if (utilisateur_est_connecte()) {

	// On affiche la page d'erreur comme quoi l'utilisateur est déjà connecté   
	include CHEMIN_VUE_GLOBALE.'erreur_deja_connecte.php';} 

else {
	if (empty($_POST)) {
			include CHEMIN_VUE.'formulaire_connexion.php';
	} else {
		$erreur = array();
		if (isset($_POST['pseudo']) && !empty($_POST['pseudo'])) {
			if (isset($_POST['pass']) && !empty($_POST['pass'])) {	
                include_once CHEMIN_MODELE.'membres.php';
				try{
                    // combinaison_connexion_valide() est définit dans ~/modeles/membres.php
                    $utilisateur = membre_connecter($_POST['pseudo']);
				}
				catch (PDOException $e) {
					echo "Echec de la connexion à la base de données.\nErreur : " . $e->getMessage();
					include CHEMIN_VUE.'formulaire_inscription.php';
					die();
				}
				// Si les identifiants sont valides
				if ($utilisateur) {
                    if (sha1($_POST['pass']) === $utilisateur['pass']) {
                        // On enregistre les informations dans la session
                        $_SESSION['Utilisateur'] = $utilisateur;  

                        // Affichage de la confirmation de la connexion
                        include 'global/accueil.php';
                    } else {
                        $erreur['form'] = "Couple pseudo / mot de passe inexistant.";
                        // On réaffiche le formulaire de connexion
                        include CHEMIN_VUE.'formulaire_connexion.php';
                    }
				} else {
					$erreur['form'] = "Utilisateur inconnu.";
					// On réaffiche le formulaire de connexion
					include CHEMIN_VUE.'formulaire_connexion.php';
				}
			} else {
				$erreur['pass'] = '';
			}
		} else {
			$erreur['pseudo'] = '';
		}
	}
}