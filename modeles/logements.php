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

    include_once CHEMIN_MODELE . 'disponibilites.php';
    $result['disponibilites'] = disponibilites_recuperer($result['id']);

    return $result;
}

function quartier_recuperer ($id){

    $pdo = DB :: Connect();

    $requete = $pdo->prepare('
        SELECT
            q.id, logement_id, point_fort, restauration,
            a.id as activite_id, musee, sport, parc_attraction, shopping, a.autre as activite_autre,
            t.id as transport_id, metro, velib, bus, tramway, t.autre as transport_autre,
            e.id as environnement_id, lac, foret, campagne, mer, ville, e.autre as environnement_autre
        FROM quartiers as q
        LEFT JOIN activites as a ON q.id=a.quartier_id
        LEFT JOIN transports as t ON q.id=t.quartier_id
        LEFT JOIN environnements as e ON q.id=e.quartier_id
        LEFT JOIN logements as l ON l.id=q.logement_id
        WHERE q.id=?
    ');
    $requete->execute([$id]);
    return $requete->fetch();
}

// function logements_recuperer_recherche($depart, $nombre) {
    
//     $pdo = DB::Connect();

//     $data = [];
//     if (isset($_GET['type_logement'], $_GET['superficie'], $_GET['nb_piece'], $_GET['nb_chambre'], $_GET['nb_salle_bain'], $_GET['musee'], $_GET['sport'], $_GET['parc_attraction'], $_GET['shopping'], $_GET['autre'], $_GET['metro'], $_GET['velib'], $_GET['bus'], $_GET['tramway'], $_GET['autre'], $_GET['lac'], $_GET['foret'], $_GET['campagne'], $_GET['mer'], $_GET['ville_env'], $_GET['autre'], $_GET['pas_fumer'], $_GET['pas_bruit'], $_GET['pas_enfant'], $_GET['pas_animaux'], $_GET['autre'], $_GET['fermer'], $_GET['garder_animaux'], $_GET['arroser_plantes'], $_GET['discuter_voisine'], $_GET['menage'], $_GET['autre'], $_GET['wifi'], $_GET['voiture'], $_GET['jardin_terrase'], $_GET['piscine'], $_GET['equipement_sportif'], $_GET['acces_handicape'], $_GET['autre'])){
        
//         $sql = 'WHERE';
//         // if(isset($_GET['type_logement']) && $_GET['type_logement'] === 'on'){ $sql .= "type_logement=1 AND";}

//         if(isset($_GET['superficie']){ $sql .= "superficie=? AND"; $data[] = $_GET['superficie'];}
//         if(isset($_GET['nb_piece']){ $sql .= "nb_piece=? AND"; $data[] = $_GET['nb_piece'];}
//         if(isset($_GET['nb_chambre']){ $sql .= "nb_chambre=? AND"; $data[] = $_GET['nb_chambre'];}
//         if(isset($_GET['nb_salle_bain']){ $sql .= "nb_salle_bain=? AND"; $data[] = $_GET['nb_salle_bain'];}

//         if(isset($_GET['musee']) && $_GET['musee'] === 'on'){ $sql .= "musee=1 AND";}
//         if(isset($_GET['sport']) && $_GET['sport'] === 'on'){ $sql .= "sport=1 AND";}
//         if(isset($_GET['parc_attraction']) && $_GET['parc_attraction'] === 'on'){ $sql .= "parc_attraction=1 AND";}
//         if(isset($_GET['shopping']) && $_GET['shopping'] === 'on'){ $sql .= "shopping=1 AND";}
//         if(isset($_GET['autre']) && $_GET['autre'] === 'on'){ $sql .= "autre=1 AND";}
//         if(isset($_GET['metro']) && $_GET['metro'] === 'on'){ $sql .= "metro=1 AND";}
//         if(isset($_GET['velib']) && $_GET['velib'] === 'on'){ $sql .= "velib=1 AND";}
//         if(isset($_GET['bus']) && $_GET['bus'] === 'on'){ $sql .= "bus=1 AND";}
//         if(isset($_GET['tramway']) && $_GET['tramway'] === 'on'){ $sql .= "tramway=1 AND";}
//         if(isset($_GET['autre']) && $_GET['autre'] === 'on'){ $sql .= "autre=1 AND";}
//         if(isset($_GET['lac']) && $_GET['lac'] === 'on'){ $sql .= "lac=1 AND";}
//         if(isset($_GET['foret']) && $_GET['foret'] === 'on'){ $sql .= "foret=1 AND";}
//         if(isset($_GET['campagne']) && $_GET['campagne'] === 'on'){ $sql .= "campagne=1 AND";}
//         if(isset($_GET['mer']) && $_GET['mer'] === 'on'){ $sql .= "mer=1 AND";}
//         if(isset($_GET['ville_env']) && $_GET['ville_env'] === 'on'){ $sql .= "ville_env=1 AND";}
//         if(isset($_GET['fermer']) && $_GET['fermer'] === 'on'){ $sql .= "fermer=1 AND";}
//         if(isset($_GET['garder_animaux']) && $_GET['garder_animaux'] === 'on'){ $sql .= "garder_animaux=1 AND";}
//         if(isset($_GET['arroser_plantes']) && $_GET['arroser_plantes'] === 'on'){ $sql .= "arroser_plantes=1 AND";}
//         if(isset($_GET['discuter_voisine']) && $_GET['discuter_voisine'] === 'on'){ $sql .= "discuter_voisine=1 AND";}
//         if(isset($_GET['menage']) && $_GET['menage'] === 'on'){ $sql .= "menage=1 AND";}
//         if(isset($_GET['autre']) && $_GET['autre'] === 'on'){ $sql .= "autre=1 AND";}
//         if(isset($_GET['wifi']) && $_GET['wifi'] === 'on'){ $sql .= "wifi=1 AND";}
//         if(isset($_GET['voiture']) && $_GET['voiture'] === 'on'){ $sql .= "voiture=1 AND";}
//         if(isset($_GET['jardin_terrase']) && $_GET['jardin_terrase'] === 'on'){ $sql .= "jardin_terrase=1 AND";}
//         if(isset($_GET['piscine']) && $_GET['piscine'] === 'on'){ $sql .= "piscine=1 AND";}
//         if(isset($_GET['equipement_sportif']) && $_GET['equipement_sportif'] === 'on'){ $sql .= "equipement_sportif=1 AND";}
//         if(isset($_GET['acces_handicape']) && $_GET['acces_handicape'] === 'on'){ $sql .= "autre=1 AND";}
//         if(isset($_GET['autre']) && $_GET['autre'] === 'on'){ $sql .= "autre=1 AND";}
//         $sql = trim($sql, 'AND');
//     } else {
//         $sql = '';
//     }

//     // var_dump($sql);

//     $requete = $pdo->prepare("SELECT * 
//         FROM logements"
//         . $sql
//         . "ORDER BY nom ASC
//         LIMIT $depart, $nombre");
//     // var_dump($requete, $data);
//     // die();
//     $requete->execute($data);
//     return $requete->fetchAll();  
// }

function logements_recuperer_liste($params) {

    extract($params);

	$pdo = DB::Connect();

    $requete = $pdo->prepare("SELECT logements.id, images.id as image_id, images.nom as image_nom, logements.nom, utilisateur_id, type_logement, ville, pays, nb_piece, note_totale
    FROM logements
    LEFT JOIN images ON images.logement_id=logements.id" . (isset($id) ? ' WHERE utilisateur_id=?' : '')
        . (isset($_GET['ville']) ? " WHERE ville LIKE ?" : '') . " GROUP BY logements.id" . (isset($debut, $nombre) ? ' LIMIT ' . $debut . ', ' . $nombre : ''));
    $data = [];
    if (isset($id))
        $data[] = $id;
    if (isset($_GET['ville']))
        $data[] = '%' . $_GET['ville'] . '%';
    $requete->execute($data);
    return $requete->fetchAll();   
}

function logements_compter($id) {

    $requete = DB::Connect()->prepare('SELECT COUNT(id) FROM logements' . (isset($id) ? ' WHERE utilisateur_id=?' : '')
        . (isset($_GET['ville']) ? " WHERE ville LIKE ?" : ''));
    $data = [];
    if (isset($id))
        $data[] = $id;
    if (isset($_GET['ville']))
        $data[] = '%' . $_GET['ville'] . '%';
    $requete->execute($data);
    return $requete->fetch(PDO::FETCH_NUM)[0];
}