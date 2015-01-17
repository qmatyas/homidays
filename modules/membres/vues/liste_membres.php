<p>Recherche:</p>

<form action="index.php?module=membres&action=lister" method="get" class="recherche" >
    <input type="text" name="pseudo" class="pseudo" placeholder="Qui voulez-vous trouver ?">
    <input type="submit" value="Valider" class="valider">
</form>

<p><a href="index.php?module=membres&action=recherche_avancee.php">Recherche avancée</a></p>

<p>Résultats:</p>

<p><?= count($membres) . ' sur ' . $nombre_membres; ?> membres</p>

<ul>
<?php
foreach ($membres as $membre) {
    echo '<li>';
    echo '<img src="' . $membre['avatar'] . '" alt="Image de ' . $membre['pseudo'] . '">';
    if (utilisateur_est_connecte()) {
        echo '<a href="index.php?module=membres&action=afficher&id=' . $membre['id'] . '">';
    }
    echo $membre['pseudo'] . ' </br> Membre depuis: ' . $membre['date_inscription'] . '</br>  Note:  ' . $membre['note_totale'] . ' /10 </br> Nombre d\'adultes : ' . $membre['nb_adulte'] . '</br> Nombre d\'enfants : ' . $membre['nb_adulte'];
    if (utilisateur_est_connecte()) {
        echo '</a>';
    }
    echo '</li> </br>';
}
?>
</ul>

<?php if ($page > 1) : ?>
<a href="index.php?module=membres&action=lister&page=<?= $page - 1; ?>">Page précédente</a>
<?php endif; ?>
<?php if ($page * $nombre_resultat < $nombre_membres) : ?>
<a href="index.php?module=membres&action=lister&page=<?= $page + 1; ?>">Page suivante</a>
<?php endif; ?>