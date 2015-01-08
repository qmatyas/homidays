<h2>Profil de <?php echo htmlspecialchars($infos_utilisateur['pseudo']); ?></h2>

<p>
  <img class="flottant_droite" src="<?php echo DOSSIER_AVATAR.urlencode($infos_utilisateur['avatar']); ?>" title="Avatar de <?php echo htmlspecialchars($infos_utilisateur['pseudo']); ?>" />
  <span class="label_profil">Nom</span> : <?php echo ($infos_utilisateur['nom']); ?><br />
  <span class="label_profil">Prénom</span> : <?php echo ($infos_utilisateur['prenom']); ?><br />
  <span class="label_profil">Pseudo</span> : <?php echo ($infos_utilisateur['pseudo']); ?><br />
  <span class="label_profil">Sexe</span> : <?php echo ($infos_utilisateur['sexe']); ?><br />
  <span class="label_profil">Date de naissance</span> : <?php echo ($infos_utilisateur['date_naissance']); ?><br />
  <span class="label_profil">Date d'inscription</span> : <?php echo ($infos_utilisateur['date_inscription']); ?><br />
  <span class="label_profil">Profession</span> : <?php echo ($infos_utilisateur['profession']); ?><br />
  <span class="label_profil">Parle</span> : <?php echo ($infos_utilisateur['langue']); ?><br />
  <span class="label_profil">Email</span> : <?php echo ($infos_utilisateur['email']); ?><br />
  <span class="label_profil">Rue</span> : <?php echo ($infos_utilisateur['rue']); ?><br />
  <span class="label_profil">Code postal</span> : <?php echo ($infos_utilisateur['code_postal']); ?><br />
  <span class="label_profil">Ville</span> : <?php echo ($infos_utilisateur['ville']); ?><br />
  <span class="label_profil">Pays</span> : <?php echo ($infos_utilisateur['pays']); ?><br />
  <span class="label_profil">Nombre d'adulte</span> : <?php echo htmlspecialchars($infos_utilisateur['nb_adulte']); ?><br />
  <span class="label_profil">Nombre d'enfant</span> : <?php echo htmlspecialchars($infos_utilisateur['nb_enfant']); ?><br />
  <span class="label_profil">Centre d'intérêt</span> : <?php echo htmlspecialchars($infos_utilisateur['interet']); ?><br />
  <span class="label_profil">Fumeur</span> : <?php echo htmlspecialchars($infos_utilisateur['fumeur']); ?><br />
  <span class="label_profil">Animaux</span> : <?php echo htmlspecialchars($infos_utilisateur['animaux']); ?><br />
</p>