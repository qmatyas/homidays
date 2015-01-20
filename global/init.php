<?php

// Inclusion du fichier de configuration (qui définit des constantes)
include 'global/config.php';

// Utilisation et démarrage des sessions
session_start();

// Vérifie si l'utilisateur est connecté   
function utilisateur_est_connecte() {
	return !empty($_SESSION['Utilisateur']['id']);
}

// Enregistre un message dans la SESSION
function setFlash($message) {
	if (!isset($_SESSION['Flash']))
		$_SESSION['Flash'] = [];	
	$_SESSION['Flash'][] = $message;
}

// Récupère tous les messages de la SESSION
function flash () {
	$result = '';
	foreach ($_SESSION['Flash'] as $flash)
		$result .= '<p>' . $flash . '</p>';
	echo $result;
	$_SESSION['Flash'] = [];
}

function url ($module = null, $action = null, $params = []) {
	$url = '';
	if (LANG === 'en')
		$url = '&lang=en';
	if ($module)
		$url .= '&module=' . $module;
	if ($action)
		$url .= '&action=' . $action;
	if (!empty($params))
		foreach ($params as $key => $value)
			if ($value !== null)
				$url .= '&' . $key . '=' . $value;
	$url = trim($url, '&');
	return 'index.php' . (!empty($url) ? '?' . $url : '');
}

// Renvoie à la page précédente
function redirect() {
	header('Location: ' . (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php'));
	die();
}

// Inclusion du gestionnaire de connexion à la SGBD
include CHEMIN_LIB.'db.php';


