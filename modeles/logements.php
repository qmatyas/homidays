<?php

function maj_just_log_logement($id_logement , $just_log) {

	$pdo = DB::Connect();

	$requete = $pdo->prepare("UPDATE logements SET
		just_log = :just_log
		WHERE
		id = :id_logement");

	$requete->bindValue(':id_logement', $id_logement);
	$requete->bindValue(':just_log',         $just_log);

	return $requete->execute();
}

function maj_photo_logement($id_logement , $photo) {

	$pdo = DB::Connect();

	$requete = $pdo->prepare("UPDATE logements SET
		photo = :photo
		WHERE
		id = :id_logement");

	$requete->bindValue(':id_logement', $id_logement);
	$requete->bindValue(':photo',         $photo);

	return $requete->execute();
}
