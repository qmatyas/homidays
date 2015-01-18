<section>
<?php foreach ($reservations as $reservation) : ?>
	<div>
	<span><?=$reservation['pseudo']; ?></span>
	<span><b>Nom du logement:</b> <?=$reservation['l.nom']; ?></span>
    <span><b>Confirmation:</b><?= $reservation['confirmee'] ? ', <span>Réservation confirmée</span>' : 'Réservation non confirmée'; ?></span>
	</div>
<?php endforeach; ?>
</section>