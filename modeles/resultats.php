<?php

function recup_liste_membre($depart, $nombre) {

	$pdo = PDO2::getInstance();

	$requete = $pdo->query("SELECT id, pseudo, date_inscription, note_totale, nb_adulte, nb_enfant FROM utilisateurs ORDER BY pseudo ASC LIMIT $depart, $nombre");
        
        return $requete->fetchAll(PDO::FETCH_ASSOC);

}

function recup_membre($id) {
    
    $pdo = PDO2::getInstance();

    $requete = $pdo->prepare('SELECT * FROM utilisateurs WHERE id = :id');
    $requete->bindValue(':id', $id);
    $requete->execute();
    
    return $requete->fetch(PDO::FETCH_ASSOC);
    
}

function compter_membre() {
    
    $pdo = PDO2::getInstance();
    
    return $pdo->query('SELECT COUNT(id) FROM utilisateurs')->fetch(PDO::FETCH_NUM)[0];
    
}


function recup_liste_offre($depart, $nombre) {

	$pdo = PDO2::getInstance();

	$requete = $pdo->query("SELECT id, nom, type, ville, pays, nb_piece, note_totale FROM logements ORDER BY nom ASC LIMIT $depart, $nombre");
        
        return $requete->fetchAll(PDO::FETCH_ASSOC);

}

function compter_offre() {
    
    $pdo = PDO2::getInstance();
    
    return $pdo->query('SELECT COUNT(id) FROM logements')->fetch(PDO::FETCH_NUM)[0];
    
}