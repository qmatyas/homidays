<section>
    <h2>Recherche</h2>

    <form action="" method="get" class="recherche">
        <input type="hidden" name="module" value="membres">
        <input type="hidden" name="action" value="lister">
<?php if (LANG === 'en') : ?>
        <input type="hidden" name="lang" value="en">
<?php endif; ?>
        <input class="barre_recherche" type="text" name="pseudo" class="pseudo" placeholder="Qui voulez-vous trouver ?" value="<?= (isset($_GET['pseudo']) ? $_GET['pseudo'] : ''); ?>">
        <input class="valid_recherche" type="submit" value="Rechercher"><br/>
        <a href="<?= url('membres', 'recherche_avancee'); ?>" class="">Recherche avancée</a>
    </form>

    <h2>Résultats</h2>
    <p><?= count($membres) . ' sur ' . $nombre_membres; ?> membres</p>

<?php foreach ($membres as $membre) : ?>
    <div class="liste">
        <div class="img_liste"><img class="image_resultat" src="<?= $membre['avatar']; ?>" alt="Image de <?= $membre['pseudo']; ?>"></div>
        <div class="info_liste">
            <span class="nom_log"><b><?= $membre['pseudo']; ?></b></span>
            <span><b>Membre depuis :</b> <?= (new DateTime($membre['date_inscription']))->format('d/m/Y'); ?></span>
            <span><b>Note :</b> <?= $membre['note_totale'] === null ? '-' : $membre['note_totale']; ?> / 10</span>
            <span><b>Nombre d'adultes :</b> <?= $membre['nb_adulte']; ?></span>
            <span><b>Nombre d'enfants :</b> <?= $membre['nb_adulte']; ?></span>
    <?php if (utilisateur_est_connecte()) : ?>
            <a href="<?= url('membres', 'afficher', ['id' => $membre['id']]); ?>">Voir son profil</a>
    <?php endif; ?>
        </div>
    </div>
<?php endforeach; ?>
<?php if ($page > 1) : ?>
    <a href="<?= url('membres', 'lister', ['page' => $page - 1, 'pseudo' => isset($_GET['pseudo']) ? $_GET['pseudo'] : null]); ?>">Page précédente</a>
<?php endif; ?>
<?php if ($page * $nombre_resultat < $nombre_membres) : ?>
    <a href="<?= url('membres', 'lister', ['page' => $page + 1, 'pseudo' => isset($_GET['pseudo']) ? $_GET['pseudo'] : null]); ?>">Page suivante</a>
<?php endif; ?>
</section>
