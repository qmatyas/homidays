<p>L'inscription de votre logement s'est déroulée avec succès !</p>

<form action="index.php?module=images&amp;action=images_ajouter&amp;id=<?= isset($logement['id']) ? $logement['id'] : $_GET['id']; ?>" method="post" enctype="multipart/form-data">

	<h2>Ajouter des photos</h2>
	<input type="hidden" name="logement_id" value="<?= isset($logement['id']) ? $logement['id'] : $_GET['id']; ?>">
	<input type="file" name="photos[]" multiple>
	<span class="error_message"> <?= isset($erreur) ? $erreur : ''; ?></span>
	<input type="submit" value="Ajouter">
	
</form>