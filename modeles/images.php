<?php

function images_compter ($logement_id = null) {

	$requete = DB::Connect()->prepare('SELECT COUNT(*) FROM images' . ($logement_id ? ' WHERE logement_id=?' : ''));
	$requete->execute([$logement_id]);
	return $requete->fetch(PDO::FETCH_NUM)[0];

}

function images_ajouter ($logement_id, $nom) {

	$pdo = DB::Connect();

	include CHEMIN_MODELE.'logements.php';
	$logement = logement_recuperer($logement_id);
	if (!$logement)
		return false;
	if ($logement['utilisateur_id'] != $_SESSION['Utilisateur']['id'])
		return false;
	$pdo->prepare('INSERT INTO images SET logement_id=?, nom=?')->execute([$logement_id, $nom]);

}

function images_recuperer ($id) {

	$pdo = DB::Connect();

    $requete = $pdo->prepare('SELECT * FROM images WHERE logement_id=?');
    $requete->execute([$id]);
    
    return $requete->fetchAll();
}