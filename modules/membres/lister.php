<?php

include_once CHEMIN_MODELE.'membres.php';

$nombre_resultat = 10;
$page = isset($_GET['page']) && $_GET['page'] > 1 ? $_GET['page'] : 1;

$membres = membres_recuperer_liste(($page - 1) * $nombre_resultat, $nombre_resultat);
$nombre_membres = membres_compter();

include CHEMIN_VUE.'liste_membres.php';