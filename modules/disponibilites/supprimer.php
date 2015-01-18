<?php


if (!isset($_GET['id']) || !utilisateur_est_connecte()) {
    header('Location: index.php');
} else {
	include CHEMIN_MODELE.'disponibilites.php';
	if (!disponibilites_supprimer($_GET['id']))
		header('Location: index.php');
	setFlash('Votre disponibilité a été supprimée.');
	redirect();
}