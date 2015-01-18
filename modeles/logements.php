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

function logement_recuperer ($id) {
    
    $pdo = DB::Connect();

    $requete = $pdo->prepare('
       SELECT
            l.id, utilisateur_id, l.nom, l.date_inscription, type_logement, l.rue, l.code_postal, l.ville, l.pays, superficie, nb_piece, nb_chambre, nb_salle_bain, l.note_totale, l.note_nombre, l.description,
            s.id as service_id, fermer, garder_animaux, arroser_plantes, discuter_voisine, menage, s.autre as service_autre,
            c.id as contrainte_id, pas_fumer, pas_bruit, pas_enfant, pas_animaux, c.autre as contrainte_autre,
            o.id as option_id, wifi, voiture, jardin_terrasse, piscine, equipement_sportif, acces_handicape, o.autre as option_autre,
            pseudo, u.nom as utilisateur_nom, prenom, avatar
        FROM logements as l
        LEFT JOIN services as s ON l.id=s.logement_id
        LEFT JOIN contraintes as c ON l.id=c.logement_id
        LEFT JOIN options as o ON l.id=o.logement_id
        LEFT JOIN utilisateurs as u ON u.id=l.utilisateur_id
        WHERE l.id=?
    ');
    $requete->execute([$id]);
    $result = $requete->fetch();

    include CHEMIN_MODELE . 'disponibilites.php';
    $result['disponibilites'] = disponibilites_recuperer($result['id']);

    return $result;
}

function quartier_recuperer ($id){

    $pdo = DB :: Connect();

    $requete = $pdo->prepare('
        SELECT
            q.id, point_fort, restauration,
            a.id as activite_id, musee, sport, parc_attraction, shopping, a.autre as activite_autre,
            t.id as transport_id, metro, velib, bus, tramway, a.t as transport_autre,
            e.id as environnement_id, lac, foret, campagne, mer, ville, e.autre as environnement_autre
        FROM quartiers as q
        LEFT JOIN activites as a ON q.id=a.quartier_id
        LEFT JOIN transports as t ON q.id=t.quartier_id
        LEFT JOIN environnements as e ON q.id=e.quartier_id
        WHERE q.id=?
    ');
    $requete->execute([$id]);
    return $requete->fetch();
}

function logements_recuperer_recherche($id) {
    
    $pdo = DB::Connect();

    $requete = $pdo->prepare('SELECT * FROM logements WHERE id = :id');
    $requete->bindValue(':id', $id);
    $requete->execute();
    
    return $requete->fetch();  
}

function logements_recuperer_liste($argument) {

    if (is_numeric($argument)) {
        $id = $argument;
        $limit = false; 
    } else {
        $id = false;
        $limit = ' LIMIT ' . $argument[0] . ', ' . $argument[1];
    }

	$pdo = DB::Connect();

    $requete = $pdo->prepare("SELECT logements.id, images.id as image_id, images.nom as image_nom, logements.nom, utilisateur_id, type_logement, ville, pays, nb_piece, note_totale
    FROM logements
    LEFT JOIN images ON images.logement_id=logements.id" . ($id ? ' WHERE utilisateur_id=?' : '')
        . (isset($_GET['ville']) ? " WHERE ville LIKE ?" : ' ') . " GROUP BY logements.id" . $limit);
    $data = [];
    if ($id) {
        $data[] = $id;
    }
    if (isset($_GET['ville'])) {
        $data[] = '%' . $_GET['ville'] . '%';
    }
    // var_dump($requete, $data);
    // die();
    $requete->execute($data);
    return $requete->fetchAll();
    
}

function logements_compter($id) {

    $requete = DB::Connect()->prepare('SELECT COUNT(id) FROM logements' . (isset($_GET['ville']) ? " WHERE ville LIKE ? " : ''));
    $requete->execute(isset($_GET['ville']) ? ['%' . $_GET['ville'] . '%'] : null);
    return $requete->fetch(PDO::FETCH_NUM)[0];
    
    // $pdo = DB::Connect();
    
    // $requete = $pdo->prepare('SELECT COUNT(id) FROM logements' . ($id ? ' WHERE utilisateur_id=?' : ''));
    // $requete->execute([$id]);
    // return $requete->fetch(PDO::FETCH_NUM)[0];  
}