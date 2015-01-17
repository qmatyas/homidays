<?php

function images_compter () {

	return DB::Connect()->query('SELECT COUNT(*) FROM images')->fetch(PDO::FETCH_NUM)[0];

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