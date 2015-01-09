<h2>Inscription au site</h2>

<?php

if (!empty($erreurs_inscription)) {

	echo '<ul>'."\n";
	
	foreach($erreurs_inscription as $e) {
	
		echo '	<li>'.$e.'</li>'."\n";
	}
	
	echo '</ul>';
}

?>
<form method="post" action="" id="form" name="form"> <!--Définir le formulaire PHP-->
<!--<img id="close" src="images/3.png" onclick ="div_hide()">-->
	<fieldset>
	<legend><b>Votre Identité</b></legend>
	<p>
		<label for="nom">Nom :</label>
		<input type="text" name="nom" id="nom" value="<?php if(isset($_POST['nom'])) echo $_POST['nom']; ?>"required /> <!--Ici, le PHP sert à conserver les champs où il n'y a pas d'erreur-->
		<span class="error_message"> <?php if(isset($erreur['nom'])) echo $erreur['nom']; ?> </span> <!--Ici, le PHP sert à afficher un message d'erreur si la case est vide-->
	</p>
	<p>
		<label for="prenom">Prénom :</label>
		<input type="text" name="prenom" id="prenom" value="<?php if(isset($_POST['prenom'])) echo $_POST['prenom']; ?>" required />
		<span class="error_message"> <?php if(isset($erreur['prenom'])) echo $erreur['prenom']; ?> </span>
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
		<span class="error_message"> <?php if(isset($erreur['date_naissance'])) echo $erreur['date_naissance']; ?> </span>
	</p>
	<p>
		<label for="profession">Profession :</label>
		<input type="text" name="profession" id="profession" value="<?php if(isset($_POST['profession'])) echo $_POST['profession']; ?>" required />
		<span class="error_message"> <?php if(isset($erreur['profession'])) echo $erreur['profession']; ?> </span>
	</p>
	<p>
		<label for="id_langue">Langue(s) parlée(s) :</label>
		<textarea id="id_langue" name="langue"><?= isset($_POST['langue']) ? $_POST['langue'] : ''; ?></textarea>
		<span class="error_message"> <?php if(isset($erreur['langue'])) echo $erreur['langue']; ?> </span>
	</p>
	<p>
		<label for="copie">Copie Carte Identité :</label>
		<input type="file" name="copieID" id="copieID"/> <!--Ici il reste à trouver comment conserver le fichier s'il y a une erreur dans un autre champs-->
		<span class="error_message"> <?php if(isset($erreur['copieID'])) echo $erreur['copieID']; ?> </span>
	</p>
	</fieldset>
	
	<fieldset>
	<legend><b>Vos coordonnées </b></legend>
	<p>
		<label for="email">Adresse email :</label>
		<input type="email" name="email" id="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"  required />
		<span class="error_message"> <?php if(isset($erreur['email'])) echo $erreur['email']; ?> </span>
	</p>
	<p>
		<label for="tel">Numéro de téléphone :</label>
		<input type="tel" name="tel" id="tel" value="<?php if(isset($_POST['tel'])) echo $_POST['tel']; ?>" required />
		<span class="error_message"> <?php if(isset($erreur['tel'])) echo $erreur['tel']; ?> </span>
	</p>
	<p>
		<label for="adresse">Adresse principale: </label>
		
		<div id="bloc"> <!--Alignement des blocs pour l'adresse-->
		
			<input type="text" name="rue" id="rue" placeholder="Rue" size="30" maxlength="45" value="<?php if(isset($_POST['rue'])) echo $_POST['rue']; ?>"required />
			<span class="error_message"> <?php if(isset($erreur['rue'])) echo $erreur['rue']; ?> </span></br>
			
			<input type="text" name="code_postal" id="code_postal" placeholder="Code Postal" size="10" maxlength="45" value="<?php if(isset($_POST['code_postal'])) echo $_POST['code_postal']; ?>" required/>
			<span class="error_message"> <?php if(isset($erreur['code_postal'])) echo $erreur['code_postal']; ?> </span></br>
			
			<input type="text" name="ville" id="ville" placeholder="Ville" size="20" maxlength="45" value="<?php if(isset($_POST['ville'])) echo $_POST['ville']; ?>" required />
			<span class="error_message"> <?php if(isset($erreur['ville'])) echo $erreur['ville']; ?> </span></br>
			
			<input type="text" name="pays" id="pays" placeholder="Pays" size="20" maxlength="45" value="<?php if(isset($_POST['pays'])) echo $_POST['pays']; ?>" required/>
			<span class="error_message"> <?php if(isset($erreur['pays'])) echo $erreur['pays']; ?> </span>
	
		</div>

	</p>
	</fieldset>
	
	<fieldset>
	<legend><b>Votre profil </b></legend>
	<p>
		<label for="pseudo">Pseudo :</label>
		<input type="text" name="pseudo" id="pseudo" value="<?php if(isset($_POST['pseudo'])) echo $_POST['pseudo']; ?>" required />
		<span class="error_message"> <?php if(isset($erreur['pseudo'])) echo $erreur['pseudo']; ?> </span>
	</p>
	<p>
		<label for="pass">Mot de passe:</label>
		<input type="password" name="pass" id="pass"  required>
		<span class="error_message"> <?php if(isset($erreur['pass'])) echo $erreur['pass']; ?> </span>
	</p>
	<p>
		<label for="pass_confirm">Confirmer mot de passe:</label>
		<input type="password" name="pass2" id="pass2" required>
		<span class="error_message"> <?php if(isset($erreur['pass2'])) echo $erreur['pass2']; ?> </span>
	</p>
	<p>
		<label for="photo">Photo de profil :</label>
		<input type="file" name="photo_profil" id="photo_profil">
		<span class="error_message"> <?php if(isset($erreur['photo_profil'])) echo $erreur['photo_profil']; ?> </span>
	</p>
	<p>
		<label for="voyageurs">Nombre de voyageurs:</label>
             <div id='align'><!--permet d'aligner les cases adultes et enfants-->
                Adulte <input type="number" min="0" size="10" name="nb_adulte" id="nb_adulte" value="<?php if(isset($_POST['nb_adulte'])) echo $_POST['nb_adulte']; ?>" required/>
				Enfant <input type="number" min="0" size="10" name="nb_enfant" id="nb_enfant" value="<?php if(isset($_POST['nb_enfant'])) echo $_POST['nb_enfant']; ?>" required/>
				<span class="error_message"> <?php if(isset($erreur['nb_adulte'])) echo $erreur['nb_adulte']; ?> </span>
				<span class="error_message"> <?php if(isset($erreur['nb_enfant'])) echo $erreur['nb_enfant']; ?> </span>
             </div>
	</p>
	<p>
		<label for="id_animaux">Animaux :</label>
		<input id="id_animaux" name="animaux" type="checkbox"<?= isset($_POST['animaux']) && $_POST['animaux'] === 'on' ? ' checked' : ''; ?>>
		<span class="error_message"> <?php if(isset($erreur['animaux'])) echo $erreur['animaux']; ?> </span>
	</p>
	<p>
		<label for="id_fumeur">Fumeur :</label>
		<input id="id_fumeur" name="fumeur" type="checkbox"<?= isset($_POST['fumeur']) && $_POST['fumeur'] === 'on' ? ' checked' : ''; ?>>
		<span class="error_message"> <?php if(isset($erreur['fumeur'])) echo $erreur['fumeur']; ?> </span>
	</p>
	<p>
		<label for="interet"> Centres d'intérêt: </label><br />	
		<textarea name="interet" id="interet" rows="10" cols="50" placeholder="Voyages, Lecture, Musique, Films, Promenade ..."> <?php if(isset($_POST['interet'])) echo $_POST['interet']; ?>  </textarea> 
		<span class="error_message"> <?php if(isset($erreur['interet'])) echo $erreur['interet']; ?> </span>      
	</p>
		<input type="submit" id="submit" value="Suivant"/>
		<input type="reset" name="nom" value=" Annuler ">
	</fieldset>
	
</form>