<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<title>Homidays</title>
	<meta http-equiv="Content-Language" content="fr" />
	<link rel="stylesheet" href="style/global.css" type="text/css" media="screen" />
        <link rel="shortcut icon" href="images/site/logo_homidays.png" type="image/x-icon"/>
</head>

<body>
    <h1 class="homidays">Homidays</h1>
        <nav>
            <ul>
		<li><a href=""><img src="images/site/logo_homidays.png" class="logo_homidays" /></a></li>            
		<li><a href="<?= url(); ?>">Accueil</a></li>
		<li><a href="<?= url('logements', 'lister'); ?>">Logements</a></li>
		<li><a href="<?= url('membres', 'lister'); ?>">Membres</a></li>
<?php if (LANG === 'en') : ?>
        <li><a href="<?= url(isset($_GET['module']) ? $_GET['module'] : '', isset($_GET['action']) ? $_GET['action'] : '', ['lang' => 'fr']); ?>">FR</a></li>
<?php else : ?>
        <li><a href="<?= url(isset($_GET['module']) ? $_GET['module'] : '', isset($_GET['action']) ? $_GET['action'] : '', ['lang' => 'en']); ?>">EN</a></li>
<?php endif; ?>
            </ul>
		</nav>

<?php include 'global/espace_membre.php'; ?>
	<div class="centre">