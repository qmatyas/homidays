<!-- <form action="" method="get" class="recherche" >
    			  
    <fieldset>
    <legend><b>Logement</b></legend>
        <label for="type_logement">Type de logement :</label>
        <select name="type_logement" id="type_logement">
            <option value="maison" selected>Maison</option>
            <option value="loft">Loft</option>
            <option value="appartement">Appartement</option>
            <option value="autre">Autre</option>
        </select>
    </p>
    <p>
        <label for="superficie">Superficie (en m²) :</label>
        <input type="number" min="0" size="5" name="superficie" id="superficie"/>				 			
    </p>
    <p>
        <label for="organisation">Organisation du logement :</label></br>
        <div id="bloc_log">
            <p>
             <label for="nombre_piece">Nombre de pièces:</label>
             <input type="number" min="0" size="5" name="nombre_piece" id="nombre_piece" /></br>
             <label for="nombre_chambre">Nombre de chambres:</label>
             <input type="number" min="0" size="5" name="nombre_chambre" id="nombre_chambre" /></br>
             <label for="nombre_salle_bain">Nombre de salles de bain:</label>
             <input type="number" min="0" size="5" name="nombre_salle_bain" id="nombre_salle_bain"/>
            </p>
        </div>
    </p>
    </fieldset>

    <fieldset>
    <legend><b>Quartier</b></legend>
        <p>
            <label for="activite"><u>Activité :</u></label><br/>
            <input type="checkbox" name="musee" id="musee" ><label for="musee">Musée</label><br/>
            <input type="checkbox" name="sport" id="sport" ><label for="sport">Sport</label><br/>
            <input type="checkbox" name="parc_attraction" id="parc_attraction" ><label for="parc_attraction">Parc d'attraction</label><br>
            <input type="checkbox" name="shopping" id="shopping"><label for="shopping">Shopping</label><br/>
            <input type="checkbox" name="autre" id="autre" ><label for="autre">Autre: </label><input type="text" name="autre" id="autre" size="13"/>
        </p>
        <p>
            <label for="transport"><u>Transport :</u></label><br/>
            <input type="checkbox" name="metro" id="metro"><label for="metro">Métro</label></br>
            <input type="checkbox" name="velib" id="velib" ><label for="velib">Vélib'</label></br>
            <input type="checkbox" name="bus" id="bus" ><label for="bus">Bus</label></br>
            <input type="checkbox" name="tramway" id="tramway"><label for="tramway">Tramway</label></br>
            <input type="checkbox" name="autre" id="autre"><label for="autre">Autre :</label><input type="text" name="autre" id="autre" size="13"/>
        </p>
        <p>
            <label for="environnement"><u>Environnement :</u></label><br/>
            <input type="checkbox" name="lac" id="lac" ><label for="lac">Lac</label></br>
            <input type="checkbox" name="foret" id="foret" ><label for="foret">Forêt</label><br/>
            <input type="checkbox" name="campagne" id="campagne" ><label for="campagne">Campagne</label></br>
            <input type="checkbox" name="mer" id="mer" ><label for="mer">Mer</label><br/>
            <input type="checkbox" name="ville_env" id="ville_env"><label for="ville_env">Ville</label></br>
            <input type="checkbox" name="autre" id="autre" ><label for="autre">Autre :</label><input type="text" name="autre" id="autre" size="13"/>
        </p>
    </fieldset>

    <fieldset>
    <legend><b>Informations complémentaires</b></legend>
        <p>
            <label for="contrainte"><u>Contraintes :</u></label><br/>
            <input type="checkbox" name="pas_fumer" id="pas_fumer" ><label for="pas_fumer">Ne pas fumer dans le logement</label></br>
            <input type="checkbox" name="pas_bruit" id="pas_bruit"><label for="pas_bruit">Pas de bruit après 23h</label><br />
            <input type="checkbox" name="pas_enfant" id="pas_enfant" ><label for="pas_enfant">Pas d\'enfants</label></br>
            <input type="checkbox" name="pas_animaux" id="pas_animaux" ><label for="pas_animaux">Pas d'animaux</label><br/>
            <input type="checkbox" name="autre" id="autre" ><label for="autre">Autre:</label><input type="text" name="autre" id="autre" size="13" />
        </p>
        <p>
            <label for="service"><u>Services :</u></label><br/>
            <input type="checkbox" name="fermer" id="fermer" ><label for="fermer">Fermer la porte à double tour en sortant</label></br>
            <input type="checkbox" name="garder_animaux" id="garder_animaux" ><label for="garder_animaux">Garder les animaux domestiques</label></br>
            <input type="checkbox" name="arroser_plantes" id="arroser_plantes" ><label for="arroser_plantes">Arroser les plantes</label></br>
            <input type="checkbox" name="discuter_voisine" id="discuter_voisine" ><label for="discuter_voisine">Discuter avec la vieille voisine</label></br>
            <input type="checkbox" name="menage" id="menage" ><label for="menage">Faire le ménage avant de quitter le logement</label></br>
            <input type="checkbox" name="autre" id="autre" ><label for="autre">Autre :</label><input type="text" name="autre" id="autre" size="13" value="<?php if (isset($_POST['autre'])) echo $_POST['autre']; ?>" />
        </p>
        <p>
            <label for="option"><u>Options :</u></label><br/>
            <input type="checkbox" name="wifi" id="wifi"><label for="wifi">Wifi</label></br>
            <input type="checkbox" name="voiture" id="voiture"><label for="voiture">Voiture</label><br />
            <input type="checkbox" name="jardin_terrase" id="jardin_terrase" ><label for="jardin_terrase">Jardin / Terrasse</label></br>
            <input type="checkbox" name="piscine" id="piscine"><label for="piscine">Piscine</label><br/>
            <input type="checkbox" name="equipement_sportif" id="equipement_sportif" ><label for="equipement_sportif">Equipement sportif</label></br>
            <input type="checkbox" name="acces_handicape" id="acces_handicape" ><label for="acces_handicape">Accès handicapé</label></br>
            <input type="checkbox" name="autre" id="autre"><label for="autre">Autre :</label><input type="text" name="autre" id="autre" size="13" />
        </p>
    </fieldset>
   
    <input type="submit" value="Valider" class="valider">
    
