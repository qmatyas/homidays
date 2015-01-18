<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
    
<head>
    
    <?php
    //Si le titre est indiqué, on l'affiche entre les balises <title>
    echo (!empty($titre))?'<title>'.$titre.'</title>':'<title> Forum </title>';
    ?>
    
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    
    <link rel="stylesheet" media="screen" type="text/css" title="Design" href="../style/forum.css" />
   
    <!--        <link rel="shortcut icon" href="../Header/logo.png" type="image/x-icon"/>-->
    
</head>
    
<body>
        
    <nav>
        <a id="pull">Menu</a>
        <ul>
<!--        <li><a href="#"><img src="../Header/logo.png" alt="Homidays" title="Homidays" width="100" height="50" class="logo" id='logo'; /></a></li>-->
            <li><a href="index.php">Romain</a></li>
            <li><a href="#">Recherche</a></li>
            <li><a href="#">Offres</a></li>
            <li><a href="#">Membres</a></li>
            <li><a href="forum/indexf.php">Forum</a></li>
        </ul>
    </nav>
    
    <h1>Homidays</h1>
    
<?php

//Attribution des variables de session
$lvl=(isset($_SESSION['level']))?(int) $_SESSION['level']:1;
$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
$pseudo=(isset($_SESSION['pseudo']))?$_SESSION['pseudo']:'';

//On inclue les 2 pages restantes
include("./includes/functions.php");
include("./includes/configf.php");

?>

    <div id="centre">
