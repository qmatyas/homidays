<section>
<?php if (!isset($_GET['id']) || $_GET['id'] != $_SESSION['Utilisateur']['id']) : ?>
    <h2>Recherche:</h2>
    <form action="" method="get" class="recherche">
        <input type="hidden" name="module" value="logements">
        <input type="hidden" name="action" value="lister">
        <input type="text" name="ville" placeholder="Qui voulez-vous trouver ?" value="<?= (isset($_GET['ville']) ? $_GET['ville'] : ''); ?>">
        <input type="submit" value="Rechercher">
        <a href="index.php?module=logements&action=recherche_avancee">Recherche avancée</a>
    </form>

    <h2>Résultats:</h2>
    <p><?= count($offres) . ' sur ' . $nombre_offres; ?> offres</p>
<?php else : ?>
    <h2>Mes Logements</h2>
<?php endif; ?>

<?php foreach ($offres as $offre) :?>
    <div class="">
    <div><img src="<?= $offre['image_nom']; ?>" alt="Image de maison <?= $offre['id']; ?>"></div>
    <div>
        <span><?= $offre['nom']; ?></span> 
        <span><b>Type de logement :</b> <?= $offre['type_logement']; ?></span> 
        <span><b>Ville :</b> <?= $offre['ville']; ?></span> 
        <span><b>Pays :</b> <?= $offre['pays']; ?></span> 
        <span><b>Nombre de pièces :</b> <?= $offre['nb_piece']; ?></span> 
        <span><b>Note :</b> <?= $offre['note_totale']; ?> /10</span> 
    <?php if (utilisateur_est_connecte()) : ?>
        <a href="index.php?module=logements&action=afficher&id=<?= $offre['id']; ?>">Voir le logement</a>
    <?php endif; ?>
        </div>
    </div>
    <?php endforeach; ?>
<?php if ($page > 1) : ?>
    <a href="index.php?module=logements&action=lister<?= isset($_GET['id']) ? '&id=' . $_GET['id'] : ''; ?>&page=<?= $page - 1; ?>">Page précédente</a>
<?php endif; ?>
<?php if ($page * $nombre_resultat < $nombre_offres) : ?>
    <a href="index.php?module=logements&action=lister<?= isset($_GET['id']) ? '&id=' . $_GET['id'] : ''; ?>&page=<?= $page + 1; ?>">Page suivante</a>
<?php endif; ?>
</section>
    
  

