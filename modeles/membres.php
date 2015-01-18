<?php

//INSCRIPTION

function membre_ajouter($data) {

	$pdo = DB::Connect();

	$requete = $pdo->prepare("INSERT INTO utilisateurs SET
	nom = :nom,
        prenom = :prenom,
        sexe = :sexe,
        date_naissance = :date_naissance,
        profession = :profession,
        avatar = :avatar,
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

function membre_valider_compte($hash_validation) {

    $pdo = DB::Connect();

    $requete = $pdo->prepare("UPDATE utilisateurs SET
        hash_validation = ''
        WHERE
        hash_validation = :hash_validation");

    $requete->bindValue(':hash_validation', $hash_validation);
    
    $requete->execute();

    return ($requete->rowCount() == 1);
}

//CONNEXION

function membre_connecter($pseudo) {

	$pdo = DB::Connect();

	$requete = $pdo->prepare("SELECT * FROM utilisateurs
		WHERE pseudo=?
		AND hash_validation=''
                LIMIT 1");
        
        $requete->execute([$pseudo]);
        return $requete->fetch();	
}

//MODIFIER

function membre_modifier($data) {

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

function membre_modifier_pass($id_utilisateur , $pass) {

	$pdo = DB::Connect();

	$requete = $pdo->prepare("UPDATE utilisateurs SET
		pass = :pass
		WHERE
		id = :id_utilisateur");
	$requete->bindValue(':id_utilisateur', $id_utilisateur);
	$requete->bindValue(':pass',$pass);

	return $requete->execute();
}

function membre_recuperer_pass($id_utilisateur) {

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

//AFFICHER

function membres_recuperer ($id) {

	$pdo = DB::Connect();

	$requete = $pdo->prepare('SELECT *
		FROM utilisateurs
		WHERE id=?');
	$requete->execute([$id]);

	if ($result = $requete->fetch()) {
		$requete->closeCursor();
		return $result;
	}
	return false;
}

function membres_recuperer_liste($depart, $nombre) {

	$pdo = DB::Connect();

	$requete = $pdo->prepare("SELECT id, pseudo, avatar, date_inscription, note_totale, nb_adulte, nb_enfant
        FROM utilisateurs"
        . (isset($_GET['pseudo']) ? " WHERE pseudo LIKE ? " : ' ')
        . "ORDER BY pseudo ASC 
        LIMIT $depart, $nombre");
    $requete->execute(isset($_GET['pseudo']) ? ['%' . $_GET['pseudo'] . '%'] : null);
    return $requete->fetchAll();
}

function membres_recuperer_recherche($depart, $nombre) {

    $pdo = DB::Connect();

    $data = [];
    if (isset($_GET['animaux'], $_GET['fumeur'], $_GET['nb_adulte'], $_GET['nb_enfant'])) {
        $sql = 'WHERE';
        if (isset($_GET['animaux']) && $_GET['animaux'] === 'on') {
            $sql .= " animaux=1 AND";
        }
        if (isset($_GET['fumeur']) && $_GET['fumeur'] === 'on')
            $sql .= " fumeur=1 AND";
        if (isset($_GET['nb_adulte'])) {
            $sql .= " nb_adulte=? AND";
            $data[] = $_GET['nb_adulte'];
        }
        if (isset($_GET['nb_enfant'])) {
            $sql .= " nb_enfant=? AND";
            $data[] = $_GET['nb_enfant'];
        }
        $sql = trim($sql, 'AND');
    } else {
        $sql = '';
    }
    // var_dump($sql);

    $requete = $pdo->prepare("SELECT id, pseudo, avatar, date_inscription, note_totale, nb_adulte, nb_enfant
        FROM utilisateurs"
        . $sql
        . " ORDER BY pseudo ASC 
        LIMIT $depart, $nombre");
    // var_dump($requete, $data);
    // die();
    $requete->execute($data);
    return $requete->fetchAll();
}

function membres_compter() {
    
    $requete = DB::Connect()->prepare('SELECT COUNT(id) FROM utilisateurs' . (isset($_GET['pseudo']) ? " WHERE pseudo LIKE ? " : ''));
    $requete->execute(isset($_GET['pseudo']) ? ['%' . $_GET['pseudo'] . '%'] : null);
    return $requete->fetch(PDO::FETCH_NUM)[0];  
}








