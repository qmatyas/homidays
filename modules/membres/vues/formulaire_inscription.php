<h2>Inscription au site</h2>

<form method="post" action="" enctype="multipart/form-data"> 
	<fieldset>
		<legend><b>Votre Identité</b></legend>
		<p>
			<label for="nom">Nom :</label>
			<input type="text" name="nom" id="nom" value="<?php if(isset($_POST['nom'])) echo $_POST['nom']; ?>"required /> 
			<span class="error_message"><?php if(isset($erreur['nom'])) echo $erreur['nom']; ?></span> 
		</p>
		<p>
			<label for="prenom">Prénom :</label>
			<input type="text" name="prenom" id="prenom" value="<?php if(isset($_POST['prenom'])) echo $_POST['prenom']; ?>" required />
			<span class="error_message"><?php if(isset($erreur['prenom'])) echo $erreur['prenom']; ?></span>
		</p>
		<p>
			<label for="sexe">Sexe:</label>
			<select name="sexe" id="sexe">
				<option value="femme">Femme</option>
				<option value="homme">Homme</option>
			</select>
		</p>
		<p>
			<label for="naissance">Date de naissance :</label>
			<input type="date" name="date_naissance" id="date_naissance" value="<?php if(isset($_POST['date_naissance'])) echo $_POST['date_naissance']; ?>" required />
			<span class="error_message"><?php if(isset($erreur['date_naissance'])) echo $erreur['date_naissance']; ?></span>
		</p>
		<p>
			<label for="profession">Profession :</label>
			<input type="text" name="profession" id="profession" value="<?php if(isset($_POST['profession'])) echo $_POST['profession']; ?>" required />
			<span class="error_message"><?php if(isset($erreur['profession'])) echo $erreur['profession']; ?></span>
		</p>
		<p>
			<label for="id_langue">Langue(s) parlée(s) :</label>
			<textarea id="id_langue" name="langue"><?= isset($_POST['langue']) ? $_POST['langue'] : ''; ?></textarea>
			<span class="error_message"><?php if(isset($erreur['langue'])) echo $erreur['langue']; ?></span>
		</p>
	</fieldset>
	
	<fieldset>
		<legend><b>Vos coordonnées </b></legend>
		<p>
			<label for="email">Adresse email :</label>
			<input type="email" name="email" id="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"  required />
			<span class="error_message"><?php if(isset($erreur['email'])) echo $erreur['email']; ?></span>
		</p>
		<p>
			<label for="tel">Numéro de téléphone :</label>
			<input type="tel" name="tel" id="tel" value="<?php if(isset($_POST['tel'])) echo $_POST['tel']; ?>" required />
			<span class="error_message"><?php if(isset($erreur['tel'])) echo $erreur['tel']; ?></span>
		</p>
		<p>
			<label for="adresse">Adresse principale: </label>
			<div class="bloc">
				<input type="text" name="rue" id="rue" placeholder="Rue" size="20" maxlength="45" value="<?php if(isset($_POST['rue'])) echo $_POST['rue']; ?>"required />
				<span class="error_message"><?php if(isset($erreur['rue'])) echo $erreur['rue']; ?></span></br>
				
				<input type="text" class="etiquette_gauche" name="code_postal" id="code_postal" placeholder="Code Postal" size="20" maxlength="45" value="<?php if(isset($_POST['code_postal'])) echo $_POST['code_postal']; ?>" required/>
				<span class="error_message"><?php if(isset($erreur['code_postal'])) echo $erreur['code_postal']; ?></span></br>
				
				<input type="text" class="etiquette_gauche" name="ville" id="ville" placeholder="Ville" size="20" maxlength="45" value="<?php if(isset($_POST['ville'])) echo $_POST['ville']; ?>" required />
				<span class="error_message"><?php if(isset($erreur['ville'])) echo $erreur['ville']; ?></span></br>
				
				<input type="text" class="etiquette_gauche" name="pays" id="pays" placeholder="Pays" size="20" maxlength="45" value="<?php if(isset($_POST['pays'])) echo $_POST['pays']; ?>" required/>
				<span class="error_message"><?php if(isset($erreur['pays'])) echo $erreur['pays']; ?></span>
			</div>
		</p>
	</fieldset>
	
	<fieldset>
		<legend><b>Votre profil </b></legend>
		<p>
			<label for="pseudo">Pseudo :</label>
			<input type="text" name="pseudo" id="pseudo" value="<?php if(isset($_POST['pseudo'])) echo $_POST['pseudo']; ?>" required />
			<span class="error_message"><?php if(isset($erreur['pseudo'])) echo $erreur['pseudo']; ?></span>
		</p>
		<p>
			<label for="pass">Mot de passe:</label>
			<input type="password" name="pass" id="pass"  required>
			<span class="error_message"><?php if(isset($erreur['pass'])) echo $erreur['pass']; ?></span>
		</p>
		<p>
			<label for="pass_confirm">Confirmer mot de passe:</label>
			<input type="password" name="pass2" id="pass2" required>
			<span class="error_message"><?php if(isset($erreur['pass2'])) echo $erreur['pass2']; ?></span>
		</p>
		<p>
			<label for="photo">Photo de profil :</label>
			<input type="file" name="img" id="photo_profil">
			<span class="error_message"><?php if(isset($erreur_avatar)) echo $erreur_avatar; ?></span>
		</p>
		<p>
			<label for="voyageurs">Nombre de voyageurs:</label>
			Adulte <input type="number" min="0" size="10" name="nb_adulte" id="nb_adulte" value="<?php if(isset($_POST['nb_adulte'])) echo $_POST['nb_adulte']; ?>" required/>
			<span class="error_message"><?php if(isset($erreur['nb_adulte'])) echo $erreur['nb_adulte']; ?></span>
			Enfant <input type="number" min="0" size="10" name="nb_enfant" id="nb_enfant" value="<?php if(isset($_POST['nb_enfant'])) echo $_POST['nb_enfant']; ?>" required/>
			<span class="error_message"><?php if(isset($erreur['nb_enfant'])) echo $erreur['nb_enfant']; ?></span>
		</p>
		<p>
			<label for="id_animaux">Animaux :</label>
			<input id="id_animaux" name="animaux" type="checkbox"<?= isset($_POST['animaux']) && $_POST['animaux'] === 'on' ? ' checked' : ''; ?>>
			<span class="error_message"><?php if(isset($erreur['animaux'])) echo $erreur['animaux']; ?></span>
		</p>
		<p>
			<label for="id_fumeur">Fumeur :</label>
			<input id="id_fumeur" name="fumeur" type="checkbox"<?= isset($_POST['fumeur']) && $_POST['fumeur'] === 'on' ? ' checked' : ''; ?>>
			<span class="error_message"><?php if(isset($erreur['fumeur'])) echo $erreur['fumeur']; ?></span>
		</p>
		<p>
			<label for="interet"> Centres d'intérêt: </label><br>	
			<textarea name="interet" id="interet" rows="10" cols="50" placeholder="Voyages, Lecture, Musique, Films, Promenade ..."><?php if(isset($_POST['interet'])) echo $_POST['interet']; ?></textarea> 
			<span class="error_message"><?php if(isset($erreur['interet'])) echo $erreur['interet']; ?></span>      
		</p>
		<input type="submit" value="S'inscrire">
		<p>En cliquant ci-dessus, vous donnez votre accord pour nos <a href="index.php?module=membres&amp;action=conditions_utilisation">conditions d'utilisation</a>.</p>

	</fieldset>
	
</form>