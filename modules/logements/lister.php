<?php

include_once CHEMIN_MODELE.'logements.php';

$nombre_resultat = 3;
$page = isset($_GET['page']) && $_GET['page'] > 1 ? $_GET['page'] : 1;
$params = ['debut' => ($page - 1) * $nombre_resultat, 'nombre' => $nombre_resultat];
if (isset($_GET['id']))
	$params['id'] = $_GET['id'];

$offres = logements_recuperer_liste($params);
$nombre_offres = logements_compter(isset($_GET['id']) ? $_GET['id'] : null);

include CHEMIN_VUE.'liste_logements.php';