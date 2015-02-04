<h2>Modification de votre logement</h2>
<form method="post" action="" id="form" name="form"> 
    <fieldset>
   	<legend><b>Adresse</b></legend>
	    <p>		 
		  	<label for="nom">Nom</label> : 
		 	<input type="text" name="nom" value="<?= isset($_POST['Logement']['nom']) ? $_POST['Logement']['nom'] : ''; ?>" required/>
			<span class="error_message"><?= isset($erreur['nom']) ? $erreur['nom'] : ''; ?></span>
		</p>
	    <p>
		    <label for="rue">Rue</label> : 
		    <input type="text" name="rue" value="<?= isset($_POST['Logement']['rue']) ? $_POST['Logement']['rue'] : ''; ?>" required/>
		    <span class="error_message"><?= isset($erreur['rue']) ? $erreur['rue'] : ''; ?></span>
	    </p>
	    <p>
		    <label for="code_postal">Code postal</label> : 
		    <input type="text" name="code_postal" value="<?= isset($_POST['Logement']['code_postal']) ? $_POST['Logement']['code_postal'] : ''; ?>" required/>
		    <span class="error_message"><?= isset($erreur['code_postal']) ? $erreur['code_postal'] : ''; ?></span>
	    </p>
	    <p>
		    <label for="ville">Ville</label> : 
		    <input type="text" name="ville" value="<?= isset($_POST['Logement']['ville']) ? $_POST['Logement']['ville'] : ''; ?>" required/>
		    <span class="error_message"><?= isset($erreur['ville']) ? $erreur['ville'] : ''; ?></span>
	    </p>
	    <p>
		    <label for="pays">Pays</label> : 
		    <input type="text" name="pays" value="<?= isset($_POST['Logement']['pays']) ? $_POST['Logement']['pays'] : ''; ?>" required/>
		    <span class="error_message"><?= isset($erreur['pays']) ? $erreur['pays'] : ''; ?></span>
	    </p>
	</fieldset>

	<fieldset>
	<legend><b>Logement</b></legend>
	<p>
	    <label for="type_logement">Type</label> : 
	    <input type="type_logement" name="type_logement" value="" required/>
	    <span class="error_message"><?= isset($erreur['type_logement']) ? $erreur['type_logement'] : ''; ?></span>
    </p>
	<p>
	    <label for="">Superficie (en m²): </label> :
	    <input type="number" min="0" size="5" name="superficie" value="<?= isset($_POST['Logement']['superficie']) ? $_POST['Logement']['superficie'] : ''; ?>" required/>
	    <span class="error_message"><?= isset($erreur['superficie']) ? $erreur['superficie'] : ''; ?></span>
	</p>
	<p>
	<label for="organisation">Organisation du logement :</label></br>
			<div id="bloc_log">
				<p>
				    <label for="">Nombre de pièces</label> :
				    <input type="number" min="0" size="5" name="nb_piece" value="<?= isset($_POST['Logement']['nb_piece']) ? $_POST['Logement']['nb_piece'] : ''; ?>" required/>
				    <span class="error_message"><?= isset($erreur['nb_piece']) ? $erreur['nb_piece'] : ''; ?></span>
				</p>
				<p>
				    <label for="">Nombre de chambres</label> :
				    <input type="number" min="0" size="5" name="nb_chambre" value="<?= isset($_POST['Logement']['nb_chambre']) ? $_POST['Logement']['nb_chambre'] : ''; ?>" required/>
				    <span class="error_message"><?= isset($erreur['nb_chambre']) ? $erreur['nb_chambre'] : ''; ?></span>
				</p>
				<p>
				    <label for="">Nombre de salles de bain</label> :
				    <input type="number" min="0" size="5" name="nb_salle_bain" value="<?= isset($_POST['Logement']['nb_salle_bain']) ? $_POST['Logement']['nb_salle_bain'] : ''; ?>" required/>
				    <span class="error_message"><?= isset($erreur['nb_salle_bain']) ? $erreur['nb_salle_bain'] : ''; ?></span>
				</p>
			</div>
	</p>
	<p>	
	<label for="description">Description: </label><br>	
		<textarea name="description" id="description" rows="10" cols="50" placeholder="Maison au bord de la mer, 3 etages ..."><?= isset($_POST['Logement']['description']) ? $_POST['Logement']['description'] : ''; ?></textarea> 
		<span class="error_message"> <?= isset($erreur['description']) ? $erreur['description'] : ''; ?></span>
	</p>

	</fieldset>

	<fieldset>
   	<legend><b>Quartier</b></legend>
    	<p>
		    <div><span class="label_profil">Points forts: </span> :<br>: <?= isset($_SESSION['']['']) ? $_SESSION['']['points_forts'] : '';?></p></div>

		    <div><span class="label_profil">Activité:</span> : 
			<input id="id_musee" name="musee" type="checkbox"<?= isset($_POST['Utilisateur']['musee']) && $_POST['Utilisateur']['musee'] ? ' checked' : ''; ?>>
			<span class="error_message"> <?= isset($erreur['animaux']) ? $erreur['animaux'] : ''; ?></span>
			<input id="id_animaux" name="animaux" type="checkbox"<?= isset($_POST['Utilisateur']['animaux']) && $_POST['Utilisateur']['animaux'] ? ' checked' : ''; ?>>
			<span class="error_message"> <?= isset($erreur['animaux']) ? $erreur['animaux'] : ''; ?> </span>
			<input id="id_animaux" name="animaux" type="checkbox"<?= isset($_POST['Utilisateur']['animaux']) && $_POST['Utilisateur']['animaux'] ? ' checked' : ''; ?>>
			<span class="error_message"> <?= isset($erreur['animaux']) ? $erreur['animaux'] : ''; ?> </span>
			<input id="id_animaux" name="animaux" type="checkbox"<?= isset($_POST['Utilisateur']['animaux']) && $_POST['Utilisateur']['animaux'] ? ' checked' : ''; ?>>
			<span class="error_message"> <?= isset($erreur['animaux']) ? $erreur['animaux'] : ''; ?> </span>
			<input id="id_animaux" name="animaux" type="checkbox"<?= isset($_POST['Utilisateur']['animaux']) && $_POST['Utilisateur']['animaux'] ? ' checked' : ''; ?>>
			<span class="error_message"> <?= isset($erreur['animaux']) ? $erreur['animaux'] : ''; ?> </span>
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['sport'] ? 'Sport' : '' ;?>
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['parc_attraction'] ? 'Parc d\'attraction' : '';?>
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['shopping'] ? 'Shopping' : '' ;?>
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['autre'] ? 'Autre' : '' ;?>
		    </div>

		    <div><span class="label_profil">Restauration: </span> :<br>: <?= isset($_SESSION['']['']) ? $_SESSION['']['restauration'] : '';?>' ?></p></div>

		    <div><span class="label_profil">Transport: </span> :
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['metro'] ? 'Métro' : '' : '';?>' ?>
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['velib'] ? 'Vélib' : '' : '';?>' ?>
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['bus'] ? 'Bus' : '' : '';?>' ?>
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['tramway'] ? 'Tramway' : '' : '';?>' ?>
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['autre'] ? '.<?= isset($_SESSION['']['']) ? $_SESSION[''][['autre'] : '';?>' ?>.' : '' : '';?>' ?>
		    </div>

		    <div><span class="label_profil">Environnement: </span> : 
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['lac'] ? 'Lac' : '' : '';?>' ?>
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['foret'] ? 'Forêt' : '' : '';?>' ?>
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['campagne'] ? 'Campagne' : '' : '';?>' ?>
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['mer'] ? 'Mer' : '' : '';?>' ?>
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['ville_env'] ? 'Ville' : '' : '';?>' ?>
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['autre'] ? '.<?= isset($_SESSION['']['']) ? $_SESSION[''][['autre'] : '';?>' ?>.' : '' : '';?>' ?>
		    </div>
		</p>
    </fieldset>

    <fieldset>
   	<legend><b>Informations complémentaires</b></legend>
    	<p>
		  
		    <div><span class="label_profil">Contraintes: </span> : 
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['pas_fumer'] ? 'Ne pas fumer dans le logement' : '' : '';?>' ?>
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['pas_bruit'] ? 'Pas de bruit après 23h' : '' : '';?>' ?>
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['pas_enfant'] ? 'Pas d\'enfants' : '' : '';?>' ?>
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['pas_animaux'] ? 'Pas d\'pas_animaux' : '' : '';?>' ?>
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['autre'] ? '.<?= isset($_SESSION['']['']) ? $_SESSION['']['autre'] : '';?>' ?>.' : '' : '';?>' ?>
		    </div>

		    <div><span class="label_profil">Services: </span> :
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['fermer'] ? 'Fermer la porte à double tour en sortant ' : '' : '';?>' ?>
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['gader_animaux'] ? 'Garder les animaux domestiques' : '' : '';?>' ?>
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['arroser_plantes'] ? 'Arroser les plantes' : '' : '';?>' ?>
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['discuter_voisine'] ? 'Discuter avec la vieille voisine' : '' : '';?>' ?>
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['menage'] ? 'Faire le ménage avant de quitter le logement' : '' : '';?>' ?>
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['autre'] ? '.<?= isset($_SESSION['']['']) ? $_SESSION[''][['autre'] : '';?>' ?>.' : '' : '';?>' ?>
		    </div>

		    <div><span class="label_profil">Options: </span> : 
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['wifi'] ? 'Wifi' : '' : '';?>' ?>
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['voiture'] ? 'Voiture' : '' : '';?>' ?>
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['jardin_terrasse'] ? 'Jardin / Terrasse' : '' : '';?>' ?>
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['piscine'] ? 'Piscine' : '' : '';?>' ?>
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['equipement_sportif'] ? 'Equipement sportif' : '' : '';?>' ?>
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['acces_handicape'] ? 'Accès handicapé' : '' : '';?>' ?>
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['autre'] ? '.<?= $infos_transport['autre'] : '';?>' ?>.' : '' : '';?>' ?>
		    </div>
		
		</p>
    </fieldset> 



   
  