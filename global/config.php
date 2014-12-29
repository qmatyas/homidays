<?php

// Identifiants pour la base de données. Nécessaires a PDO2.
define('SQL_DSN',      'mysql:dbname=bdd;host=localhost');
define('SQL_USERNAME', 'root');
define('SQL_PASSWORD', '');

// Chemins à utiliser pour accéder aux vues/modeles/librairies
$module = empty($module) ? !empty($_GET['module']) ? $_GET['module'] : 'index' : $module;
define('CHEMIN_VUE',    'modules/'.$module.'/vues/');
define('CHEMIN_MODELE', 'modeles/');
define('CHEMIN_LIB',    'libs/');
define('CHEMIN_VUE_GLOBALE', 'vues_globales/');

// Configurations relatives à l'avatar
define('AVATAR_LARGEUR_MAXI', 100);
define('AVATAR_HAUTEUR_MAXI', 100);
define('DOSSIER_AVATAR', 'images/avatars/');

// Configurations relatives à la carte d'identité
define('CARTE_ID_LARGEUR_MAXI', 100);
define('CARTE_ID_HAUTEUR_MAXI', 100);
define('DOSSIER_CARTE_ID', 'images/carte_ID/');

// Configurations relatives au justificatif de logement
define('JUST_LOG_LARGEUR_MAXI', 100);
define('JUST_LOG_HAUTEUR_MAXI', 100);
define('DOSSIER_JUST_LOG', 'images/just_log/');

// Configurations relatives aux photos
define('PHOTO_LARGEUR_MAXI', 100);
define('PHOTO_HAUTEUR_MAXI', 100);
define('DOSSIER_PHOTO', 'images/photos/');

// Nombre de messages à afficher par page
 define('MAX_ARTICLES_PAR_PAGE', 15);



