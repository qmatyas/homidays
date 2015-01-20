<?php


function disponibilites_ajouter ($logement_id, $debut, $fin) {

	$pdo = DB::Connect();

	include_once CHEMIN_MODELE.'logements.php';
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

function disponibilite_recuperer ($id) {
	$requete = DB::Connect()->prepare('
		SELECT d.id, u.id as utilisateur_id, l.id as logement_id
		FROM disponibilites as d
		LEFT JOIN logements as l ON l.id=d.logement_id
		LEFT JOIN utilisateurs as u ON u.id=l.utilisateur_id
		WHERE d.id=?
	');
	$requete->execute([$id]);
	return $requete->fetch();
}

function disponibilites_supprimer ($id) {

	$disponibilite = disponibilite_recuperer($id);

	if (!$disponibilite)
		return false;

	if ($disponibilite['utilisateur_id'] != $_SESSION['Utilisateur']['id'])
		return false;

	$pdo->query('DELETE FROM disponibilites WHERE id=' . $disponibilite['id']);
	return true;

}

function disponibilite_reserver ($id) {

	$pdo = DB::Connect();

	$disponibilite = disponibilite_recuperer($id);

	if (!$disponibilite)
		return false;

	if ($disponibilite['utilisateur_id'] == $_SESSION['Utilisateur']['id'])
		return false;

	$requete = $pdo->prepare('
		INSERT INTO echanges SET
		logement_id=:logement_id,
		utilisateur_id=:utilisateur_id,
		victime_id=' . $pdo->quote($_SESSION['Utilisateur']['id']) . ',
		disponibilite_id=:id
	');
	$requete->execute($disponibilite);

	return true;

}

function reservations_recuperer () {

	$requete = DB::Connect()->prepare('
		SELECT
			e.id, confirmee,
			pseudo, u.id as utilisateur_id,
			l.nom, l.type_logement, l.ville, l.pays, l.nb_piece, l.note_totale,
			i.nom as image_nom
		FROM echanges as e
		LEFT JOIN utilisateurs as u ON u.id=e.utilisateur_id
		LEFT JOIN logements as l ON l.id=e.logement_id
		LEFT JOIN images as i ON l.id=i.logement_id
		WHERE victime_id=' . $_SESSION['Utilisateur']['id']
		. ' GROUP BY e.id');
	$requete->execute();
	return $requete->fetchAll();

}