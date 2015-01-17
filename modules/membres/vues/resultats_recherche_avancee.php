<h2>Recherche:</h2>

<form action="index.php?module=recherche&action=.php" method="get" class="recherche" >
    
    <p><label for="id_animaux">Animaux :</label><input id="id_animaux" name="animaux" type="checkbox"></p>
    
    <p><label for="id_fumeur">Fumeur :</label><input id="id_fumeur" name="fumeur" type="checkbox"></p>
    
    <label for="voyageurs">Nombre de voyageurs:</label>
    <div id='align'>
       Adulte <input type="number" min="0" size="10" name="nb_adulte" id="nb_adulte" >
       Enfant <input type="number" min="0" size="10" name="nb_enfant" id="nb_enfant" >
    </div>
    
    <input type="submit" value="Valider" class="valider">
    
</form>

<p>Résultats:</p>

<p><?= count($membres) . ' sur ' . $nombre_membres; ?> membres</p>

<ul>
<?php
foreach ($membres as $membre) {
    echo '<li>';
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
<a href="index.php?module=resultats&action=liste_membres&page=<?= $page - 1; ?>">Page précédente</a>
<?php endif; ?>
<?php if ($page * $nombre_resultat < $nombre_membres) : ?>
<a href="index.php?module=resultats&action=liste_membres&page=<?= $page + 1; ?>">Page suivante</a>
<?php endif; ?>
