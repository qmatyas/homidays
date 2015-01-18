<?php

include_once CHEMIN_MODELE.'logements.php';

$nombre_resultat = 10;
$page = isset($_GET['page']) && $_GET['page'] > 1 ? $_GET['page'] : 1;

$offres = recup_recherche_avancee_offre(($page - 1) * $nombre_resultat, $nombre_resultat);
$nombre_offres = logements_compter();

include CHEMIN_VUE.'resultats_recherche_avancee.php';


