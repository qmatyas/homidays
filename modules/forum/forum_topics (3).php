<?php 

include_once('model/forum_topics.php');
include_once('model/connexion.php');
include('controller/connexionbdd.php');


$cat = categorie($bdd);
if (isset($_POST['Topic'])) {
	ajoutsujet($bdd, $_SESSION['Login'], $_POST['Topic']);
}

$req= recupsujet($bdd);
if (isset($_GET['id'])){
effacertopic($bdd);
}

include_once('view/forum_topic.php');
?>