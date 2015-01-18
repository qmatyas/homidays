<h2>Profil de <?= htmlspecialchars($logement['nom']); ?></h2>

<section class="">
    <div id="carrousel">
<?php foreach ($images as $image) : ?>
        <img src="<?= $image['nom']; ?>" alt="photo" title="Photo<?= $image['id']; ?>" class="">
<?php endforeach; ?>
    </div>
    <p class="label_profil"><b>Note :</b> <?= $logement['note_totale']; ?></p>
    <div class="">
        <h3>Adresse</h3>
        <p class="label_profil"><b>Note :</b> <?= $logement['note_totale'] === null ? '-' : $logement['note_totale']; ?> /10</p>
        <p class="label_profil"><b>Date d'inscription :</b> <?= (new DateTime($logement['date_inscription']))->format('d/m/Y'); ?></p>
        <p class="label_profil"><b>Type :</b> <?= $logement['type_logement']; ?></p>
        <p class="label_profil"><b>Rue :</b> <?= $logement['rue']; ?></p>
        <p class="label_profil"><b>Code postal :</b> <?= $logement['code_postal']; ?></p>
        <p class="label_profil"><b>Ville :</b> <?= $logement['ville']; ?></p>
        <p class="label_profil"><b>Pays :</b> <?= $logement['pays']; ?></p>
    </div>

<?php if ($logement['utilisateur_id'] != $_SESSION['Utilisateur']['id']) : ?>
    <div class="">
        <h3>Propriétaire</h3>
        <img src="<?= $logement['avatar']; ?>" alt="Image de <?= $logement['pseudo']; ?>">
        <a href="<?= url('membres', 'afficher', ['id' => $logement['utilisateur_id']]); ?>"><?= $logement['prenom'] . ' ' . $logement['utilisateur_nom']; ?></a>
    </div>
<?php endif; ?>

    <div class="">
        <h3>Logement</h3>
        <p class="label_profil"><b>Superficie (en m²) :</b> <?= $logement['superficie']; ?></p>
        <p class="label_profil">Nombre de pièces</b> : <?= $logement['nb_piece']; ?></p>
        <p class="label_profil">Nombre de chambres</b> : <?= $logement['nb_chambre']; ?></p>
        <p class="label_profil">Nombre de salles de bain</b> : <?= $logement['nb_salle_bain']; ?></p>
        <p class="label_profil">Description</b> :<br>
        <?= nl2br($logement['description']); ?></p>
    </div>

    <div class="">
        <h3>
        	Disponibilités
        	<? if ($logement['utilisateur_id'] == $_SESSION['Utilisateur']['id'] : ?>
        	<a href="<?= url('disponibilites', 'ajouter_disponibilites'); ?>"><small>Modifier</small></a>' : '';
        	<?php endif; ?>
        </h3>
        <ul>
<?php foreach ($logement['disponibilites'] as $disponibilite) : ?>
            <li>
                Du <?= (new DateTime($disponibilite['date_debut']))->format('d/m/Y'); ?> au <?= (new DateTime($disponibilite['date_fin']))->format('d/m/Y'); ?>
<?php if ($logement['utilisateur_id'] != $_SESSION['Utilisateur']['id']) : ?>
                <a href="<?= url('disponibilites', 'reserver', ['id' => $disponibilite['id']]); ?>">Réserver</a>
<?php endif; ?>
            </li>
<?php endforeach; ?>
        </ul>
    </div>

    <div class="">
        <h3>Quartier</h3>
        <div>
            <h6 class="label_profil">Points forts</h6>
            <?= nl2br($quartier['points_forts']); ?>
        </div>
        <div>
            <h6 class="label_profil">Activité</h6>
            <?= $quartier['musee'] ? '<span>Musée</span>' : ''; ?>
            <?= $quartier['sport'] ? '<span>Sport</span>' : ''; ?>
            <?= $quartier['parc_attraction'] ? '<span>Parc d\'attraction</span>' : ''; ?>
            <?= $quartier['shopping'] ? '<span>Shopping</span>' : ''; ?>
            <?= $quartier['autre'] ? '<span>Autre</span>' : ''; ?>
        </div>
        <div>
            <h6 class="label_profil">Restauration</h6>
            <?= nl2br($quartier['restauration']); ?>
        </div>
        <div>
            <h6 class="label_profil">Transport</h6>
            <?= $quartier['metro'] ? '<span>Métro</span>' : ''; ?>
            <?= $quartier['velib'] ? '<span>Vélib</span>' : ''; ?>
            <?= $quartier['bus'] ? '<span>Bus</span>' : ''; ?>
            <?= $quartier['tramway'] ? '<span>Tramway</span>' : ''; ?>
            <?= $quartier['autre'] ? '<span>Autre</span>' : ''; ?>
        </div>
        <div>
            <h6 class="label_profil">Environnement</h6>
            <?= $quartier['lac'] ? '<span>Lac</span>' : ''; ?>
            <?= $quartier['foret'] ? '<span>Forêt</span>' : ''; ?>
            <?= $quartier['campagne'] ? '<span>Campagne</span>' : ''; ?>
            <?= $quartier['mer'] ? '<span>Mer</span>' : ''; ?>
            <?= $quartier['ville_env'] ? '<span>Ville</span>' : ''; ?>
            <?= $quartier['autre'] ? '<span>Autre</span>' : ''; ?>
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