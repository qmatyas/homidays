<h1>Bienvenue à la maison</h1>
<h2>Échangez vos maisons gratuitement entre particuliers du monde entier !</h2>

<h2>Recherche</h2>

<form action="index.php?module=logements&action=lister" method="get" class="recherche">
    <input type="hidden" name="module" value="logements">
    <input type="hidden" name="action" value="lister">
    <input type="text" name="ville" class="ville" placeholder="Dans quelle ville, voulez-vous aller ?" value="<?= (isset($_GET['ville']) ? $_GET['ville'] : ''); ?>">
    <input type="submit" value="Rechercher">
</form>

<?php include 'global/themes.php'; ?>