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

