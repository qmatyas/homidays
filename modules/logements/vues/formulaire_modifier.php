
<h2>Profil de <?= htmlspecialchars($infos_logement['nom']); ?></h2>
<div><span class="label_profil">Note: </span> : <?= $infos_logement['note_totale']; ?></p></div>

<p>
    
    <fieldset>
   	<legend><b>Adresse</b></legend>
    	<p>
		    <div><span class="label_profil">Nom</span> : <?= isset($_SESSION['Utilisateur']['']) ? $_SESSION['']['nom'] : ''; ?></p></div>
		    <div><span class="label_profil">Enregistrée le:</span> : <?= isset($_SESSION['']['']) ? $_SESSION['']['date_inscription'] : ''; ?></p></div>
		    <div><span class="label_profil">Type</span> : <?= isset($_SESSION['']['']) ? $_SESSION['']['type_logement'] : ''; ?></p></div>
		    <div><span class="label_profil">Rue</span> : <?= isset($_SESSION['']['']) ? $_SESSION['']['rue'] : '';?></p></div>
		    <div><span class="label_profil">Code postal</span> : <?= isset($_SESSION['']['']) ? $_SESSION['']['code_postal'] : '';?></p></div>
		    <div><span class="label_profil">Ville</span> : <?= isset($_SESSION['']['']) ? $_SESSION['']['ville'] : '';?></p></div>
		    <div><span class="label_profil">Pays</span> : <?= isset($_SESSION['']['']) ? $_SESSION['']['pays'] : '';?></p></div>
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


   
  