</form> -->
<section>
<?php if (!isset($_GET['id']) || $_GET['id'] != $_SESSION['Utilisateur']['id']) : ?>
    <h2>Recherche:</h2>
    <form action="" method="get" class="recherche">
        <input type="hidden" name="module" value="logements">
        <input type="hidden" name="action" value="lister">
<?php if (LANG === 'en') : ?>
        <input type="hidden" name="lang" value="en">
<?php endif; ?>
        <input type="text" name="ville" placeholder="Qui voulez-vous trouver ?" value="<?= (isset($_GET['ville']) ? $_GET['ville'] : ''); ?>">
        <input type="submit" value="Rechercher">
        <a href="<?= url('logements', 'recherche_avancee'); ?>">Recherche avancée</a>
    </form>

    <h2>Résultats:</h2>
    <p><?= count($offres) . ' sur ' . $nombre_offres; ?> offres</p>
<?php else : ?>
    <h2>Mes Logements</h2>
<?php endif; ?>

<?php foreach ($offres as $offre) :?>
    <div class="">
    <div><img src="<?= $offre['image_nom']; ?>" alt="Image de maison <?= $offre['id']; ?>"></div>
    <div>
        <span><?= $offre['nom']; ?></span> 
        <span><b>Type de logement :</b> <?= $offre['type_logement']; ?></span> 
        <span><b>Ville :</b> <?= $offre['ville']; ?></span> 
        <span><b>Pays :</b> <?= $offre['pays']; ?></span> 
        <span><b>Nombre de pièces :</b> <?= $offre['nb_piece']; ?></span> 
        <span><b>Note :</b> <?= $offre['note_totale']; ?> /10</span> 
    <?php if (utilisateur_est_connecte()) : ?>
        <a href="<?= url('logements', 'afficher', ['id' => $offre['id']]); ?>">Voir le logement</a>
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