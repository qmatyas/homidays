<h2>Modification de votre profil utilisateur</h2>

<form method="post" action="" id="form" name="form"> 
	<fieldset>
	<legend><b>Votre Identité</b></legend>
	<p>
		<label for="nom">Nom :</label>
		<input type="text" name="nom" id="nom" value="<?= isset($_SESSION['Utilisateur']['nom']) ? $_SESSION['Utilisateur']['nom'] : ''; ?>"required /> <!--Ici, le PHP sert à conserver les champs où il n'y a pas d'erreur-->
		<span class="error_message"> <?= isset($erreur['nom']) ? $erreur['nom'] : ''; ?> </span> <!--Ici, le PHP sert à afficher un message d'erreur si la case est vide-->
	</p>
	<p>
		<label for="prenom">Prénom :</label>
		<input type="text" name="prenom" id="prenom" value="<?= isset($_SESSION['Utilisateur']['prenom']) ? $_SESSION['Utilisateur']['prenom'] : ''; ?>" required />
		<span class="error_message"> <?= isset($erreur['prenom']) ? $erreur['prenom'] : ''; ?> </span>
	</p>
	<p>
		<label for="sexe">Sexe:</label>
		<select name="sexe" id="sexe">
			<option value="femme" <?= isset($_SESSION['Utilisateur']['sexe']) && $_SESSION['Utilisateur']['sexe'] == 0 ? 'selected' : ''; ?>>Femme</option>
			<option value="homme" <?= isset($_SESSION['Utilisateur']['sexe']) && !$_SESSION['Utilisateur']['sexe'] == 1 ? 'selected' : ''; ?>>Homme</option>
		</select>
	</p>
	<p>
		<label for="naissance">Date de naissance :</label>
		<input type="date" name="date_naissance" id="date_naissance" value="<?= isset($_SESSION['Utilisateur']['date_naissance']) ? $_SESSION['Utilisateur']['date_naissance'] : ''; ?>" required />
		<span class="error_message"> <?= isset($erreur['date_naissance']) ? $erreur['date_naissance'] : ''; ?> </span>
	</p>
	<p>
		<label for="profession">Profession :</label>
		<input type="text" name="profession" id="profession" value="<?= isset($_SESSION['Utilisateur']['profession']) ? $_SESSION['Utilisateur']['profession'] : ''; ?>" required />
		<span class="error_message"> <?= isset($erreur['profession']) ? $erreur['profession'] : ''; ?> </span>
	</p>
	<p>
		<label for="id_langue">Langue(s) parlée(s) :</label>
		<textarea id="id_langue" name="langue"><?= isset($_SESSION['Utilisateur']['langue']) ? $_SESSION['Utilisateur']['langue'] : ''; ?></textarea>
		<span class="error_message"> <?= isset($erreur['langue']) ? $erreur['langue'] : ''; ?> </span>
	</p>
	</fieldset>
	
	<fieldset>
		<legend><b>Vos coordonnées </b></legend>
		<p>
			<label for="email">Adresse email :</label>
			<input type="email" name="email" id="email" value="<?= isset($_SESSION['Utilisateur']['email']) ? $_SESSION['Utilisateur']['email'] : ''; ?>"  required />
			<span class="error_message"> <?= isset($erreur['email']) ? $erreur['email'] : ''; ?> </span>
		</p>
		<p>
			<label for="tel">Numéro de téléphone :</label>
			<input type="tel" name="tel" id="tel" value="<?= isset($_SESSION['Utilisateur']['tel']) ? $_SESSION['Utilisateur']['tel'] : ''; ?>" required />
			<span class="error_message"> <?= isset($erreur['tel']) ? $erreur['tel'] : ''; ?> </span>
		</p>
		<p>
		<label for="adresse">Adresse principale: </label>
		
		<div id="bloc"> 
		
			<input type="text" name="rue" id="rue" placeholder="Rue" size="30" maxlength="45" value="<?= isset($_SESSION['Utilisateur']['rue']) ? $_SESSION['Utilisateur']['rue'] : ''; ?>"required />
			<span class="error_message"> <?= isset($erreur['rue']) ? $erreur['rue'] : ''; ?> </span></br>
			
			<input type="text" name="code_postal" id="code_postal" placeholder="Code Postal" size="10" maxlength="45" value="<?= isset($_SESSION['Utilisateur']['code_postal']) ? $_SESSION['Utilisateur']['code_postal'] : ''; ?>" required/>
			<span class="error_message"> <?= isset($erreur['code_postal']) ? $erreur['code_postal'] : ''; ?> </span></br>
			
			<input type="text" name="ville" id="ville" placeholder="Ville" size="20" maxlength="45" value="<?= isset($_SESSION['Utilisateur']['ville']) ? $_SESSION['Utilisateur']['ville'] : ''; ?>" required />
			<span class="error_message"> <?= isset($erreur['ville']) ? $erreur['ville'] : ''; ?> </span></br>
			
			<input type="text" name="pays" id="pays" placeholder="Pays" size="20" maxlength="45" value="<?= isset($_SESSION['Utilisateur']['pays']) ? $_SESSION['Utilisateur']['pays'] : ''; ?>" required/>
			<span class="error_message"> <?= isset($erreur['pays']) ? $erreur['pays'] : ''; ?> </span>
	
		</div>

	</p>
	</fieldset>
	
	<fieldset>
	<legend><b>Votre profil</b></legend>
	<p>
		<label for="pseudo">Pseudo :</label>
		<input type="text" name="pseudo" id="pseudo" value="<?= isset($_SESSION['Utilisateur']['pseudo']) ? $_SESSION['Utilisateur']['pseudo'] : ''; ?>" required />
		<span class="error_message"> <?= isset($erreur['pseudo']) ? $erreur['pseudo'] : ''; ?> </span>
	</p>
	<p>
		<label for="photo">Photo de profil :</label>
		<input type="file" name="photo_profil" id="photo_profil">
		<span class="error_message"> <?= isset($erreur['photo_profil']) ? $erreur['photo_profil'] : ''; ?> </span>
	</p>
	<p>
		<label for="voyageurs">Nombre de voyageurs:</label>
             <div id='align'>
                Adulte <input type="number" min="0" size="10" name="nb_adulte" id="nb_adulte" value="<?= isset($_SESSION['Utilisateur']['nb_adulte']) ? $_SESSION['Utilisateur']['nb_adulte'] : ''; ?>" required/>
				Enfant <input type="number" min="0" size="10" name="nb_enfant" id="nb_enfant" value="<?= isset($_SESSION['Utilisateur']['nb_enfant']) ? $_SESSION['Utilisateur']['nb_enfant'] : ''; ?>" required/>
				<span class="error_message"> <?= isset($erreur['nb_adulte']) ? $erreur['nb_adulte'] : ''; ?> </span>
				<span class="error_message"> <?= isset($erreur['nb_enfant']) ? $erreur['nb_enfant'] : ''; ?> </span>
             </div>
	</p>
	<p>
		<label for="id_animaux">Animaux :</label>
		<input id="id_animaux" name="animaux" type="checkbox"<?= isset($_SESSION['Utilisateur']['animaux']) && $_SESSION['Utilisateur']['animaux'] ? ' checked' : ''; ?>>
		<span class="error_message"> <?= isset($erreur['animaux']) ? $erreur['animaux'] : ''; ?> </span>
	</p>
	<p>
		<label for="id_fumeur">Fumeur :</label>
		<input id="id_fumeur" name="fumeur" type="checkbox"<?= isset($_SESSION['Utilisateur']['fumeur']) && $_SESSION['Utilisateur']['fumeur'] ? ' checked' : ''; ?>>
		<span class="error_message"> <?= isset($erreur['fumeur']) ? $erreur['fumeur'] : ''; ?> </span>
	</p>
	<p>
		<label for="interet"> Centres d'intérêt: </label><br />	
		<textarea name="interet" id="interet" rows="10" cols="50" placeholder="Voyages, Lecture, Musique, Films, Promenade ..."><?= isset($_SESSION['Utilisateur']['interet']) ? $_SESSION['Utilisateur']['interet'] : ''; ?>  </textarea> 
		<span class="error_message"> <?= isset($erreur['interet']) ? $erreur['interet'] : ''; ?> </span>      
	</p>
		<input type="submit" id="submit" value="Enregistrer">
	</fieldset>
	
</form>

<form action="" method="post">
        <fieldset>
            <legend><b>Changer de mot de passe</b></legend>
            <span class="error_message"> <?= isset($erreur['pass']) ? $erreur['pass'] : ''; ?> </span>
            <p>
                    <label for="pass0">Ancien mot de passe:</label>
                    <input type="password" name="pass0" id="pass0"  required>
            </p>
            <p>
                    <label for="pass">Mot de passe:</label>
                    <input type="password" name="pass" id="pass"  required>
            </p>
            <p>
                    <label for="pass2">Confirmer mot de passe:</label>
                    <input type="password" name="pass2" id="pass2" required>
            </p>
            <input type="submit" id="submit" value="Enregistrer">
        </fieldset>
</form>