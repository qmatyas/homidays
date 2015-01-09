
<form method="post" enctype="multipart/form-data">
	<p>
		<label for="id_nom">Nom :</label>
		<input id="id_nom" name="nom" type="text" value="<?= isset($_POST['nom']) ? $_POST['nom'] : ''; ?>">
	</p>
	<p>
		<label for="id_prenom">Prénom :</label>
		<input id="id_prenom" name="prenom" type="text" value="<?= isset($_POST['prenom']) ? $_POST['prenom'] : ''; ?>">
	</p>
	<p>
		<label for="id_sexe">Sexe :</label>
		<input id="id_sexe" name="sexe" type="text" value="<?= isset($_POST['sexe']) ? $_POST['sexe'] : ''; ?>">
	</p>
	<p>
		<label for="id_date_naissance">Date de naissance :</label>
		<input id="id_date_naissance" name="date_naissance" type="text" value="<?= isset($_POST['date_naissance']) ? $_POST['date_naissance'] : ''; ?>">
	</p>
	<p>
		<label for="id_profession">Profession :</label>
		<input id="id_profession" name="profession" type="text" value="<?= isset($_POST['profession']) ? $_POST['profession'] : ''; ?>">
	</p>
	<p>
		<label for="id_langue">Langue(s) parlée(s) :</label>
		<textarea id="id_langue" name="langue"><?= isset($_POST['langue']) ? $_POST['langue'] : ''; ?></textarea>
	</p>
	<p>
		<label for="id_carte_ID">Copie de carte d'identité :</label>
		<input id="id_carte_ID" name="carte_ID" type="file" value="<?= isset($_POST['carte_ID']) ? $_POST['carte_ID'] : ''; ?>">
	</p>
	<p>
		<label for="id_email">Adresse email :</label>
		<input id="id_email" name="email" type="text" value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>">
	</p>
	<p>
		<label for="id_tel">Numéro de téléphone :</label>
		<input id="id_tel" name="tel" type="text" value="<?= isset($_POST['tel']) ? $_POST['tel'] : ''; ?>">
	</p>
	<p>
		<label for="id_rue">Rue :</label>
		<input id="id_rue" name="rue" type="text" value="<?= isset($_POST['rue']) ? $_POST['rue'] : ''; ?>">
	</p>
	<p>
		<label for="id_code_postal">Code postal :</label>
		<input id="id_code_postal" name="code_postal" type="text" value="<?= isset($_POST['code_postal']) ? $_POST['code_postal'] : ''; ?>">
	</p>
	<p>
		<label for="id_ville">Ville :</label>
		<input id="id_ville" name="ville" type="text" value="<?= isset($_POST['ville']) ? $_POST['ville'] : ''; ?>">
	</p>
	<p>
		<label for="id_pays">Pays :</label>
		<input id="id_pays" name="pays" type="text" value="<?= isset($_POST['pays']) ? $_POST['pays'] : ''; ?>">
	</p>
	<p>
		<label for="id_pseudo">Pseudo :</label>
		<input id="id_pseudo" name="pseudo" type="text" value="<?= isset($_POST['pseudo']) ? $_POST['pseudo'] : ''; ?>">
	</p>
	<p>
		<label for="id_pass">Mot de passe :</label>
		<input id="id_pass" name="pass" type="password" value="<?= isset($_POST['pass']) ? $_POST['pass'] : ''; ?>">
	</p>
	<p>
		<label for="id_pass_verif">Mot de passe (vérification) :</label>
		<input id="id_pass_verif" name="pass_verif" type="password" value="<?= isset($_POST['pass_verif']) ? $_POST['pass_verif'] : ''; ?>">
	</p>
	<p>
		<label for="id_avatar">Avatar (facultatif) :</label>
		<input id="id_avatar" name="avatar" type="file" value="<?= isset($_POST['avatar']) ? $_POST['avatar'] : ''; ?>">
	</p>
	<p>
		<label for="id_nb_adulte">Nombre d'adultes :</label>
		<input id="id_nb_adulte" name="nb_adulte" type="text" value="<?= isset($_POST['nb_adulte']) ? $_POST['nb_adulte'] : ''; ?>">
	</p>
	<p>
		<label for="id_nb_enfant">Nombre d'enfants :</label>
		<input id="id_nb_enfant" name="nb_enfant" type="text" value="<?= isset($_POST['nb_enfant']) ? $_POST['nb_enfant'] : ''; ?>">
	</p>
	<p>
		<label for="id_interet">Centre d'intérêt :</label>
		<textarea id="id_interet" name="interet" value="<?= isset($_POST['interet']) ? $_POST['interet'] : ''; ?>"></textarea>
	</p>
	<p>
		<label for="id_animaux">Animaux :</label>
		<input id="id_animaux" name="animaux" type="text" value="<?= isset($_POST['animaux']) ? $_POST['animaux'] : ''; ?>">
	</p>
	<p>
		<label for="id_fumeur">Fumeur :</label>
		<input id="id_fumeur" name="fumeur" type="text" value="<?= isset($_POST['fumeur']) ? $_POST['fumeur'] : ''; ?>">
	</p>
		<input name="uniqid" type="hidden" value="formulaire_inscription">
		<input name="POST_MAX_SIZE" type="hidden" value="8192">
	<p>
		<input name="submit" type="submit" value="Je m'inscris !">
	</p>
</form>