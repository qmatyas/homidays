<?php

if (!isset($_GET['id']) || !utilisateur_est_connecte()) {
    header('Location: index.php');
} else {
	include_once CHEMIN_MODELE.'disponibilites.php';
	if (disponibilite_reserver($_GET['id'])) {
		setFlash('Bravo ! Votre réservation est faite.');
	}
	redirect();
}