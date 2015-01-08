<?php

include CHEMIN_MODELE.'resultats.php';

$nombre_resultat = 10;
$page = isset($_GET['page']) && $_GET['page'] > 1 ? $_GET['page'] : 1;

$membres = recup_liste_membre(($page - 1) * $nombre_resultat, $nombre_resultat);
$nombre_membres = compter_membre();

include CHEMIN_VUE.'afficher_liste_membres.php';