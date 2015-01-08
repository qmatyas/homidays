<h2>Profil de <?php echo htmlspecialchars($membre['pseudo']); ?></h2>

<p>
  <span class="label_profil">Nom</span> : <?php echo ($membre['nom']); ?><br />
  <span class="label_profil">Prénom</span> : <?php echo ($membre['prenom']); ?><br />
  <span class="label_profil">Pseudo</span> : <?php echo ($membre['pseudo']); ?><br />
  <span class="label_profil">Sexe</span> : <?php echo ($membre['sexe']); ?><br />
  <span class="label_profil">Date de naissance</span> : <?php echo ($membre['date_naissance']); ?><br />
  <span class="label_profil">Date d'inscription</span> : <?php echo ($membre['date_inscription']); ?><br />
  <span class="label_profil">Profession</span> : <?php echo ($membre['profession']); ?><br />
  <span class="label_profil">Parle</span> : <?php echo ($membre['langue']); ?><br />
  <span class="label_profil">Nombre d'adulte</span> : <?php echo htmlspecialchars($membre['nb_adulte']); ?><br />
  <span class="label_profil">Nombre d'enfant</span> : <?php echo htmlspecialchars($membre['nb_enfant']); ?><br />
  <span class="label_profil">Centre d'intérêt</span> : <?php echo htmlspecialchars($membre['interet']); ?><br />
  <span class="label_profil">Fumeur</span> : <?php echo htmlspecialchars($membre['fumeur']); ?><br />
  <span class="label_profil">Animaux</span> : <?php echo htmlspecialchars($membre['animaux']); ?><br />
</p>