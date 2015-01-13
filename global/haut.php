<!DOCTYPE html>

<html lang="fr">

<head>

	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

	<title>Homidays</title>

	<meta http-equiv="Content-Language" content="fr" />

	<link rel="stylesheet" href="style/global.css" type="text/css" media="screen" />
        
<!--        <link rel="shortcut icon" href="../Header/logo.png" type="image/x-icon"/>-->

</head>

<body>
    
    <h1>Homidays</h1>
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>		
    <script type="text/javascript" src="style/supersized.3.2.7.min.js"></script>

    <script type="text/javascript">

        jQuery(function($){

            $.supersized({

                // Functionality

                // Length between transitions
                slide_interval:5000,
                // 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
                transition:1, 
                // Speed of transition
                transition_speed:700,		

                // Components	

                // Individual links for each slide (Options: false, 'num', 'name', 'blank')
                slide_links:'blank',
                // Slideshow Images
                slides:[			
                            {image : 'images/site/supersized/supersized1.jpg', thumb : 'images/site/supersized/supersized1.jpg'},
                            {image : 'images/site/supersized/supersized2.jpg', thumb : 'images/site/supersized/supersized2.jpg'},  
                            {image : 'images/site/supersized/supersized3.png', thumb : 'images/site/supersized/supersized3.png'},  
                            {image : 'images/site/supersized/supersized4.jpg', thumb : 'images/site/supersized/supersized4.jpg'},  
                            {image : 'images/site/supersized/supersized5.jpg', thumb : 'images/site/supersized/supersized5.jpg'},  
                            {image : 'images/site/supersized/supersized6.jpg', thumb : 'images/site/supersized/supersized6.jpg'},  
                            {image : 'images/site/supersized/supersized7.jpg', thumb : 'images/site/supersized/supersized7.jpg'},  
                            {image : 'images/site/supersized/supersized8.jpg', thumb : 'images/site/supersized/supersized8.jpg'}    
                        ]

            });
        });

    </script>
        
        <nav>
            <a id="pull">Menu</a>
            <ul>
<!--		<li><a href="#"><img src="../Header/logo.png" alt="Homidays" title="Homidays" width="100" height="50" class="logo" id='logo'; /></a></li>-->
		<li><a href="index.php">Accueil</a></li>
		<li><a href="#">Recherche</a></li>
		<li><a href="index.php?module=resultats&action=liste_offres">Offres</a></li>
		<li><a href="index.php?module=resultats&action=liste_membres">Membres</a></li>
                <li><a href="forum/indexf.php">Forum</a></li>
            </ul>
	</nav>
    
<?php include 'global/menu.php'; ?>

	<div class="centre">
