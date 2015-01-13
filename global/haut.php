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
                            {image : 'http://www.fond-ecran-hd.net/pc-driver/1509.jpg', thumb : 'http://www.fond-ecran-hd.net/pc-driver/1509.jpg'},
                            {image : 'http://www.fond-ecran-hd.net/pc-driver/1524.jpg', thumb : 'http://www.fond-ecran-hd.net/pc-driver/1524.jpg'},  
                            {image : 'http://iwallpapers.free.fr/upload/2012/09/23/20120923103912-b4915353.jpg', thumb : 'http://iwallpapers.free.fr/upload/2012/09/23/20120923103912-b4915353.jpg'},  
                            {image : 'http://www.fond-ecran-hd.net/pc-driver/1552.jpg', thumb : 'http://www.fond-ecran-hd.net/pc-driver/1552.jpg'},  
                            {image : 'http://www.fond-ecran-hd.net/pc-driver/1316.jpg', thumb : 'http://www.fond-ecran-hd.net/pc-driver/1316.jpg'},  
                            {image : 'http://www.fond-ecran-hd.net/pc-driver/1391.jpg', thumb : 'http://www.fond-ecran-hd.net/pc-driver/1391.jpg'},  
                            {image : 'http://iwallpapers.free.fr/upload/2012/10/21/20121021141531-852cc670.jpg', thumb : 'http://iwallpapers.free.fr/upload/2012/10/21/20121021141531-852cc670.jpg'},  
                            {image : 'http://iwallpapers.free.fr/upload/2013/08/25/20130825101727-8f46b878.jpg', thumb : 'http://iwallpapers.free.fr/upload/2013/08/25/20130825101727-8f46b878.jpg'},  
                            {image : 'http://iwallpapers.free.fr/upload/2012/01/18/20120118144450-1e2f1894.jpg', thumb : 'http://iwallpapers.free.fr/upload/2012/01/18/20120118144450-1e2f1894.jpg'}  
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
    
        <h1>Homidays</h1>

<?php include 'global/menu.php'; ?>

	<div id="centre">
