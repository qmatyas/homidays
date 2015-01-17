<?php

include CHEMIN_MODELE.'logements.php';

$nombre_resultat = 10;
$page = isset($_GET['page']) && $_GET['page'] > 1 ? $_GET['page'] : 1;

try {
$offres = logements_recuperer_liste(($page - 1) * $nombre_resultat, $nombre_resultat, isset($_GET['id']) ? $_GET['id'] : null);
} catch (Excetpion $e) {
        echo $e->getMessage();
        die();
    }
   var_dump($offres);
   die();
$nombre_offres = logements_compter();

include CHEMIN_VUE.'liste_logements.php';