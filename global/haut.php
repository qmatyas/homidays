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
        <nav>
            <a id="pull">Menu</a>
            <ul>
<!--		<li><a href="#"><img src="../Header/logo.png" alt="Homidays" title="Homidays" width="100" height="50" class="logo" id='logo'; /></a></li>-->
		<li><a href="index.php">Accueil</a></li>
		<li><a href="<?= url('logements', 'lister'); ?>">Logements</a></li>
		<li><a href="<?= url('membres', 'lister'); ?>">Membres</a></li>
                <li><a href="forum/indexf.php">Forum</a></li>
            </ul>
	</nav>

<?php include 'global/espace_membre.php'; ?>
	<div class="centre">