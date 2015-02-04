<section>
    <h2>Recherche</h2>
    <form action="" method="get" class="recherche">
        <input type="hidden" name="module" value="logements">
        <input type="hidden" name="action" value="recherche_avancee">
<?php if (LANG === 'en') : ?>
        <input type="hidden" name="lang" value="en">
<?php endif; ?>
                
            <label for="type_logement">Type de logement :</label>
            <select name="type_logement" id="type_logement">
                    <option value="maison" selected>Maison</option>
                    <option value="loft">Loft</option>
                    <option value="appartement">Appartement</option>
                    <option value="autre">Autre</option>
            </select>
    
            <label for="superficie">Superficie (en m²) :</label>
            <input type="number" min="0" size="5" name="superficie" id="superficie" value="<?= isset($_GET['superficie']) ? $_GET['superficie'] : ''; ?>">  

            <label for="organisation">Organisation du logement :</label></br>
            <div id="bloc_log">
                
                 <label for="nombre_piece">Nombre de pièces:</label>
                 <input type="number" min="0" size="5" name="nombre_piece" id="nombre_piece" value="<?= isset($_GET['nb_piece']) ? $_GET['nb_piece'] : ''; ?>"></br>
                 <label for="nombre_chambre">Nombre de chambres:</label>
                 <input type="number" min="0" size="5" name="nombre_chambre" id="nombre_chambre" value="<?= isset($_GET['nb_chambre']) ? $_GET['nb_chambre'] : ''; ?>"/></br>
                 <label for="nombre_salle_bain">Nombre de salles de bain:</label>
                 <input type="number" min="0" size="5" name="nombre_salle_bain" id="nombre_salle_bain" value="<?= isset($_GET['nb_salle_bain']) ? $_GET['nb_salle_bain'] : ''; ?>" required/>
            </div>

            <label for="activite"><u>Activité :</u></label><br/>
            <input type="checkbox" name="musee" id="musee" <?= isset($_GET['musee']) && $_GET['musee'] ==='on' ? ' checked' : ''; ?>><label for="musee">Musée</label><br/>
        
            <input type="checkbox" name="sport" id="sport" <?= isset($_GET['sport']) && $_GET['sport'] ==='on' ? ' checked' : ''; ?>><label for="sport">Sport</label><br/>
            
            <input type="checkbox" name="parc_attraction" id="parc_attraction" <?= isset($_GET['parc_attraction']) && $_GET['parc_attraction'] ==='on' ? ' checked' : ''; ?>><label for="parc_attraction">Parc d'attraction</label><br/>
            
            <input type="checkbox" name="shopping" id="shopping" <?= isset($_GET['shopping']) && $_GET['shopping'] ==='on' ? ' checked' : ''; ?>><label for="shopping">Shopping</label><br/>
            
            <input type="checkbox" name="autre" id="autre" <?= isset($_GET['autre']) && $_GET['autre'] ==='on' ? ' checked' : ''; ?>Autre</label>


            <label for="transport"><u>Transport :</u></label><br/>
            <input type="checkbox" name="metro" id="metro" <?= isset($_GET['metro']) && $_GET['metro'] ==='on' ? ' checked' : ''; ?><label for="metro">Métro </label></br>
            
            <input type="checkbox" name="velib" id="velib"<?= isset($_GET['velib']) && $_GET['velib'] ==='on' ? ' checked' : ''; ?>><label for="velib">Vélib'</label></br>
           
            <input type="checkbox" name="bus" id="bus" <?= isset($_GET['bus']) && $_GET['bus'] ==='on' ? ' checked' : ''; ?>><label for="bus">Bus</label></br>
           
            <input type="checkbox" name="tramway" id="tramway"<?= isset($_GET['tramway']) && $_GET['tramway'] ==='on' ? ' checked' : ''; ?>><label for="tramway">Tramway</label></br>
            
            <input type="checkbox" name="autre" id="autre" <?= isset($_GET['autre']) && $_GET['autre'] ==='on' ? ' checked' : ''; ?>><label for="autre">Autre</label>


            <label for="environnement"><u>Environnement :</u></label><br/>
            <input type="checkbox" name="lac" id="lac" <?= isset($_GET['lac']) && $_GET['lac'] ==='on' ? ' checked' : ''; ?>><label for="lac">Lac</label></br>
            
            <input type="checkbox" name="foret" id="foret" <?= isset($_GET['foret']) && $_GET['foret'] ==='on' ? ' checked' : ''; ?>><label for="foret">Forêt</label><br/>
           
            <input type="checkbox" name="campagne" id="campagne" <?= isset($_GET['campagne']) && $_GET['campagne'] ==='on' ? ' checked' : ''; ?>><label for="campagne">Campagne</label></br>
           
            <input type="checkbox" name="mer" id="mer" <?= isset($_GET['mer']) && $_GET['mer'] ==='on' ? ' checked' : ''; ?>><label for="mer">Mer</label><br/>
            
            <input type="checkbox" name="ville_env" id="ville_env" <?= isset($_GET['ville_env']) && $_GET['ville_env'] ==='on' ? ' checked' : ''; ?>>
            <label for="ville_env">Ville</label></br>
           
            <input type="checkbox" name="autre" id="autre" <?= isset($_GET['autre']) && $_GET['autre'] ==='on' ? ' checked' : ''; ?>><label for="autre">Autre</label>
        
            <legend><b>Informations complémentaires</b></legend>
        
            <label for="contrainte"><u>Contraintes :</u></label><br/>
            <input type="checkbox" name="pas_fumer" id="pas_fumer" <?= isset($_GET['pas_fumer']) && $_GET['pas_fumer'] ==='on' ? ' checked' : ''; ?>><label for="pas_fumer">Ne pas fumer dans le logement</label></br>
            
            <input type="checkbox" name="pas_bruit" id="pas_bruit" <?= isset($_GET['pas_bruit']) && $_GET['pas_bruit'] ==='on' ? ' checked' : ''; ?>><label for="pas_bruit">Pas de bruit après 23h</label><br />
            
            <input type="checkbox" name="pas_enfant" id="pas_enfant" <?= isset($_GET['pas_enfant']) && $_GET['pas_enfant'] ==='on' ? ' checked' : ''; ?>><label for="pas_enfant">Pas d'enfants</label></br>
            
            <input type="checkbox" name="pas_animaux" id="pas_animaux" <?= isset($_GET['pas_animaux']) && $_GET['pas_animaux'] ==='on' ? ' checked' : ''; ?>><label for="pas_animaux">Pas d'animaux</label><br/>
            
            <input type="checkbox" name="autre" id="autre" <?= isset($_GET['autre']) && $_GET['autre'] ==='on' ? ' checked' : ''; ?>><label for="autre">Autre</label>
        
            
            <label for="service"><u>Services :</u></label><br/>
            <input type="checkbox" name="fermer" id="fermer" <?= isset($_GET['fermer']) && $_GET['fermer'] ==='on' ? ' checked' : ''; ?>><label for="fermer">Fermer la porte à double tour en sortant</label></br>
            
            <input type="checkbox" name="garder_animaux" id="garder_animaux" <?= isset($_GET['garder_animaux']) && $_GET['garder_animaux'] ==='on' ? ' checked' : ''; ?>><label for="garder_animaux">Garder les animaux domestiques</label></br>
           
            <input type="checkbox" name="arroser_plantes" id="arroser_plantes" <?= isset($_GET['arroser_plantes']) && $_GET['arroser_plantes'] ==='on' ? ' checked' : ''; ?>><label for="arroser_plantes">Arroser les plantes</label></br>
           
            <input type="checkbox" name="discuter_voisine" id="discuter_voisine" <?= isset($_GET['discuter_voisine']) && $_GET['discuter_voisine'] ==='on' ? ' checked' : ''; ?>><label for="discuter_voisine">Discuter avec la vieille voisine</label></br>
           
            <input type="checkbox" name="menage" id="menage" <?= isset($_GET['menage']) && $_GET['menage'] ==='on' ? ' checked' : ''; ?>><label for="menage">Faire le ménage avant de quitter le logement</label></br>
           
            <input type="checkbox" name="autre" id="autre" <?= isset($_GET['autre']) && $_GET['autre'] ==='on' ? ' checked' : ''; ?>><label for="autre">Autre</label>

        
            <label for="option"><u>Options :</u></label><br/>
            <input type="checkbox" name="wifi" id="wifi" <?= isset($_GET['sport']) && $_GET['sport'] ==='on' ? ' checked' : ''; ?>><label for="wifi">Wifi</label></br>
            
            <input type="checkbox" name="voiture" id="voiture" <?= isset($_GET['voiture']) && $_GET['voiture'] === 'on' ? ' checked' : ''; ?>><label for="voiture">Voiture</label><br />
            
            <input type="checkbox" name="jardin_terrase" id="jardin_terrase" <?= isset($_GET['jardin_terrase']) && $_GET['jardin_terrase'] === 'on' ? ' checked' : ''; ?>><label for="jardin_terrase">Jardin / Terrasse</label></br>
            
            <input type="checkbox" name="piscine" id="piscine" <?= isset($_GET['piscine']) && $_GET['piscine'] === 'on' ? ' checked' : ''; ?>><label for="piscine">Piscine</label><br/>
            
            <input type="checkbox" name="equipement_sportif" id="equipement_sportif" <?= isset($_GET['equipement_sportif']) && $_GET['equipement_sportif'] === 'on' ? ' checked' : ''; ?>><label for="equipement_sportif">Equipement sportif</label></br>
            
            <input type="checkbox" name="acces_handicape" id="acces_handicape" <?= isset($_GET['acces_handicape']) && $_GET['acces_handicape'] === 'on' ? ' checked' : ''; ?>><label for="acces_handicape">Accès handicapé</label></br>
            
            <input type="checkbox" name="autre" id="autre" <?= isset($_GET['autre']) && $_GET['autre'] === 'on' ? ' checked' : ''; ?>><label for="autre">Autre</label>        

        <input type="submit" value="Valider" class="Rechercher">
    </form>

