<?php 

include_once('modeles/forum_message.php');
include_once('modeles/connexion.php');
include('controller/connexionbdd.php');

$cat = categorie($bdd);
if (isset($_POST['msg'])) {
	ajoutmessage($bdd,$_POST['msg'], $_SESSION['Login'],$_GET['id']); 
}

$req= recupmessage($bdd);
if (isset($_GET['idmessage'])){
	effacermessage($bdd);
}


include_once('view/forum_message.php');

?>