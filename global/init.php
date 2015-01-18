<?php

// Inclusion du fichier de configuration (qui définit des constantes)
include 'global/config.php';

// Utilisation et démarrage des sessions
session_start();

// Vérifie si l'utilisateur est connecté   
function utilisateur_est_connecte() {
	return !empty($_SESSION['Utilisateur']['id']);
}

function setFlash($message) {
	if (!isset($_SESSION['Flash']))
		$_SESSION['Flash'] = [];	
	$_SESSION['Flash'][] = $message;
}

function flash () {
	$result = '';
	foreach ($_SESSION['Flash'] as $flash)
		$result .= '<p>' . $flash . '</p>';
	echo $result;
	$_SESSION['Flash'] = [];
}

function redirect() {
	header('Location: ' . (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php'));
	die();
}

// Inclusion du gestionnaire de connexion à la SGBD
include CHEMIN_LIB.'db.php';


