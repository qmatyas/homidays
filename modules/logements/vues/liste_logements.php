<?php include CHEMIN_VUE.'../trads/liste_logements_' . LANG . '.php'; ?>
<section>
<?php if (!isset($_GET['id']) || $_GET['id'] != $_SESSION['Utilisateur']['id']) : ?>
    <h2>Recherche:</h2>
    <form action="" method="get" class="recherche">
        <input type="hidden" name="module" value="logements">
        <input type="hidden" name="action" value="lister">
<?php if (LANG === 'en') : ?>
        <input type="hidden" name="lang" value="en">
<?php endif; ?>
        <input class="barre_recherche" type="text" name="ville" placeholder="Dans quelle ville voulez-vous aller?" value="<?= (isset($_GET['ville']) ? $_GET['ville'] : ''); ?>">
        <input class="valid_recherche" type="submit" value="Rechercher"><br/>
        <a href="<?= url('logements', 'recherche_avancee'); ?>"><?= TXT_RECHA; ?></a>
    </form>

    <h2>Résultats:</h2>
    <p><?= count($offres) . ' sur ' . $nombre_offres; ?> offres</p>
<?php else : ?>
    <h2>Mes Logements</h2>
<?php endif; ?>

<?php foreach ($offres as $offre) :?>
    <div class="liste">
        <div class="img_liste"><img class="image_resultat" src="<?= $offre['image_nom']; ?>" alt="Image de maison <?= $offre['id']; ?>"></div>
        <div class="info_liste">
            <h3><?= $offre['nom']; ?></h3> 
            <span><b>Type de logement :</b> <?= $offre['type_logement']; ?></span> 
            <span><b>Ville :</b> <?= $offre['ville']; ?></span> 
            <span><b>Pays :</b> <?= $offre['pays']; ?></span> 
            <span><b>Nombre de pièces :</b> <?= $offre['nb_piece']; ?></span> 
            <span><b>Note :</b> <?= $offre['note_totale']; ?> /10</span> 
    <?php if (utilisateur_est_connecte()) : ?>
            <a href="<?= url('logements', 'afficher', ['id' => $offre['id']]); ?>">Voir le logement</a>
    <?php endif; ?>
    <?php if (!utilisateur_est_connecte()) : ?>
            <p><i>Si vous voulez avoir plus d'informations sur ce logement, veuillez-vous inscrire.</i></p>
            <a href="<?= url('membres', 'inscription', ['id' => $offre['id']]); ?>">S'inscrire</a>
    <?php endif; ?>
        </div>
    </div>
    <?php endforeach; ?>
<?php if ($page > 1) : ?>
    <a href="<?= url('logements', 'lister', ['page' => $page - 1, 'id' => isset($_GET['id']) ? $_GET['id'] : null]); ?>">Page précédente</a>
<?php endif; ?>
<?php if ($page * $nombre_resultat < $nombre_offres) : ?>
    <a href="<?= url('logements', 'lister', ['page' => $page + 1, 'id' => isset($_GET['id']) ? $_GET['id'] : null]); ?>">Page suivante</a>
<?php endif; ?>
</section>
    
  

