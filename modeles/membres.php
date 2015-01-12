<?php

function maj_avatar_membre($id_utilisateur , $avatar) {

	$pdo = DB::Connect();

	$requete = $pdo->prepare("UPDATE utilisateurs SET
		avatar = :avatar
		WHERE
		id = :id_utilisateur");

	$requete->bindValue(':id_utilisateur', $id_utilisateur);
	$requete->bindValue(':avatar',         $avatar);

	return $requete->execute();
}

function maj_email_membre($id_utilisateur , $email) {

	$pdo = DB::Connect();

	$requete = $pdo->prepare("UPDATE utilisateurs SET
		email = :email
		WHERE
		id = :id_utilisateur");

	$requete->bindValue(':id_utilisateur', $id_utilisateur);
	$requete->bindValue(':email',         $email);

	return $requete->execute();
}

function maj_pass_membre($id_utilisateur , $pass) {

	$pdo = DB::Connect();

	$requete = $pdo->prepare("UPDATE utilisateurs SET
		pass = :pass
		WHERE
		id = :id_utilisateur");
	$requete->bindValue(':id_utilisateur', $id_utilisateur);
	$requete->bindValue(':pass',$pass);

	return $requete->execute();
}

function maj_carte_ID_membre($id_utilisateur , $carte_ID) {

	$pdo = DB::Connect();

	$requete = $pdo->prepare("UPDATE utilisateurs SET
		carte_ID = :carte_ID
		WHERE
		id = :id_utilisateur");

	$requete->bindValue(':id_utilisateur', $id_utilisateur);
	$requete->bindValue(':carte_ID',         $carte_ID);

	return $requete->execute();
}

function valider_compte_avec_hash($hash_validation) {

	$pdo = DB::Connect();

	$requete = $pdo->prepare("UPDATE utilisateurs SET
		hash_validation = ''
		WHERE
		hash_validation = :hash_validation");

	$requete->bindValue(':hash_validation', $hash_validation);
	
	$requete->execute();

	return ($requete->rowCount() == 1);
}

function utilisateur_connexion($pseudo) {

	$pdo = DB::Connect();

	$requete = $pdo->prepare("SELECT * FROM utilisateurs
		WHERE pseudo=?
		AND hash_validation=''
                LIMIT 1");
        
        $requete->execute([$pseudo]);
        return $requete->fetch();	
}

function lire_infos_utilisateur($id_utilisateur) {

	$pdo = DB::Connect();

	$requete = $pdo->prepare("SELECT nom, prenom, sexe, date_naissance, profession, animaux, fumeur, langue, email, tel, rue, code_postal, ville, pays, pseudo, pass, avatar, nb_adulte, nb_enfant, interet, date_inscription, hash_validation
		FROM utilisateurs
		WHERE
		id = :id_utilisateur");

	$requete->bindValue(':id_utilisateur', $id_utilisateur);
	$requete->execute();
	
	if ($result = $requete->fetch()) {
	
		$requete->closeCursor();
		return $result;
	}
	return false;
}

function recuperer_pass($id_utilisateur) {

	$pdo = DB::Connect();

	$requete = $pdo->prepare("SELECT pass
            FROM utilisateurs
            WHERE
            id=:id_utilisateur");

	$requete->bindValue(':id_utilisateur', $id_utilisateur);
	$requete->execute();
	
	if ($result = $requete->fetch()['pass']) {
		$requete->closeCursor();
		return $result;
	}
	return false;
}



