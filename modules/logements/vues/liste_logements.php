<?php if ($_GET['id'] != $_SESSION['Utilisateur']['id']) : ?>
<p>Recherche:</p>

<p><a href="index.php?module=logements&action=recherche_avancee.php">Recherche avancée</a></p>

<p>Résultats:</p>

<p><?= count($offres) . ' sur ' . $nombre_offres; ?> offres</p>
<?php else : ?>
<h2>Mes Logements</h2>
<?php endif; ?>
<ul>
<?php
foreach ($offres as $offre) {
    echo '<li>';
    if (utilisateur_est_connecte()) {
        echo '<a href="index.php?module=logements&action=afficher&id=' . $offre['id'] . '">';
    }
    echo $offre['nom'] . ' </br> Type: ' . $offre['type_logement'] . '</br>  Ville:  ' . $offre['ville'] . ' Pays:  ' . $offre['pays'] . ' </br> Nombre de pièces : ' . $offre['nb_piece'] . '</br> Note : ' . $offre['note_totale'] . '/10';
    if (utilisateur_est_connecte()) {
        echo '</a>';
    }
    echo '</li> </br>';
}
?>
</ul>

<?php if ($page > 1) : ?>
<a href="index.php?module=logements&action=liste_logements&page=<?= $page - 1; ?>">Page précédente</a>
<?php endif; ?>
<?php if ($page * $nombre_resultat < $nombre_offres) : ?>
<a href="index.php?module=logements&action=liste_logements&page=<?= $page + 1; ?>">Page suivante</a>
<?php endif; ?>