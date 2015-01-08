<p><?= count($offres) . ' sur ' . $nombre_offres; ?> offres</p>

<ul>
<?php
foreach ($offres as $offre) {
    echo '<li>';
    if (utilisateur_est_connecte()) {
        echo '<a href="index.php?module=resultats&action=profil_membre&id=' . $offre['id'] . '">';
    }
    echo $offre['nom'] . ' </br> Type: ' . $offre['type'] . '</br>  Ville:  ' . $offre['ville'] . ' Pays:  ' . $offre['pays'] . ' </br> Nombre de pièces : ' . $offre['nb_piece'] . '</br> Note : ' . $offre['note_totale'] . '/10';
    if (utilisateur_est_connecte()) {
        echo '</a>';
    }
    echo '</li> </br>';
}
?>
</ul>

<?php if ($page > 1) : ?>
<a href="index.php?module=resultats&action=liste_offres&page=<?= $page - 1; ?>">Page précédente</a>
<?php endif; ?>
<?php if ($page * $nombre_resultat < $nombre_offres) : ?>
<a href="index.php?module=resultats&action=liste_offres&page=<?= $page + 1; ?>">Page suivante</a>
<?php endif; ?>