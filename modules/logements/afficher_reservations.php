<?php


if (!utilisateur_est_connecte()) {
    header('Location: index.php');
} else {
	include_once CHEMIN_MODELE.'disponibilites.php';
	$reservations = reservations_recuperer();
	include CHEMIN_VUE . 'reservations.php';
}