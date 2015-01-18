<?php flash(); ?>

<ul>
<?php foreach ($disponibilites as $disponibilite) : ?>
	<li>Du <?= (new DateTime($disponibilite['date_debut']))->format('d/m/Y'); ?> au <?= (new DateTime($disponibilite['date_fin']))->format('d/m/Y'); ?> <a href="index.php?module=disponibilites&action=supprimer&id=<?= $disponibilite['id']; ?>">Supprimer</a></li>
<?php endforeach; ?>
</ul>
<form action="index.php?module=disponibilites&action=ajouter_disponibilites&id=<?= isset($logement['id']) ? $logement['id'] : $_GET['id']; ?>" method="post">

	<h2>Ajouter des disponibilites</h2>
	<input type="date" name="date_debut" required>
	<input type="date" name="date_fin" required>
	<span class="error_message"><?= isset($erreur) ? $erreur : ''; ?></span>
	<input type="submit" value="Ajouter">

</form>