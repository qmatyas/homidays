<h2>Contactez les administrateurs</h2>

<div class="form_contact">
<form action="" method="post">
	<p>		
		<label for="nom"><b>Nom :</b></label>
		<input type="text" name="nom" id="nom" value=""/>
		<?= isset($erreur['nom']) ? $erreur['nom'] : ''; ?>
	</p>
	<p>
		<label for="email"><b>Adresse email :</b></label>
		<input type="email" name="email" id="email" value=""/>
		<?= isset($erreur['email']) ? $erreur['email'] : ''; ?>
	<p/>
	<p>		
		<label for="message"><b>Message :</b></label>
		<textarea name="message" id="message"></textarea>
		<?= isset($erreur['message']) ? $erreur['message'] : ''; ?>
	</p>
	<input type="submit" value="Envoyer">			
</form>
</div>


