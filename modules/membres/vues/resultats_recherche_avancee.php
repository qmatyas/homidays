<section>
    <h2>Recherche</h2>
    <form action="" method="get" class="recherche">
        <input type="hidden" name="module" value="membres">
        <input type="hidden" name="action" value="recherche_avancee">
<?php if (LANG === 'en') : ?>
        <input type="hidden" name="lang" value="en">
<?php endif; ?>
        <label for="id_animaux">Animaux :</label><input id="id_animaux" name="animaux" type="checkbox"<?= isset($_GET['animaux']) && $_GET['animaux'] ==='on' ? ' checked' : ''; ?>>
        <label for="id_fumeur">Fumeur :</label><input id="id_fumeur" name="fumeur" type="checkbox"<?= isset($_GET['fumeur']) && $_GET['fumeur'] === 'on' ? ' checked' : ''; ?>>
        <label for="voyageurs">Nombre de voyageurs:</label>
        <div id='align'>
            Adulte <input type="number" min="0" size="10" name="nb_adulte" id="nb_adulte" value="<?= isset($_GET['nb_adulte']) ? $_GET['nb_adulte'] : ''; ?>">
            Enfant <input type="number" min="0" size="10" name="nb_enfant" id="nb_enfant" value="<?= isset($_GET['nb_adulte']) ? $_GET['nb_enfant'] : ''; ?>">
        </div>    
        <input type="submit" value="Valider" class="Rechercher">
    </form>
    <h2>Résultats</h2>
    <p><?= count($membres) . ' sur ' . $nombre_membres; ?> membres</p>
<?php foreach ($membres as $membre) : ?>
    <div class="">
        <div><img src="<?= $membre['avatar']; ?>" alt="Image de <?= $membre['pseudo']; ?>"></div>
        <div>
            <span><?= $membre['pseudo']; ?></span>
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
