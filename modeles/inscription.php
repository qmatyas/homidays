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

function ajouter_logement_dans_bdd($logement, $quartier, $activite, $transport, $environnement, $contrainte, $service, $option) {

    $pdo = DB::Connect();

    $req1 = $pdo->prepare('INSERT INTO logements SET
        utilisateur_id =:utilisateur,
        nom = :nom,
        date_inscription = NOW(),
        type_logement = :type_logement,
        rue = :rue,
        code_postal = :code_postal,
        ville = :ville,
        pays = :pays,
        superficie = :superficie,
        nb_piece = :nombre_piece,
        nb_chambre = :nombre_chambre,
        nb_salle_bain = :nombre_salle_bain,
        description = :description');
    $req2 = $pdo->prepare('INSERT INTO quartiers SET
    	logement_id = :logement,
        point_fort = :points_forts,
        restauration = :restauration');
    $req3 = $pdo->prepare('INSERT INTO activites SET
    	quartiers_id = :quartier,
    	musee = :musee,
    	sport = :sport,
    	parc_attraction = :parc_attraction,
    	shopping = :shopping,
    	autre = :autre');
    $req4 = $pdo->prepare('INSERT INTO transports SET
    	quartiers_id = :quartier,
    	metro = :metro,
    	velib = :velib,
    	bus = :bus,
    	tramway = :tramway,
    	autre = :autre');
    $req5 = $pdo->prepare('INSERT INTO environnements SET
    	quartiers_id = :quartier,
    	lac = :lac,
    	foret = :foret,
    	campagne = :campagne,
    	mer = :mer,
    	ville = :ville_env,
    	autre = :autre');
    $req6 = $pdo->prepare('INSERT INTO contraintes SET
    	logement_id = :logement,
    	pas_fumer = :pas_fumer,
    	pas_bruit = :pas_bruit,
    	pas_enfant = :pas_enfant,
    	pas_animaux = :pas_animaux,
    	autre = :autre');
    $req7 = $pdo->prepare('INSERT INTO services SET
    	logement_id = :logement,
    	fermer = :fermer,
    	garder_animaux = :garder_animaux,
    	arroser_plantes = :arroser_plantes,
    	discuter_voisine = :discuter_voisine,
    	menage = :menage,
    	autre = :autre');
    $req8 = $pdo->prepare('INSERT INTO options SET
    	logement_id = :logement,
    	wifi = :wifi,
    	voiture = :voiture,
    	jardin_terrase = :jardin_terrase,
    	piscine = :piscine,
    	equipement_sportif =:equipement_sportif,
    	acces_handicape = :acces_handicape,
    	autre = :autre');

    if($req1->execute($logement)){
        $logement_id = $pdo->lastInsertId();
        $quartier['logement'] = $logement_id;
        $contrainte['logement'] = $logement_id;
        $service['logement'] = $logement_id;
        $option['logement'] = $logement_id;
    } else {
        return false;
    }
    
    if($req2->execute($quartier)){
        $quartier_id = $pdo->lastInsertId();
        $activite['quartier'] = $quartier_id;
        $transport['quartier'] = $quartier_id;
        $environnement['quartier'] = $quartier_id;
    } else {
        return false;
    }
    
    if (!$req3->execute($activite)) {
        return false;
    }
    if (!$req4->execute($transport)) {
    	return false;
    }
    if (!$req5->execute($environnement)) {
    	return false;
    }
    if (!$req6->execute($contrainte)) {
    	return false;
    }
    if (!$req7->execute($service)) {
    	return false;
    }
    if (!$req8->execute($option)) {
    	return false;
    }
    
    return true;
}
