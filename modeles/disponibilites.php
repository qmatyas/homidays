<?php


function disponibilites_ajouter ($logement_id, $debut, $fin) {

	$pdo = DB::Connect();

	include CHEMIN_MODELE.'logements.php';
	$logement = logement_recuperer($logement_id);
	if (!$logement)
		return false;
	if ($logement['utilisateur_id'] != $_SESSION['Utilisateur']['id'])
		return false;

	$requete = $pdo->prepare('INSERT INTO disponibilites SET
		logement_id=?,
		date_debut=?,
		date_fin=?
	')->execute([$logement_id, $debut, $fin]);
	return $pdo->lastInsertId();

}

function disponibilites_recuperer ($logement_id) {

	$requete = DB::Connect()->prepare('SELECT * FROM disponibilites WHERE logement_id=?');
	$requete->execute([$logement_id]);
	return $requete->fetchAll();

}

function disponibilites_supprimer ($id) {

	$pdo = DB::Connect();
	$requete = $pdo->prepare('
		SELECT d.id, u.id as utilisateur_id
		FROM disponibilites as d
		LEFT JOIN logements as l ON l.id=d.logement_id
		LEFT JOIN utilisateurs as u ON u.id=l.utilisateur_id
		WHERE d.id=?
	');
	$requete->execute([$id]);
	$disponibilite = $requete->fetch();

	if (!$disponibilite)
		return false;

	if ($disponibilite['utilisateur_id'] != $_SESSION['Utilisateur']['id'])
		return false;

	$pdo->query('DELETE FROM disponibilites WHERE id=' . $disponibilite['id']);
	return true;

}