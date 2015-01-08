<?php

//Attribution des variables de session
$lvl=(isset($_SESSION['level']))?(int) $_SESSION['level']:1;
$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
$pseudo=(isset($_SESSION['pseudo']))?$_SESSION['pseudo']:'';

//Initialisation de deux variables
$totaldesmessages = 0;
$categorie = NULL;

// On veut utiliser le modele du forum (~/modeles/forum.php)
include CHEMIN_MODELE.'forum.php';

// tout_obtenir_forum() est défini dans ~/modeles/forum.php
$query = tout_obtenir_forum($lvl);

//Début de la boucle
while($data = $query->fetch()){
    
    //On affiche chaque catégorie
    if( $categorie != $data['cat_id'] ){
        //Si c'est une nouvelle catégorie on l'affiche
        $categorie = $data['cat_id'];
        include CHEMIN_VUE.'nouvelle_categorie.php';
    }
    
    //Ici, on met le contenu de chaque catégorie
    include CHEMIN_VUE.'categorie.php';
    
    // Deux cas possibles : soit il y a un nouveau message, soit le forum est vide
    if (!empty($data['forum_message'])) {
         //Selection dernier message
	 $nombreDeMessagesParPage = 15;
         $nbr_post = $data['sujet_message'] +1;
	 $page = ceil($nbr_post / $nombreDeMessagesParPage);
		 
         include CHEMIN_VUE.'dernier_message';

     }
     
    else{
        include CHEMIN_VUE.'pas_message';
     }
     
    //Cette variable stock le nombre de messages, on la met à jour
    $totaldesmessages += $data['forum_message'];

    //On ferme notre boucle et nos balises
}

$query->CloseCursor();

//Le pied de page ici :
include CHEMIN_VUE.'footer';

//On compte les membres
$TotalDesMembres = $db->query('SELECT COUNT(*) FROM utilisateurs')->fetchColumn();
$query->CloseCursor();	
$query = $db->query('SELECT pseudo, id FROM utilisateurs ORDER BY id DESC LIMIT 0, 1');
$data = $query->fetch();
$derniermembre = stripslashes(htmlspecialchars($data['pseudo']));
     