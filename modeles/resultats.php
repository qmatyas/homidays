<?php

function recup_liste_membre($depart, $nombre) {

	$pdo = DB::Connect();

	$requete = $pdo->query("SELECT id, pseudo, date_inscription, note_totale, nb_adulte, nb_enfant FROM utilisateurs ORDER BY pseudo ASC LIMIT $depart, $nombre");
        
        return $requete->fetchAll(PDO::FETCH_ASSOC);

}

function recup_membre($id) {
    
    $pdo = DB::Connect();

    $requete = $pdo->prepare('SELECT nom, prenom, date_naissance, sexe, date_inscription, pseudo, profession, langue, note_totale, nb_adulte, nb_enfant,interet, animaux, fumeur FROM utilisateurs WHERE id = :id');
    $requete->bindValue(':id', $id);
    $requete->execute();
    
    return $requete->fetch(PDO::FETCH_ASSOC);
    
}

function compter_membre() {
    
    $pdo = DB::Connect();
    
    return $pdo->query('SELECT COUNT(id) FROM utilisateurs')->fetch(PDO::FETCH_NUM)[0];
    
}


function recup_liste_offre($depart, $nombre) {

	$pdo = DB::Connect();

	$requete = $pdo->query("SELECT id, nom, type, ville, pays, nb_piece, note_totale FROM logements ORDER BY nom ASC LIMIT $depart, $nombre");
        
        return $requete->fetchAll(PDO::FETCH_ASSOC);

}

function recup_offre($id) {
    
    $pdo = DB::Connect();

    $requete = $pdo->prepare('SELECT nom, type, rue, code_postal, ville, pays, superficie, nb_piece, nb_chambre, nb_salle_bain, note_totale, description FROM logements WHERE id = :id');
    $requete->bindValue(':id', $id);
    $requete->execute();
    
    return $requete->fetch(PDO::FETCH_ASSOC);
    
}

function compter_offre() {
    
    $pdo = DB::Connect();
    
    return $pdo->query('SELECT COUNT(id) FROM logements')->fetch(PDO::FETCH_NUM)[0];
    
}