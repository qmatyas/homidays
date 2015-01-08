<?php

function tout_obtenir_forum($lvl) {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare('SELECT cat_id, cat_nom, 
        forum.forum_id, forum_nom, forum_description, forum_message, forum_sujet, auth_vue, sujets.sujet_id,  sujets.sujet_message, message_id, message_date, message_createur, pseudo, 
        utilisateurs.id 
        FROM categories
        LEFT JOIN forum ON categories.cat_id = forum.forum_cat_id
        LEFT JOIN messages ON messages.message_id = forum.forum_dernier_message_id
        LEFT JOIN sujets ON sujets.sujet_id = messages.sujet_id
        LEFT JOIN utilisateurs ON utilisateurs.id = messages.message_createur
        WHERE auth_vue <= :lvl 
        ORDER BY categories.cat_ordre, forum.forum_ordre DESC');

	$requete->bindValue(':lvl',$lvl);
	return $requete->execute();
}

function total_membres($lvl) {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare('SELECT COUNT(*) 
        FROM utilisateurs');

	$requete->bindValue(':lvl',$lvl);
	return $requete->execute();
}
