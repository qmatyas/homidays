<?php

//INSCRIRE

function logements_ajouter ($logement, $quartier = null, $contrainte = null, $service = null, $option = null, $activite = null, $transport = null, $environnement = null) {
    
    $pdo = DB::Connect();

    $req = $pdo->prepare('INSERT INTO logements SET
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
    if ($req->execute($logement)) {
        $logement_id = $pdo->lastInsertId();
        if ($quartier && $contrainte && $service && $option) {
            logements_ajouter_carateristiques($logement_id, $quartier, $contrainte, $service, $option, $activite, $transport, $environnement);
        }
        return $logement_id;
    } else {
        return false;
    }
}

function logements_ajouter_carateristiques ($logement_id, $quartier, $contrainte, $service, $option, $activite = null, $transport = null, $environnement = null) {

    $pdo = DB::Connect();

    $req1 = $pdo->prepare('INSERT INTO quartiers SET
        logement_id = :logement_id,
        point_fort = :points_forts,
        restauration = :restauration');
    $req2 = $pdo->prepare('INSERT INTO contraintes SET
        logement_id = :logement_id,
        pas_fumer = :pas_fumer,
        pas_bruit = :pas_bruit,
        pas_enfant = :pas_enfant,
        pas_animaux = :pas_animaux,
        autre = :autre');
    $req3 = $pdo->prepare('INSERT INTO services SET
        logement_id = :logement_id,
        fermer = :fermer,
        garder_animaux = :garder_animaux,
        arroser_plantes = :arroser_plantes,
        discuter_voisine = :discuter_voisine,
        menage = :menage,
        autre = :autre');
    $req4 = $pdo->prepare('INSERT INTO options SET
        logement_id = :logement_id,
        wifi = :wifi,
        voiture = :voiture,
        jardin_terrase = :jardin_terrase,
        piscine = :piscine,
        equipement_sportif =:equipement_sportif,
        acces_handicape = :acces_handicape,
        autre = :autre');

    $quartier['logement_id'] = $logement_id;
    $contrainte['logement_id'] = $logement_id;
    $service['logement_id'] = $logement_id;
    $option['logement_id'] = $logement_id;

    if (!$req2->execute($contrainte) || !$req3->execute($service) || !$req4->execute($option)) {
        return false;
    }

    if ($req1->execute($quartier)) {
        $quartier_id = $pdo->lastInsertId();
        if ($activite && $transport && $environnement) {
            quartiers_ajouter_caracteristiques($activite, $transport, $environnement);
        }
        return $quartier_id;
    } else {
        return false;
    }
}

function quartiers_ajouter_caracteristiques ($activite, $transport, $environnement) {

    $pdo = DB::Connect();

    $req1 = $pdo->prepare('INSERT INTO activites SET
        quartiers_id = :quartier_id,
        musee = :musee,
        sport = :sport,
        parc_attraction = :parc_attraction,
        shopping = :shopping,
        autre = :autre');
    $req2 = $pdo->prepare('INSERT INTO transports SET
        quartiers_id = :quartier_id,
        metro = :metro,
        velib = :velib,
        bus = :bus,
        tramway = :tramway,
        autre = :autre');
    $req3 = $pdo->prepare('INSERT INTO environnements SET
        quartiers_id = :quartier_id,
        lac = :lac,
        foret = :foret,
        campagne = :campagne,
        mer = :mer,
        ville = :ville_env,
        autre = :autre');

    if (!$req1->execute($contrainte) || !$req2->execute($service) || !$req3->execute($option)) {
        return false;
    }
    return true;
}

//MODIFIER

function logement_modifier ($logement, $quartier, $activite, $transport, $environnement, $contrainte, $service, $option) {

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


//AFFICHER

function logement_lire_infos ($id_logement, $id_quartier, $id_activite, $id_transport, $id_environnement, $id_contrainte, $id_service, $id_option) {

    $pdo = DB::Connect();

    $req1 = $pdo->prepare("SELECT nom, utilisateur_id, date_inscription, type_logement, rue, code_postal, ville, pays, superficie, nb_piece, nb_chambre, nb_salle_bain, note_totale, description
            FROM logements
            WHERE
            id = :id_logement");

    $req2 = $pdo->prepare("SELECT logement_id, point_fort, restauration 
        FROM quartiers
        WHERE
        id = :id_quartier");

    $req3 = $pdo->prepare("SELECT quartiers_id, musee, sport, parc_attraction, shopping, autre
    	FROM activites
    	WHERE 
    	id = :id_activite");

    $req4 = $pdo->prepare("SELECT quartiers_id, metro, velib, bus, tramway, autre
    	FROM tranports
    	WHERE
    	id = :id_transport");

    $req5 = $pdo->prepare("SELECT quartiers_id, lac, foret, campagne, mer, ville, autre  
    	FROM environnements
    	WHERE 
    	id = :id_environnement");

    $req6 = $pdo->prepare("SELECT logement_id, pas_fumer, pas_bruit, pas_enfant, pas_animaux , autre
     	FROM contraintes
    	WHERE
    	id = :id_contrainte");

    $req7 = $pdo->prepare("SELECT logement_id, fermer, garder_animaux, arroser_plantes, discuter_voisine, menage, autre
    	FROM services 
    	WHERE
    	id = :id_service");

    $req8 = $pdo->prepare("SELECT logement_id, wifi, voiture, jardin_terrasse, piscine, equipement_sportif, acces_handicape, autre
    	FROM options
    	WHERE
    	id = :id_option");
    
	$req1->bindValue(':id_logement', $id_logement);
	$req1->execute();

	$req2->bindValue(':id_quartier', $id_quartier);
	$req2->execute();

	$req3->bindValue(':id_activite', $id_activite);
	$req3->execute();

	$req4->bindValue(':id_transport', $id_transport);
	$req4->execute();

	$req5->bindValue(':id_environnement', $id_environnement);
	$req5->execute();

	$req6->bindValue(':id_contrainte', $id_contrainte);
	$req6->execute();

	$req7->bindValue(':id_service', $id_service);
	$req7->execute();

	$req8->bindValue(':id_option', $id_option);
	$req8->execute();

	if ($result = $req1->fetch()) {
	
		$req1->closeCursor();
		return $result;
	}

	if ($result = $req2->fetch()) {
	
		$req2->closeCursor();
		return $result;
	}

	if ($result = $req3->fetch()) {
	
		$req3->closeCursor();
		return $result;
	}

	if ($result = $req4->fetch()) {
	
		$req4->closeCursor();
		return $result;
	}

	if ($result = $req5->fetch()) {
	
		$req5->closeCursor();
		return $result;
	}

	if ($result = $req6->fetch()) {
	
		$req6->closeCursor();
		return $result;
	}

	if ($result = $req7->fetch()) {
	
		$req7->closeCursor();
		return $result;
	}

	if ($result = $req8->fetch()) {
	
		$req8->closeCursor();
		return $result;
	}
	return false;
}

function logement_recuperer ($id) {
    
    $pdo = DB::Connect();

    $requete = $pdo->prepare('SELECT * FROM logements WHERE id = :id');
    $requete->bindValue(':id', $id);
    $requete->execute();

    return $requete->fetch();

}

function logements_recuperer_recherche($id) {
    
    $pdo = DB::Connect();

    $requete = $pdo->prepare('SELECT * FROM logements WHERE id = :id');
    $requete->bindValue(':id', $id);
    $requete->execute();
    
    return $requete->fetch();  
}

function logements_recuperer_liste($depart, $nombre, $id) {

	$pdo = DB::Connect();

    $requete = $pdo->prepare("SELECT logements.id, images.id as image_id, images.nom as image_nom, logements.nom utilisateur_id, type_logement, ville, pays, nb_piece, note_totale FROM logements LEFT JOIN images ON images.logement_id=logements.id" . ($id ? ' WHERE utilisateur_id=?' : '') . " ORDER BY nom ASC LIMIT $depart, $nombre");
    $requete->execute([$id]);
    return $requete->fetchAll();
}

function logements_compter() {
    
    $pdo = DB::Connect();
    
    return $pdo->query('SELECT COUNT(id) FROM logements')->fetch(PDO::FETCH_NUM)[0];  
}