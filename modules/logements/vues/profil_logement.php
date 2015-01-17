<h2>Profil de <?= htmlspecialchars($logement['nom']); ?></h2>

<div id="carrousel">
<?php
    foreach ($images as $image) {
        echo '<img src="' . $image['nom'] . '" alt="photo" title="Photo' . $image['id'] . '" class="photo_mini" height="180" width="240">';
    }
?>
</div>

<div><span class="label_profil">Note</span> : <?= $logement['note_totale']; ?></div>

<p>
    
    <fieldset>
    <legend><b>Adresse</b></legend>
      <p>
        <div><span class="label_profil">Nom</span> : <?= $logement['nom']; ?></div>
        <div><span class="label_profil">Enregistrée le</span> : <?= $logement['date_inscription']; ?></div>
        <div><span class="label_profil">Type</span> : <?= $logement['type_logement']; ?></div>
        <div><span class="label_profil">Rue</span> : <?= $logement['rue']; ?></div>
        <div><span class="label_profil">Code postal</span> : <?= $logement['code_postal']; ?></div>
        <div><span class="label_profil">Ville</span> : <?= $logement['ville']; ?></div>
        <div><span class="label_profil">Pays</span> : <?= $logement['pays']; ?></div>
       </p>
    </fieldset>

  <fieldset>
    <legend><b>Logement</b></legend>
      <p>
        <div><span class="label_profil">Superficie (en m²)</span> : <?= $logement['superficie']; ?></div>
        <div><span class="label_profil">Nombre de pièces</span> : <?= $logement['nb_piece']; ?></div>
        <div><span class="label_profil">Nombre de chambres</span> : <?= $logement['nb_chambre']; ?></div>
        <div><span class="label_profil">Nombre de salles de bain</span> : <?= $logement['nb_salle_bain']; ?></div>
        <div><span class="label_profil">Description</span> :<br> <?= nl2br($logement['description']); ?></div>
      </p>
    </fieldset>

  <fieldset>
    <legend><b>Quartier</b></legend>
      <p>
        <div><span class="label_profil">Points forts</span> :<br> <?= nl2br($logement['points_forts']); ?></div>

        <div><span class="label_profil">Activité</span> : 
        <?= $logement['musee'] ? 'Musée' : ''; ?>
        <?= $logement['sport'] ? 'Sport' : ''; ?>
        <?= $logement['parc_attraction'] ? 'Parc d\'attraction' : ''; ?>
        <?= $logement['shopping'] ? 'Shopping' : ''; ?>
        <?= $logement['autre'] ? 'Autre' : ''; ?>
        </div>

        <div><span class="label_profil">Restauration</span> :<br> <?= nl2br($infos_quartier['restauration']); ?></div>

        <div><span class="label_profil">Transport</span> :
        <?= $logement['metro'] ? 'Métro' : ''; ?>
        <?= $logement['velib'] ? 'Vélib' : ''; ?>
        <?= $logement['bus'] ? 'Bus' : ''; ?>
        <?= $logement['tramway'] ? 'Tramway' : ''; ?>
        <?= $logement['autre'] ? 'Autre' : ''; ?>
        </div>

        <div><span class="label_profil">Environnement</span> : 
        <?= $logement['lac'] ? 'Lac' : ''; ?>
        <?= $logement['foret'] ? 'Forêt' : ''; ?>
        <?= $logement['campagne'] ? 'Campagne' : ''; ?>
        <?= $logement['mer'] ? 'Mer' : ''; ?>
        <?= $logement['ville_env'] ? 'Ville' : ''; ?>
         <?= $logement['autre'] ? 'Autre' : ''; ?>
        </div>
    </p>
    </fieldset>

    <fieldset>
    <legend><b>Informations complémentaires</b></legend>
      <p>
      
        <div><span class="label_profil">Contraintes</span> : 
        <?= $logement['pas_fumer'] ? 'Ne pas fumer dans le logement' : ''; ?>
        <?= $logement['pas_bruit'] ? 'Pas de bruit après 23h' : ''; ?>
        <?= $logement['pas_enfant'] ? 'Pas d\'enfants' : ''; ?>
        <?= $logement['pas_animaux'] ? 'Pas d\'pas_animaux' : ''; ?>
         <?= $logement['autre'] ? 'Autre' : ''; ?>
        </div>

        <div><span class="label_profil">Services</span> :
        <?= $logement['fermer'] ? 'Fermer la porte à double tour en sortant ' : ''; ?>
        <?= $logement['gader_animaux'] ? 'Garder les animaux domestiques' : ''; ?>
        <?= $logement['arroser_plantes'] ? 'Arroser les plantes' : ''; ?>
        <?= $logement['discuter_voisine'] ? 'Discuter avec la vieille voisine' : ''; ?>
        <?= $logement['menage'] ? 'Faire le ménage avant de quitter le logement' : ''; ?>
         <?= $logement['autre'] ? 'Autre' : ''; ?>
        </div>

        <div><span class="label_profil">Options</span> : 
        <?= $logement['wifi'] ? 'Wifi' : ''; ?>
        <?= $logement['voiture'] ? 'Voiture' : ''; ?>
        <?= $logement['jardin_terrasse'] ? 'Jardin / Terrasse' : ''; ?>
        <?= $logement['piscine'] ? 'Piscine' : ''; ?>
        <?= $logement['equipement_sportif'] ? 'Equipement sportif' : ''; ?>
        <?= $logement['acces_handicape'] ? 'Accès handicapé' : ''; ?>
         <?= $logement['autre'] ? 'Autre' : ''; ?>
        </div>
    
    </p>
    </fieldset>

</p>