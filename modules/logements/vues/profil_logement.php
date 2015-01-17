<h2>Profil de <?= htmlspecialchars($logement['nom']); ?></h2>

<div id="carrousel">
<?php
    foreach ($images as $image) {
        echo '<img src="' . $image['nom'] . '" alt="photo" title="Photo' . $image['id'] . '" class="photo_mini" height="180" width="240">';
    }
?>
</div>

<div><span class="label_profil">Note</span> : <?= $logement['note_totale']; ?></div>

<section>
    
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

    <div class="">
        <h3>Quartier</h3>
        <div>
        <div><span class="label_profil">Points forts</span> :<br> <?= nl2br($quartier['points_forts']); ?></div>

        <div>
            <h6 class="label_profil">Activité</h6>
            <?= $quartier['musee'] ? '<span>Musée</span>' : ''; ?>
            <?= $quartier['sport'] ? '<span>Sport</span>' : ''; ?>
            <?= $quartier['parc_attraction'] ? '<span>Parc d\'attraction</span>' : ''; ?>
            <?= $quartier['shopping'] ? '<span>Shopping</span>' : ''; ?>
            <?= $quartier['autre'] ? '<span>Autre</span>' : ''; ?>
        </div>

        <div><span class="label_profil">Restauration</span> :<br> <?= nl2br($quartier['restauration']); ?></div>

        <div><span class="label_profil">Transport</span> :
        <?= $quartier['metro'] ? 'Métro' : ''; ?>
        <?= $quartier['velib'] ? 'Vélib' : ''; ?>
        <?= $quartier['bus'] ? 'Bus' : ''; ?>
        <?= $quartier['tramway'] ? 'Tramway' : ''; ?>
        <?= $quartier['autre'] ? 'Autre' : ''; ?>
        </div>

        <div><span class="label_profil">Environnement</span> : 
        <?= $quartier['lac'] ? 'Lac' : ''; ?>
        <?= $quartier['foret'] ? 'Forêt' : ''; ?>
        <?= $quartier['campagne'] ? 'Campagne' : ''; ?>
        <?= $quartier['mer'] ? 'Mer' : ''; ?>
        <?= $quartier['ville_env'] ? 'Ville' : ''; ?>
         <?= $quartier['autre'] ? 'Autre' : ''; ?>
        </div>
    </div>

    <div class="">
        <h3>Informations complémentaires</h3>
        <div>
            <h6 class="label_profil">Contraintes</h6> : 
            <?= $logement['pas_fumer'] ? '<span>Ne pas fumer dans le logement</span>' : ''; ?>
            <?= $logement['pas_bruit'] ? '<span>Pas de bruit après 23h</span>' : ''; ?>
            <?= $logement['pas_enfant'] ? '<span>Pas d\'enfants</span>' : ''; ?>
            <?= $logement['pas_animaux'] ? '<span>Pas d\'pas_animaux</span>' : ''; ?>
            <?= $logement['contrainte_autre'] ? '<span>Autre</span>' : ''; ?>
        </div>
        <div>
            <h6 class="label_profil">Services</h6> :
            <?= $logement['fermer'] ? '<span>Fermer la porte à double tour en sortant </span>' : ''; ?>
            <?= $logement['garder_animaux'] ? '<span>Garder les animaux domestiques</span>' : ''; ?>
            <?= $logement['arroser_plantes'] ? '<span>Arroser les plantes</span>' : ''; ?>
            <?= $logement['discuter_voisine'] ? '<span>Discuter avec la vieille voisine</span>' : ''; ?>
            <?= $logement['menage'] ? '<span>Faire le ménage avant de quitter le logement</span>' : ''; ?>
            <?= $logement['service_autre'] ? '<span>Autre</span>' : ''; ?>
        </div>
        <div>
            <h6 class="label_profil">Options</h6> : 
            <?= $logement['wifi'] ? '<span>Wifi</span>' : ''; ?>
            <?= $logement['voiture'] ? '<span>Voiture</span>' : ''; ?>
            <?= $logement['jardin_terrasse'] ? '<span>Jardin / Terrasse</span>' : ''; ?>
            <?= $logement['piscine'] ? '<span>Piscine</span>' : ''; ?>
            <?= $logement['equipement_sportif'] ? '<span>Equipement sportif</span>' : ''; ?>
            <?= $logement['acces_handicape'] ? '<span>Accès handicapé</span>' : ''; ?>
            <?= $logement['option_autre'] ? '<span>Autre</span>' : ''; ?>
        </div>
    </div>
</section>