<h2>Résultats:</h2>
    <p><?= count($offres) . ' sur ' . $nombre_offres; ?> offres</p>
<?php else : ?>
    <h2>Mes Logements</h2>
<?php endif; ?>

<?php foreach ($offres as $offre) :?>
    <div class="liste">
        <div class="img_liste"><img class="image_resultat" src="<?= $offre['image_nom']; ?>" alt="Image de maison <?= $offre['id']; ?>"></div>
        <div class="info_liste">
            <h3><?= $offre['nom']; ?></h3> 
            <span><b>Type de logement :</b> <?= $offre['type_logement']; ?></span> 
            <span><b>Ville :</b> <?= $offre['ville']; ?></span> 
            <span><b>Pays :</b> <?= $offre['pays']; ?></span> 
            <span><b>Nombre de pièces :</b> <?= $offre['nb_piece']; ?></span> 
            <span><b>Note :</b> <?= $offre['note_totale']; ?> /10</span> 
    <?php if (utilisateur_est_connecte()) : ?>
            <a href="<?= url('logements', 'afficher', ['id' => $offre['id']]); ?>">Voir le logement</a>
    <?php endif; ?>
    <?php if (!utilisateur_est_connecte()) : ?>
            <p><i>Si vous voulez avoir plus d'informations sur ce logement, veuillez-vous inscrire.</i></p>
            <a href="<?= url('membres', 'inscription', ['id' => $offre['id']]); ?>">S'inscrire</a>
    <?php endif; ?>
        </div>
    </div>
    <?php endforeach; ?>
<?php if ($page > 1) : ?>
    <a href="<?= url('logements', 'lister', ['page' => $page - 1, 'id' => isset($_GET['id']) ? $_GET['id'] : null]); ?>">Page précédente</a>
<?php endif; ?>
<?php if ($page * $nombre_resultat < $nombre_offres) : ?>
    <a href="<?= url('logements', 'lister', ['page' => $page + 1, 'id' => isset($_GET['id']) ? $_GET['id'] : null]); ?>">Page suivante</a>
<?php endif; ?>
</section>
    
  
