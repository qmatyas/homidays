<?php

function ajouter_membre_dans_bdd($nom, $prenom, $sexe, $date_naissance, $profession, $email, $tel, $rue, $code_postal, $ville, $pays, $pseudo, $pass, $hash_validation, $nb_adulte, $nb_enfant, $interet) {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("INSERT INTO utilisateurs SET
		nom = :nom,
                prenom = :prenom,
                sexe = :sexe,
                date_naissance = :date_naissance,
                profession = :profession,
                email = :email,
                tel = :tel,
                rue = :rue,
                code_postal = :code_postal,
                ville = :ville,
                pays = :pays,
                pseudo = :pseudo,
                pass = :pass,
                hash_validation = :hash_validation,
                nb_adulte = :nb_adulte,
                nb_enfant = :nb_enfant,
                interet = :interet,
		date_inscription = NOW()");

	$requete->bindValue(':nom', $nom);
        $requete->bindValue('prenom', $prenom);
        $requete->bindValue(':sexe', $sexe);
        $requete->bindValue(':date_naissance', $date_naissance);
        $requete->bindValue(':profession', $profession);
        $requete->bindValue(':email', $email);
        $requete->bindValue(':tel', $tel);
        $requete->bindValue(':rue', $rue);
        $requete->bindValue(':code_postal', $code_postal);
        $requete->bindValue(':ville', $ville);
        $requete->bindValue(':pays', $pays);
        $requete->bindValue(':pseudo', $pseudo);
        $requete->bindValue(':pass', $pass);
        $requete->bindValue(':hash_validation', $hash_validation);
        $requete->bindValue(':nb_adulte', $nb_adulte);
        $requete->bindValue(':nb_enfant', $nb_enfant);
        $requete->bindValue(':interet', $interet);
	

	if ($requete->execute()) {
	
		return $pdo->lastInsertId();
	}
	return $requete->errorInfo();
}


