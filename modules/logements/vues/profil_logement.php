<h2>Profil de <?= htmlspecialchars($logement['nom']); ?></h2>

<section class="carrousel">
    <div id="carrousel">
<?php foreach ($images as $image) : ?>
        <img src="<?= $image['nom']; ?>" alt="photo" title="Photo<?= $image['id']; ?>" class="imgg">
<?php endforeach; ?>
<p class='precedent'><img class="fleche_carrousel" src-"../images/site/carrousel/fleche_precedent.png" /</p>
<p class='suivant'><img class="fleche_carrousel" src-"../images/site/carrousel/fleche_suivant.png" /</p>
    </div>
        <p class="label_profil"><b>Note :</b> <?= $logement['note_totale'] === null ? '-' : $logement['note_totale']; ?> /10</p>
    <div>
        <h3>Adresse</h3>
        <p class="label_profil"><b>Date d'inscription :</b> <?= (new DateTime($logement['date_inscription']))->format('d/m/Y'); ?></p>
        <p class="label_profil"><b>Type :</b> <?= $logement['type_logement']; ?></p>
        <p class="label_profil"><b>Rue :</b> <?= $logement['rue']; ?></p>
        <p class="label_profil"><b>Code postal :</b> <?= $logement['code_postal']; ?></p>
        <p class="label_profil"><b>Ville :</b> <?= $logement['ville']; ?></p>
        <p class="label_profil"><b>Pays :</b> <?= $logement['pays']; ?></p>
    </div>

<?php if ($logement['utilisateur_id'] != $_SESSION['Utilisateur']['id']) : ?>
    <div>
        <h3>Propriétaire</h3>
        <img src="<?= $logement['avatar']; ?>" alt="Image de <?= $logement['pseudo']; ?>">
        <a href="<?= url('membres', 'afficher', ['id' => $logement['utilisateur_id']]); ?>"><?= $logement['prenom'] . ' ' . $logement['utilisateur_nom']; ?></a>
    </div>
<?php endif; ?>

    <div>
        <h3>Logement</h3>
        <p class="label_profil"><b>Superficie (en m²) :</b> <?= $logement['superficie']; ?></p>
        <p class="label_profil"><b>Nombre de pièces</b> : <?= $logement['nb_piece']; ?></p>
        <p class="label_profil"><b>Nombre de chambres</b> : <?= $logement['nb_chambre']; ?></p>
        <p class="label_profil"><b>Nombre de salles de bain</b> : <?= $logement['nb_salle_bain']; ?></p>
        <p class="label_profil"><b>Description</b> :<br>
        <?= nl2br($logement['description']); ?></p>
    </div>

    <div>
        <h3>
        	Disponibilités
        	<?php if ($logement['utilisateur_id'] == $_SESSION['Utilisateur']['id']) : ?>
        	<a href="<?= url('disponibilites', 'ajouter_disponibilites'); ?>"><small>(Modifier)</small></a>
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

    <div>
        <h3>Quartier</h3>
        <div>
            <h4 class="label_profil">Points forts: </h4>
            <?= nl2br($quartier['points_forts']); ?>
        </div>
        <div>
            <h4 class="label_profil">Activité: </h4>
            <?= $quartier['musee'] ? '<span>Musée</span>' : ''; ?>
            <?= $quartier['sport'] ? ', <span>Sport</span>' : ''; ?>
            <?= $quartier['parc_attraction'] ? ', <span>Parc d\'attraction</span>' : ''; ?>
            <?= $quartier['shopping'] ? ', <span>Shopping</span>' : ''; ?>
            <?= $quartier['autre'] ? ', <span>Autre</span>' : ''; ?>
        </div>
        <div>
            <h4 class="label_profil">Restauration: </h4>
            <?= nl2br($quartier['restauration']); ?>
        </div>
        <div>
            <h4 class="label_profil">Transport: </h4>
            <?= $quartier['metro'] ? '<span>Métro</span>' : ''; ?>
            <?= $quartier['velib'] ? ', <span>Vélib</span>' : ''; ?>
            <?= $quartier['bus'] ? ', <span>Bus</span>' : ''; ?>
            <?= $quartier['tramway'] ? ', <span>Tramway</span>' : ''; ?>
            <?= $quartier['autre'] ? ', <span>Autre</span>' : ''; ?>
        </div>
        <div>
            <h4 class="label_profil">Environnement: </h4>
            <?= $quartier['lac'] ? '<span>Lac</span>' : ''; ?>
            <?= $quartier['foret'] ? ', <span>Forêt</span>' : ''; ?>
            <?= $quartier['campagne'] ? ', <span>Campagne</span>' : ''; ?>
            <?= $quartier['mer'] ? ', <span>Mer</span>' : ''; ?>
            <?= $quartier['ville_env'] ? ', <span>Ville</span>' : ''; ?>
            <?= $quartier['autre'] ? ', <span>Autre</span>' : ''; ?>
        </div>
    </div>

    <div>
        <h3>Informations complémentaires</h3>
        <div>
            <h4 class="label_profil">Contraintes: </h4> 
            <?= $logement['pas_fumer'] ? '<span>Ne pas fumer dans le logement</span>' : ''; ?>
            <?= $logement['pas_bruit'] ? ', <span>Pas de bruit après 23h</span>' : ''; ?>
            <?= $logement['pas_enfant'] ? ', <span>Pas d\'enfants</span>' : ''; ?>
            <?= $logement['pas_animaux'] ? ', <span>Pas d\'animaux</span>' : ''; ?>
            <?= $logement['contrainte_autre'] ? ', <span>Autre</span>' : ''; ?>
        </div>
        <div>
            <h4 class="label_profil">Services: </h4>
            <?= $logement['fermer'] ? '<span>Fermer la porte à double tour en sortant </span>' : ''; ?>
            <?= $logement['garder_animaux'] ? ', <span>Garder les animaux domestiques</span>' : ''; ?>
            <?= $logement['arroser_plantes'] ? ', <span>Arroser les plantes</span>' : ''; ?>
            <?= $logement['discuter_voisine'] ? ', <span>Discuter avec la vieille voisine</span>' : ''; ?>
            <?= $logement['menage'] ? ', <span>Faire le ménage avant de quitter le logement</span>' : ''; ?>
            <?= $logement['service_autre'] ? ', <span>Autre</span>' : ''; ?>
        </div>
        <div>
            <h4 class="label_profil">Options: </h4> 
            <?= $logement['wifi'] ? '<span>Wifi</span>' : ''; ?>
            <?= $logement['voiture'] ? ', <span>Voiture</span>' : ''; ?>
            <?= $logement['jardin_terrasse'] ? ', <span>Jardin / Terrasse</span>' : ''; ?>
            <?= $logement['piscine'] ? ', <span>Piscine</span>' : ''; ?>
            <?= $logement['equipement_sportif'] ? ', <span>Equipement sportif</span>' : ''; ?>
            <?= $logement['acces_handicape'] ? ', <span>Accès handicapé</span>' : ''; ?>
            <?= $logement['option_autre'] ? ', <span>Autre</span>' : ''; ?>
        </div>
    </div>
</section>