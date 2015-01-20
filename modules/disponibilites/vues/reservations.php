<h2>Réservations</h2>

<?php foreach ($reservations as $reservation) :?>
    <div class="liste">
        <div class="img_liste"><img class="image_resultat" src="<?= $reservation['image_nom']; ?>" alt="Image de maison <?= $reservation['id']; ?>"></div>
        <div class="info_liste">
            <h3><?= $reservation['nom']; ?></h3>
            <span><b>Pseudo du propriétaire :</b> <?= $reservation['pseudo']; ?></span> 
            <span><b>Réservation confirmée ?</b> <?= $reservation['confirmee'] ? 'Oui' : 'Non'; ?></span> 
            <span><b>Type de logement :</b> <?= $reservation['type_logement']; ?></span> 
            <span><b>Ville :</b> <?= $reservation['ville']; ?></span> 
            <span><b>Pays :</b> <?= $reservation['pays']; ?></span> 
            <span><b>Nombre de pièces :</b> <?= $reservation['nb_piece']; ?></span> 
            <span><b>Note :</b> <?= $reservation['note_totale']; ?> /10</span> 
        </div>
    </div>
<?php endforeach; ?>