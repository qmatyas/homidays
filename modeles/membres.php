<?php

function maj_avatar_membre($id_utilisateur , $avatar) {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("UPDATE utilisateurs SET
		avatar = :avatar
		WHERE
		id = :id_utilisateur");

	$requete->bindValue(':id_utilisateur', $id_utilisateur);
	$requete->bindValue(':avatar',         $avatar);

	return $requete->execute();
}

function maj_carte_ID_membre($id_utilisateur , $carte_ID) {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("UPDATE utilisateurs SET
		carte_ID = :carte_ID
		WHERE
		id = :id_utilisateur");

	$requete->bindValue(':id_utilisateur', $id_utilisateur);
	$requete->bindValue(':carte_ID',         $carte_ID);

	return $requete->execute();
}

function valider_compte_avec_hash($hash_validation) {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("UPDATE utilisateurs SET
		hash_validation = ''
		WHERE
		hash_validation = :hash_validation");

	$requete->bindValue(':hash_validation', $hash_validation);
	
	$requete->execute();

	return ($requete->rowCount() == 1);
}

function combinaison_connexion_valide($nom_utilisateur, $mot_de_passe) {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("SELECT id FROM utilisateurs
		WHERE
		pseudo = :pseudo AND 
		pass = :pass AND
		hash_validation = ''");

	$requete->bindValue(':pseudo', $pseudo);
	$requete->bindValue(':pass', $pass);
	$requete->execute();
	
	if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {
	
		$requete->closeCursor();
		return $result['id'];
	}
	return false;
}

function lire_infos_utilisateur($id_utilisateur) {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("SELECT pseudo, pass, email, avatar, date_inscription, hash_validation
		FROM utilisateurs
		WHERE
		id = :id_utilisateur");

	$requete->bindValue(':id_utilisateur', $id_utilisateur);
	$requete->execute();
	
	if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {
	
		$requete->closeCursor();
		return $result;
	}
	return false;
}

