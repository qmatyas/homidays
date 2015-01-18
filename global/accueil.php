<h1 class="bienvenue">Bienvenue à la maison</h1>
<h2>Échangez vos maisons gratuitement entre particuliers du monde entier !</h2>

<form action="index.php?module=logements&action=lister" method="get" class="recherche">
    <input type="hidden" name="module" value="logements">
    <input type="hidden" name="action" value="lister">
    <input class="barre_recherche" type="text" name="ville" class="ville" placeholder="Dans quelle ville, voulez-vous aller ?" value="<?= (isset($_GET['ville']) ? $_GET['ville'] : ''); ?>">
    <input class="valide_recherche" type="submit" value="Rechercher">
</form>

<?php include 'global/themes.php'; ?>