<?php

//On démarre la session
session_start();

//On se connecte à MySQL
try{
	$pdo = new PDO('mysql:host=localhost;dbname=bdd', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

//On inclut le logo du site  et le menu
include 'vues/logo.php';
include 'vues/menu.php';

//On inclut le contrôleur s'il existe et s'il est spécifié
if (!empty($_GET['page']) && is_file('controleurs/'.$_GET['page'].'.php'))
{
        include 'controleurs/'.$_GET['page'].'.php';
}
else
{
        include 'controleurs/accueil.php';
}

//On inclut le pied de page
include 'vues/footer.php';

//On ferme la connexion à MySQL

?>



