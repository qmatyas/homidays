<h2>Profil de <?php echo htmlspecialchars($offre['nom']); ?></h2>

<p>
  <span class="label_profil">Type</span> : <?php echo ($offre['type']); ?><br />
  <span class="label_profil">Rue</span> : <?php echo ($offre['rue']); ?><br />
  <span class="label_profil">Code postal</span> : <?php echo ($offre['code_postal']); ?><br />
  <span class="label_profil">Ville</span> : <?php echo ($offre['ville']); ?><br />
  <span class="label_profil">Pays</span> : <?php echo ($offre['pays']); ?><br />
  <span class="label_profil">Superficie</span> : <?php echo ($offre['superficie']); ?><br />
  <span class="label_profil">Nombre de pièces</span> : <?php echo ($offre['nb_piece']); ?><br />
  <span class="label_profil">Nombre de chambres</span> : <?php echo ($offre['nb_chambre']); ?><br />
  <span class="label_profil">Nombre de salles de bain</span> : <?php echo htmlspecialchars($offre['nb_salle_bain']); ?><br />
  <span class="label_profil">Note totale</span> : <?php echo htmlspecialchars($offre['note_totale']); ?><br />
  <span class="label_profil">Description</span> : <?php echo htmlspecialchars($offre['description']); ?><br />
</p>