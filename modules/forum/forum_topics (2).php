<?php

function recupsujet($bdd){

	$req = $bdd->query('SELECT * FROM topic');
	return $req;
}

function ajoutsujet($bdd, $login, $nom){

	$req = $bdd->query("INSERT INTO `topic`( `Login`, `Nom`,`date`) VALUES ('$login', '$nom',NOW())");
	return $req;
}
function effacertopic($bdd){

	$id_topic=$_GET['id'];
	$req = $bdd->query("DELETE FROM topic WHERE idtopic=$id_topic");
	return $req;
}

