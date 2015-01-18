<?php


if (!isset($_GET['id']) || !utilisateur_est_connecte()) {
    header('Location: index.php');
} else {
    $logement_id = $_GET['id'];

    if (!empty($_POST)) {
    	$date_debut = $_POST['date_debut'];
    	$date_fin = $_POST['date_fin'];
    	include_once CHEMIN_MODELE.'disponibilites.php';
    	if (!disponibilites_ajouter($logement_id, $date_debut, $date_fin))
    		header('Location: index.php');
        setFlash('La disponibilité a été correctement ajoutée.');
    }
    include_once CHEMIN_MODELE.'disponibilites.php';
    $disponibilites = disponibilites_recuperer($logement_id);

    include CHEMIN_VUE.'disponibilites.php';
}