<h2>Modification de votre logement</h2>

<form method="post" action="" id="form" name="form"> 
    <fieldset>
   	<legend><b>Adresse</b></legend>
    	<p>
		    <p>
		    <label for="nom">Nom</label> : 
		    <input type="text" name="nom" value="<?= isset($_SESSION['Utilisateur']['']) ? $_SESSION['']['nom'] : ''; ?>
		    <span class="error_message"><?= isset($erreur['nom']) ? $erreur['nom'] : ''; ?></span>
		    </p>

		    <p>
		    <label for="date_inscription">Enregistrée le:</label> : 
		    <input type="date_inscription" name="date_inscription" value="<?= isset($_SESSION['']['']) ? $_SESSION['']['date_inscription'] : ''; ?>
		    <span class="error_message"><?= isset($erreur['date_inscription']) ? $erreur['date_inscription'] : ''; ?></span>
		    </p>

		    <p>
		    <label for="type_logement">Type</label> : 
		    <input type="type_logement" name="type_logement" value="<?= isset($_SESSION['']['']) ? $_SESSION['']['type_logement'] : ''; ?>
		    <span class="error_message"><?= isset($erreur['type_logement']) ? $erreur['type_logement'] : ''; ?></span>
		    </p>

		    <p>
		    <label for="rue">Rue</label> : 
		    <input type="text" name="rue" value="<?= isset($_SESSION['']['']) ? $_SESSION['']['rue'] : '';?>
		    <span class="error_message"><?= isset($erreur['rue']) ? $erreur['rue'] : ''; ?></span>
		    </p>

		    <p>
		    <label for="code_postal">Code postal</label> : 
		    <input type="text" name="code_postal" value="<?= isset($_SESSION['']['']) ? $_SESSION['']['code_postal'] : '';?>
		    <span class="error_message"><?= isset($erreur['code_postal']) ? $erreur['code_postal'] : ''; ?></span>
		    </p>

		    <p>
		    <label for="ville">Ville</label> : 
		    <input type="text" name="ville" value="<?= isset($_SESSION['']['']) ? $_SESSION['']['ville'] : '';?>
		    <span class="error_message"><?= isset($erreur['ville']) ? $erreur['ville'] : ''; ?></span>
		    </p>

		    <p>
		    <label for="pays">Pays</label> : 
		    <input type="text" name="pays" value="<?= isset($_SESSION['']['']) ? $_SESSION['']['pays'] : '';?>
		    <span class="error_message"><?= isset($erreur['pays']) ? $erreur['pays'] : ''; ?></span>
		    </p>

   		 </p>
    </fieldset>

	<fieldset>
   	<legend><b>Logement</b></legend>
    	<p>
		    <div><span class="label_profil">Superficie (en m²): </span> : <?= isset($_SESSION['']['']) ? $_SESSION['']['superficie'] : '';?></p></div>
		    <div><span class="label_profil">Nombre de pièces</span> : <?= isset($_SESSION['']['']) ? $_SESSION['']['nb_piece'] : '';?></p></div>
		    <div><span class="label_profil">Nombre de chambres</span> : <?= isset($_SESSION['']['']) ? $_SESSION['']['nb_chambre'] : '';?></p></div>
		    <div><span class="label_profil">Nombre de salles de bain</span> : <?= isset($_SESSION['']['']) ? $_SESSION['']['nb_salle_bain'] : '';?></p></div>
		    <div><span class="label_profil">Description</span> :<br>: <?= isset($_SESSION['']['']) ? $_SESSION['']['description'] : '';?></p></div>
    	</p>
    </fieldset>

	<fieldset>
   	<legend><b>Quartier</b></legend>
    	<p>
		    <div><span class="label_profil">Points forts: </span> :<br>: <?= isset($_SESSION['']['']) ? $_SESSION['']['points_forts'] : '';?></p></div>

		    <div><span class="label_profil">Activité:</span> : 
		    <?= isset($_SESSION['']['']) ? $_SESSION['']['musee'] ? 'Musée' : '' ;?>
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

</p>


   
  