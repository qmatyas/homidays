<?php

function images_compter ($logement_id = null) {

	$requete = DB::Connect()->prepare('SELECT COUNT(*) FROM images' . ($logement_id ? ' WHERE logement_id=?' : ''));
	$requete->execute([$logement_id]);
	return $requete->fetch(PDO::FETCH_NUM)[0];

}

function images_ajouter ($logement_id, $nom) {

	DB::Connect()->prepare('INSERT INTO images SET logement_id=?, nom=?')->execute([$logement_id, $nom]);

}

function images_recuperer ($id) {

	$pdo = DB::Connect();

    $requete = $pdo->prepare('SELECT * FROM images WHERE logement_id=?');
    $requete->execute([$id]);
    
    return $requete->fetchAll();
}