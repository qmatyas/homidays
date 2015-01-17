<?php

if (!utilisateur_est_connecte()) {
	// On affiche la page d'erreur comme quoi l'utilisateur doit être connecté pour voir la page
	include CHEMIN_VUE_GLOBALE . 'erreur_non_connecte.php';
} else {
    include CHEMIN_MODELE.'logements.php';
    include CHEMIN_MODELE.'images.php';

    $logement = logement_recuperer($_GET['id']);
    $quartier = quartier_recuperer($_GET['id']);
    $images = images_recuperer($_GET['id']);

    include CHEMIN_VUE.'profil_logement.php';
}

