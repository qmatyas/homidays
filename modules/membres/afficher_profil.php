<?php

// Vérification des droits d'accès de la page
if (!utilisateur_est_connecte()) {

	// On affiche la page d'erreur comme quoi l'utilisateur doit être connecté pour voir la page
	include CHEMIN_VUE_GLOBALE.'erreur_non_connecte.php';
	
} 

else {

// Si le paramètre id est manquant ou invalide
if (empty($_POST['id']) or !is_numeric($_POST['id'])) {

	include CHEMIN_VUE.'erreur_parametre_profil.php';} 
        
else {

	// On veut utiliser le modèle des membres (~/modèles/membres.php)
	include CHEMIN_MODELE.'membres.php';
	
	// lire_infos_utilisateur() est défini dans ~/modèles/membres.php
	$infos_utilisateur = lire_infos_utilisateur($_POST['id']);
	
	// Si le profil existe et que le compte est validé
	if (false !== $infos_utilisateur && $infos_utilisateur['hash_validation'] == '') {

		list($nom, $prenom, $sexe, $date_naissance, $profession, $langue, $email, $tel, $rue, $code_postal, $ville, $pays, $pseudo, $pass, $avatar, $nb_adulte, $nb_enfant, $interet, $date_inscription ) = $infos_utilisateur;
		include CHEMIN_VUE.'profil_infos_utilisateur.php';

	} 
        
        else {

		include CHEMIN_VUE.'erreur_profil_inexistant.php';
	}
}

}
