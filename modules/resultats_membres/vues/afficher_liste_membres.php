<p><?= count($membres) . ' de ' . $nombre_membres; ?> utilisateurs</p>

<ul>
<?php
foreach ($membres as $membre) {
    echo '<li>';
    if (utilisateur_est_connecte()) {
        echo '<a href="index.php?module=resultats_membres&action=resultats_membres&id=' . $membre['id'] . '">';
    }
    echo $membre['pseudo'] . ' : ' . $membre['nom'] . ' ' . $membre['prenom'];
    if (utilisateur_est_connecte()) {
        echo '</a>';
    }
    echo '</li>';
}
?>
</ul>

<?php if ($page > 1) : ?>
<a href="index.php?module=resultats_membres&action=liste_membres&page=<?= $page - 1; ?>">Page précédente</a>
<?php endif; ?>
<?php if ($page * $nombre_resultat < $nombre_membres) : ?>
<a href="index.php?module=resultats_membres&action=liste_membres&page=<?= $page + 1; ?>">Page suivante</a>
<?php endif; ?>