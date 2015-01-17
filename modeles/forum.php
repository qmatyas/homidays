<?php

//TOPICS

function recupsujet($bdd)
{
	$req = $bdd->query('SELECT * FROM topic');
	return $req;
}

function ajoutsujet($bdd, $login, $nom)
{
	$req = $bdd->query("INSERT INTO `topic`( `Login`, `Nom`,`date`) VALUES ('$login', '$nom',NOW())");
	return $req;
}

function effacertopic($bdd)
{
	$id_topic=$_GET['id'];
	$req = $bdd->query("DELETE FROM topic WHERE idtopic=$id_topic");
	return $req;
}

//MESSAGES

function recupMessage($bdd){
	$id_topic=$_GET['id'];
	$req = $bdd->query("SELECT * FROM message WHERE id_topic=$id_topic");
	return $req;
}

function ajoutmessage($bdd,$msg, $login, $id_topic){
	$req = $bdd->query("INSERT INTO message (msg,id_topic,login,date) VALUES ('$msg', '$id_topic','$login',NOW())");
}

function effacermessage($bdd){
	$id_message=$_GET['idmessage'];
	$req = $bdd->query("DELETE FROM message WHERE ID_Message=$id_message");
	return $req;
}