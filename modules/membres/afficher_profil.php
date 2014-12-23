<?php

// Pas de vérification de droits d'accès nécessaire : tout le monde peut voir un profil utilisateur :)

// Si le paramètre id est manquant ou invalide
if (empty($_GET['id']) or !is_numeric($_GET['id'])) {

	include CHEMIN_VUE.'erreur_parametre_profil.php';

} else {

	// On veut utiliser le modèle des membres (~/modules/membres.php)
	include CHEMIN_MODELE.'membres.php';
	
	// lire_infos_utilisateur() est défini dans ~/modules/membres.php
	$infos_utilisateur = lire_infos_utilisateur($_GET['id']);
	
	// Si le profil existe et que le compte est validé
	if (false !== $infos_utilisateur && $infos_utilisateur['hash_validation'] == '') {

		list($nom, $prenom, $sexe, $date_naissance, $profession, $carte_ID, $email, $tel, $rue, $code_postal, $ville, $pays, $pseudo, $avatar, $nb_adulte, $nb_enfant, $interet, $date_inscription ) = $infos_utilisateur;
		include CHEMIN_VUE.'profil_infos_utilisateur.php';

	} else {

		include CHEMIN_VUE.'erreur_profil_inexistant.php';
	}
}
