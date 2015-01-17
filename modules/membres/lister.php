<?php

include CHEMIN_MODELE.'membres.php';

$nombre_resultat = 10;
$page = isset($_GET['page']) && $_GET['page'] > 1 ? $_GET['page'] : 1;

$membres = membres_recuperer_liste(($page - 1) * $nombre_resultat, $nombre_resultat);
$nombre_membres = ();

include CHEMIN_VUE.'afficher_liste_membres.php';