<h2>Connexion au site</h2>

<p>Si vous n'êtes pas encore inscrit, vous pouvez le faire en <a href="index.php?module=membres&amp;action=inscription">cliquant sur ce lien</a>.</p>

<form action="" method="post">
	<?= isset($erreur['form']) ? $erreur['form'] : ''; ?>
	<p>		
		<label for="pseudo">Pseudo :</label>
		<input type="text" name="pseudo" id="pseudo">
		<?= isset($erreur['pseudo']) ? $erreur['pseudo'] : ''; ?>
	</p><p>
		<label for="pass">Mot de passe:</label>
		<input type="password" name="pass" id="pass">
		<?= isset($erreur['pass']) ? $erreur['pass'] : ''; ?>
	<p/>
	<input type="submit" value="Se connecter" onClick="criteres();">			
</form>
<p><a href="#"> Mot de passe oublié ?</a></p>