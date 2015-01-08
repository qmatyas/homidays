<?php

include CHEMIN_MODELE.'resultats.php';

$nombre_resultat = 10;
$page = isset($_GET['page']) && $_GET['page'] > 1 ? $_GET['page'] : 1;

$offres = recup_liste_offre(($page - 1) * $nombre_resultat, $nombre_resultat);
$nombre_offres = compter_offre();

include CHEMIN_VUE.'afficher_liste_offres.php';

