<?php


// Identifiants pour la base de données.
define('SQL_HOST', 'localhost');
define('SQL_DBNAME', 'bdd');
define('SQL_USERNAME', 'root');
define('SQL_PASSWORD', '');

// Langue de la page
define('LANG', isset($_GET['lang']) && $_GET['lang'] === 'en' ? 'en' : 'fr');

// Chemins à utiliser pour accéder aux vues, modeles et librairies
define('CHEMIN_VUE', 'modules/' . (empty($module) ? !empty($_GET['module']) ? $_GET['module'] : 'index' : $module) . '/vues/');
define('CHEMIN_MODELE', 'modeles/');
define('CHEMIN_LIB', 'libs/');
define('CHEMIN_VUE_GLOBALE', 'vues_globales/');

// Nombre de messages à afficher par page
define('MAX_ARTICLES_PAR_PAGE', 15);