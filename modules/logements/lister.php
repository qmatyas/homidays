<?php

include CHEMIN_MODELE.'logements.php';

$nombre_resultat = 10;
$page = isset($_GET['page']) && $_GET['page'] > 1 ? $_GET['page'] : 1;
$id = isset($_GET['id']) ? $_GET['id'] : null;

$offres = logements_recuperer_liste([($page - 1) * $nombre_resultat, $nombre_resultat, $id]);
$nombre_offres = logements_compter($id);

include CHEMIN_VUE.'liste_logements.php';