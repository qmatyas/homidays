<?php

// Inclusion du fichier de configuration (qui définit des constantes)
include 'global/config.php';

// Utilisation et démarrage des sessions
session_start();

// Vérifie si l'utilisateur est connecté   
function utilisateur_est_connecte() {
	return !empty($_SESSION['Utilisateur']['id']);
}

// Inclusion du gestionnaire de connexion à la SGBD
include CHEMIN_LIB.'db.php';


