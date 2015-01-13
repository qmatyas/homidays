<h2>Enregistrement d'un logement</h2>

<form method="post" action="" id="form" name="form">
			
        <fieldset>
        <legend><b>Adresse</b></legend>
            <p>
                <label for="nom">Nom :</label>
                <input type="text" name="nom" id="nom" value="<?php if(isset($_POST['nom'])) echo $_POST['nom']; ?>" required/>
                <span class="error_message"><?php if(isset($erreur['nom'])) echo $erreur['nom']; ?></span>
            </p>
            <p>
                <label for="rue">Rue :</label>
                <input type="text" name="rue" id="rue" value="<?php if (isset($_POST['rue'])) echo $_POST['rue']; ?>" required />
                <span class="error_message"><?php if(isset($erreur['rue'])) echo $erreur['rue']; ?></span>
            </p>
            <p>
                <label for="code_postal">Code postal :</label>
                <input type="text" name="code_postal" id="code_postal" value="<?php if (isset($_POST['code_postal'])) echo $_POST['code_postal']; ?>" required />
                <span class="error_message"><?php if(isset($erreur['code_postal'])) echo $erreur['code_postal']; ?></span>
            </p>
            <p>
                <label for="ville">Ville :</label>
                <input type="text" name="ville" id="ville" value="<?php if (isset($_POST['ville'])) echo $_POST['ville']; ?>" required/>
                <span class="error_message"><?php if(isset($erreur['ville'])) echo $erreur['ville']; ?></span> 
            </p>
            <p>
                <label for="pays">Pays :</label>
                <input type="text" name="pays" id="pays" value="<?php if (isset($_POST['pays'])) echo $_POST['pays']; ?>" required/>
                <span class="error_message"><?php if(isset($erreur['pays'])) echo $erreur['pays']; ?></span> 
            </p>
        </fieldset>

        <fieldset>
        <legend><b>Logement</b></legend>
        <p>
            <label for="justificatif_logement">Justificatif de logement :</label> 
            <input type="file" name="justificatif_logement" id="justificatif_logement" value="<?php if (isset($justificatif_logement)) echo $justificatif_logement; ?>"/>
            <span class="error_message"><?php if (isset($erreur['justificatif_logement'])) echo $erreur['justificatif_logement']; ?></span>
        </p>
        <p>
            <label for="photo_logement">Photos du logement :</label>
            <input type="file" name="photo_logement" id="photo_logement" />
        </p>
        <p>
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
            <input type="number" min="0" size="5" name="superficie" id="superficie" value="<?php if(isset($_POST['superficie'])) echo $_POST['superficie']; ?>" required/>				
            <span class="error_message"><?php if(isset($error['superficie'])) echo $error['superficie']; ?></span>			
        </p>
        <p>
            <label for="organisation">Organisation du logement :</label></br>
            <div id="bloc_log">
                <p>
                 <label for="nombre_piece">Nombre de pièces:</label>
                 <input type="number" min="0" size="5" name="nombre_piece" id="nombre_piece" value="<?php if(isset($_POST['nombre_piece'])) echo $_POST['nombre_piece']; ?>" required/></br>
                 <span class="error_message"><?php if(isset($erreur['nombre_piece'])) echo $erreur['nombre_piece']; ?></span>
                 <label for="nombre_chambre">Nombre de chambres:</label>
                 <input type="number" min="0" size="5" name="nombre_chambre" id="nombre_chambre" value="<?php if(isset($_POST['nombre_chambre'])) echo $_POST['nombre_chambre']; ?>" required /></br>
                 <span class="error_message"><?php if(isset($erreur['nombre_adulte'])) echo $erreur['nombre_adulte']; ?></span>
                 <label for="nombre_salle_bain">Nombre de salles de bain:</label>
                 <input type="number" min="0" size="5" name="nombre_salle_bain" id="nombre_salle_bain" value="<?php if(isset($_POST['nombre_salle_bain'])) echo $_POST['nombre_salle_bain']; ?>" required/>
                <span class="error_message"><?php if(isset($erreur['nombre_salle_bain'])) echo $erreur['nombre_salle_bain']; ?></span>
                </p>
            </div>
        </p>
        <p>
            <label for="description">Description :</label><br/>	
            <textarea name="description" id="description" rows="10" cols="50" placeholder="Maison au bord de la mer, 3 etages ..." ><?php if(isset($_POST['description'])) echo $_POST['description']; ?></textarea>       
            <span class="error_message"><?php if(isset($erreur['description'])) echo $erreur['description']; ?></span>
        </p>
        </fieldset>

        <fieldset>
        <legend><b>Quartier</b></legend>
            <p>
                <label for="points_forts">Points forts :</label><br/>	
                <textarea name="points_forts" id="points_forts" rows="10" cols="50" placeholder="Belle vue, murs super sonorises..." ><?php if(isset($_POST['points_forts'])) echo $_POST['points_forts']; ?></textarea>       
                <span class="error_message"><?php if(isset($erreur['points_forts'])) echo $erreur['points_forts']; ?></span>          
            </p>
            <p>
                <label for="activite"><u>Activité :</u></label><br/>
                <input type="checkbox" name="musee" id="musee" <?= isset($_POST['musee']) && $_POST['musee'] === 'on' ? ' checked' : ''; ?>><label for="musee">Musée</label><br />
                <span class="error_message"><?php if(isset($erreur['musee'])) echo $erreur['musee']; ?></span>
                
                <input type="checkbox" name="sport" id="sport" <?= isset($_POST['sport']) && $_POST['sport'] === 'on' ? ' checked' : ''; ?>><label for="sport">Sport</label><br />
                <span class="error_message"><?php if(isset($erreur['sport'])) echo $erreur['sport']; ?></span>
                
                <input type="checkbox" name="parc_attraction" id="parc_attraction" <?= isset($_POST['parc_attraction']) && $_POST['parc_attraction'] === 'on' ? ' checked' : ''; ?>><label for="parc_attraction">Parc d'attraction</label><br />
                <span class="error_message"><?php if(isset($erreur['parc_attraction'])) echo $erreur['parc_attraction']; ?></span>
                
                <input type="checkbox" name="shopping" id="shopping" <?= isset($_POST['shopping']) && $_POST['shopping'] === 'on' ? ' checked' : ''; ?>><label for="shopping">Shopping</label><br/>
                <span class="error_message"><?php if(isset($erreur['shopping'])) echo $erreur['shopping']; ?></span>
                
                <input type="checkbox" name="autre" id="autre" <?= isset($_POST['autre']) && $_POST['autre'] === 'on' ? ' checked' : ''; ?>><label for="autre">Autre: </label><input type="text" name="autre" id="autre" size="13" value="<?php if (isset($_POST['autre'])) echo $_POST['autre']; ?>" />
                <span class="error_message"><?php if(isset($erreur['autre'])) echo $erreur['autre']; ?></span>
            </p>
            <p>
                <label for="restauration">Restauration :</label><br/>	
                <textarea name="restauration" id="restauration" rows="10" cols="50" placeholder="Boulangerie juste en bas de l'immeuble, Libanais en bas de la rue ..."></textarea>       
                 <span class="error_message"><?php if(isset($erreur['restauration'])) echo $erreur['restauration']; ?></span>
            </p>
            <p>
                <label for="transport"><u>Transport :</u></label><br/>
                <input type="checkbox" name="metro" id="metro" <?= isset($_POST['metro']) && $_POST['metro'] === 'on' ? ' checked' : ''; ?>><label for="metro">Métro </label></br>
                <span class="error_message"><?php if(isset($erreur['metro'])) echo $erreur['metro']; ?></span>
                
                <input type="checkbox" name="velib" id="velib" <?= isset($_POST['velib']) && $_POST['velib'] === 'on' ? ' checked' : ''; ?>><label for="velib">Vélib'</label></br>
                <span class="error_message"><?php if(isset($erreur['velib'])) echo $erreur['velib']; ?></span>
               
                <input type="checkbox" name="bus" id="bus" <?= isset($_POST['bus']) && $_POST['bus'] === 'on' ? ' checked' : ''; ?>><label for="bus">Bus</label></br>
                <span class="error_message"><?php if(isset($erreur['bus'])) echo $erreur['bus']; ?></span>
               
                <input type="checkbox" name="tramway" id="tramway" <?= isset($_POST['tramway']) && $_POST['tramway'] === 'on' ? ' checked' : ''; ?>><label for="tramway">Tramway</label></br>
                <span class="error_message"><?php if(isset($erreur['tramway'])) echo $erreur['tramway']; ?></span>
                
                <input type="checkbox" name="autre" id="autre" <?= isset($_POST['autre']) && $_POST['autre'] === 'on' ? ' checked' : ''; ?>><label for="autre">Autre :</label><input type="text" name="autre" id="autre" size="13" value="<?php if (isset($_POST['autre'])) echo $_POST['autre']; ?>" />
                <span class="error_message"><?php if(isset($erreur['autre'])) echo $erreur['autre']; ?></span>
            </p>
            <p>
                <label for="environnement"><u>Environnement :</u></label><br/>
                <input type="checkbox" name="lac" id="lac" <?= isset($_POST['lac']) && $_POST['lac'] === 'on' ? ' checked' : ''; ?>><label for="lac">Lac</label></br>
                <span class="error_message"><?php if(isset($erreur['lac'])) echo $erreur['lac']; ?></span>
                
                <input type="checkbox" name="foret" id="foret" <?= isset($_POST['foret']) && $_POST['foret'] === 'on' ? ' checked' : ''; ?>><label for="foret">Forêt</label><br/>
                <span class="error_message"><?php if(isset($erreur['foret'])) echo $erreur['foret']; ?></span>
               
                <input type="checkbox" name="campagne" id="campagne" <?= isset($_POST['campagne']) && $_POST['campagne'] === 'on' ? ' checked' : ''; ?>><label for="campagne">Campagne</label></br>
                <span class="error_message"><?php if(isset($erreur['campagne'])) echo $erreur['campagne']; ?></span>
               
                <input type="checkbox" name="mer" id="mer" <?= isset($_POST['mer']) && $_POST['mer'] === 'on' ? ' checked' : ''; ?>><label for="mer">Mer</label><br/>
                <span class="error_message"><?php if(isset($erreur['mer'])) echo $erreur['mer']; ?></span>
                
                <input type="checkbox" name="ville_env" id="ville_env" <?= isset($_POST['ville']) && $_POST['ville'] === 'on' ? ' checked' : ''; ?>>
                <label for="ville_env">Ville</label></br>
                <span class="error_message"><?php if(isset($erreur['ville'])) echo $erreur['ville']; ?></span>
               
                <input type="checkbox" name="autre" id="autre" <?= isset($_POST['autre']) && $_POST['autre'] === 'on' ? ' checked' : ''; ?>><label for="autre">Autre :</label><input type="text" name="autre" id="autre" size="13" value="<?php if (isset($_POST['autre'])) echo $_POST['autre']; ?>" />
                <span class="error_message"><?php if(isset($erreur['autre'])) echo $erreur['autre']; ?></span>
            </p>
        </fieldset>

        <fieldset>
        <legend><b>Informations complémentaires</b></legend>
            <p>
                <label for="contrainte"><u>Contraintes :</u></label><br/>
                <input type="checkbox" name="pas_fumer" id="pas_fumer" <?= isset($_POST['pas_fumer']) && $_POST['pas_fumer'] === 'on' ? ' checked' : ''; ?>><label for="pas_fumer">Ne pas fumer dans le logement</label></br>
                <span class="error_message"><?php if(isset($erreur['pas_fumer'])) echo $erreur['pas_fumer']; ?></span>
                
                <input type="checkbox" name="pas_bruit" id="pas_bruit" <?= isset($_POST['pas_bruit']) && $_POST['pas_bruit'] === 'on' ? ' checked' : ''; ?>><label for="pas_bruit">Pas de bruit après 23h</label><br />
                <span class="error_message"><?php if(isset($erreur['pas_bruit'])) echo $erreur['pas_bruit']; ?></span>
                
                <input type="checkbox" name="pas_enfant" id="pas_enfant" <?= isset($_POST['pas_enfant']) && $_POST['pas_enfant'] === 'on' ? ' checked' : ''; ?>><label for="pas_enfant">Pas d'enfants</label></br>
                <span class="error_message"><?php if(isset($erreur['pas_enfant'])) echo $erreur['pas_enfant']; ?></span>
                
                <input type="checkbox" name="pas_animaux" id="pas_animaux" <?= isset($_POST['pas_animaux']) && $_POST['pas_animaux'] === 'on' ? ' checked' : ''; ?>><label for="pas_animaux">Pas d'animaux</label><br/>
                <span class="error_message"><?php if(isset($erreur['pas_animaux'])) echo $erreur['pas_animaux']; ?></span>
                
                <input type="checkbox" name="autre" id="autre" <?= isset($_POST['autre']) && $_POST['autre'] === 'on' ? ' checked' : ''; ?>><label for="autre">Autre:</label><input type="text" name="autre" id="autre" size="13" value="<?php if (isset($_POST['autre'])) echo $_POST['autre']; ?>" />
                <span class="error_message"><?php if(isset($erreur['autre'])) echo $erreur['autre']; ?></span>
            </p>
            <p>
                <label for="service"><u>Services :</u></label><br/>
                <input type="checkbox" name="fermer" id="fermer" <?= isset($_POST['fermer']) && $_POST['fermer'] === 'on' ? ' checked' : ''; ?>><label for="fermer">Fermer la porte à double tour en sortant</label></br>
                <span class="error_message"><?php if(isset($erreur['fermer'])) echo $erreur['fermer']; ?></span>
                
                <input type="checkbox" name="garder_animaux" id="garder_animaux" <?= isset($_POST['garder_animaux']) && $_POST['garder_animaux'] === 'on' ? ' checked' : ''; ?>><label for="garder_animaux">Garder les animaux domestiques</label></br>
                <span class="error_message"><?php if(isset($erreur['garder_animaux'])) echo $erreur['garder_animaux']; ?></span>
               
                <input type="checkbox" name="arroser_plantes" id="arroser_plantes" <?= isset($_POST['arroser_plantes']) && $_POST['arroser_plantes'] === 'on' ? ' checked' : ''; ?>><label for="arroser_plantes">Arroser les plantes</label></br>
                <span class="error_message"><?php if(isset($erreur['arroser_plantes'])) echo $erreur['arroser_plantes']; ?></span>
               
                <input type="checkbox" name="discuter_voisine" id="discuter_voisine" <?= isset($_POST['discuter_voisine']) && $_POST['discuter_voisine'] === 'on' ? ' checked' : ''; ?>><label for="discuter_voisine">Discuter avec les vieille voisine</label></br>
                <span class="error_message"><?php if(isset($erreur['discuter_voisine'])) echo $erreur['discuter_voisine']; ?></span>
               
                <input type="checkbox" name="menage" id="menage" <?= isset($_POST['menage']) && $_POST['menage'] === 'on' ? ' checked' : ''; ?>><label for="menage">Faire le ménage avant de quitter le logement</label></br>
                <span class="error_message"><?php if(isset($erreur['menage'])) echo $erreur['menage']; ?></span>
               
                <input type="checkbox" name="autre" id="autre" <?= isset($_POST['autre']) && $_POST['autre'] === 'on' ? ' checked' : ''; ?>><label for="autre">Autre :</label><input type="text" name="autre" id="autre" size="13" value="<?php if (isset($_POST['autre'])) echo $_POST['autre']; ?>" />
                <span class="error_message"><?php if(isset($erreur['autre'])) echo $erreur['autre']; ?></span>
            </p>
            <p>
                <label for="option"><u>Options :</u></label><br/>
                <input type="checkbox" name="wifi" id="wifi" <?= isset($_POST['wifi']) && $_POST['wifi'] === 'on' ? ' checked' : ''; ?>><label for="wifi">Wifi</label></br>
                <span class="error_message"><?php if(isset($erreur['wifi'])) echo $erreur['wifi']; ?></span>
                
                <input type="checkbox" name="voiture" id="voiture" <?= isset($_POST['voiture']) && $_POST['voiture'] === 'on' ? ' checked' : ''; ?>><label for="voiture">Voiture</label><br />
                <span class="error_message"><?php if(isset($erreur['voiture'])) echo $erreur['voiture']; ?></span>
                
                <input type="checkbox" name="jardin_terrase" id="jardin_terrase" <?= isset($_POST['jardin_terrase']) && $_POST['jardin_terrase'] === 'on' ? ' checked' : ''; ?>><label for="jardin_terrase">Jardin / Terrasse</label></br>
                <span class="error_message"><?php if(isset($erreur['jardin_terrase'])) echo $erreur['jardin_terrase']; ?></span>
                
                <input type="checkbox" name="piscine" id="piscine" <?= isset($_POST['piscine']) && $_POST['piscine'] === 'on' ? ' checked' : ''; ?>><label for="piscine">Piscine</label><br/>
                <span class="error_message"><?php if(isset($erreur['piscine'])) echo $erreur['piscine']; ?></span>
                
                <input type="checkbox" name="equipement_sportif" id="equipement_sportif" <?= isset($_POST['equipement_sportif']) && $_POST['equipement_sportif'] === 'on' ? ' checked' : ''; ?>><label for="equipement_sportif">Equipement sportif</label></br>
                <span class="error_message"><?php if(isset($erreur['equipement_sportif'])) echo $erreur['equipement_sportif']; ?></span>
                
                <input type="checkbox" name="acces_handicape" id="acces_handicape" <?= isset($_POST['acces_handicape']) && $_POST['acces_handicape'] === 'on' ? ' checked' : ''; ?>><label for="acces_handicape">Accès handicapé</label></br>
                <span class="error_message"><?php if(isset($erreur['acces_handicape'])) echo $erreur['acces_handicape']; ?></span>
                
                <input type="checkbox" name="autre" id="autre" <?= isset($_POST['autre']) && $_POST['autre'] === 'on' ? ' checked' : ''; ?>><label for="autre">Autre :</label><input type="text" name="autre" id="autre" size="13" value="<?php if (isset($_POST['autre'])) echo $_POST['autre']; ?>" />
                <span class="error_message"><?php if(isset($erreur['autre'])) echo $erreur['autre']; ?></span>
            </p>
        </fieldset>
    
        <input type="submit" id="submit" value="Enregistrer"/>

</form>