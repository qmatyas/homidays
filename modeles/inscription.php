<?php

function ajouter_membre_dans_bdd($data) {

	$pdo = DB::Connect();

	$requete = $pdo->prepare("INSERT INTO utilisateurs SET
		nom = :nom,
                prenom = :prenom,
                sexe = :sexe,
                date_naissance = :date_naissance,
                profession = :profession,
                langue = :langue,
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
                animaux = :animaux,
                fumeur = :fumeur,
		date_inscription=NOW();");
        
	if ($requete->execute($data)) {
	       return $pdo->lastInsertId();
	}
	return $requete->errorInfo();
}

function modifier_membre($data) {

	$pdo = DB::Connect();

	$requete = $pdo->prepare("UPDATE utilisateurs SET
		nom = :nom,
                prenom = :prenom,
                sexe = :sexe,
                date_naissance = :date_naissance,
                profession = :profession,
                langue = :langue,
                email = :email,
                tel = :tel,
                rue = :rue,
                code_postal = :code_postal,
                ville = :ville,
                pays = :pays,
                pseudo = :pseudo,
                nb_adulte = :nb_adulte,
                nb_enfant = :nb_enfant,
                interet = :interet,
                animaux = :animaux,
                fumeur = :fumeur
                WHERE id=:id;");
        
	if ($requete->execute($data)) {
	    return $pdo->lastInsertId();
	}
	return $requete->errorInfo();
}


function ajouter_logement_dans_bdd($nom, $rue, $code_postal, $ville, $pays, $type, $superficie, $nb_piece, $nb_chambre, $nb_salle_bain, $description, $point_fort, $activites, $restauration, $transports, $environnements, $contraintes, $services, $options) {

	$pdo = DB::Connect();

	$requete1 = $pdo->prepare("INSERT INTO logements SET
		nom = :nom,
                rue = :rue,
                code_postal = :code_postal,
                ville = :ville,
                pays = :pays
                type = :type,
                superficie = :superficie,
                nb_piece = :nb_piece,
                nb_chambre = :nb_chambre,
                nb_salle_bain = :nb_salle_bain,
                description = :description,
		date_inscription = NOW()");

	$requete1->bindValue(':nom', $nom);
        $requete1->bindValue('prenom', $prenom);
        $requete1->bindValue(':sexe', $sexe);
        $requete->bindValue(':date_naissance', $date_naissance);
        $requete->bindValue(':profession', $profession);
        $requete->bindValue(':langue', $langue);
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
        $requete->bindValue(':animaux', $animaux);
        $requete->bindValue(':fumeur', $fumeur);
	

	if ($requete->execute()) {
	
		return $pdo->lastInsertId();
	}
	return $requete->errorInfo();
}
