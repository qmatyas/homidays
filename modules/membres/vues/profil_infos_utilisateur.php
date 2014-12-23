<h2>Profil de <?php echo htmlspecialchars($pseudo); ?></h2>

<p>
	<img class="flottant_droite" src="<?php echo DOSSIER_AVATAR.urlencode($avatar); ?>" title="Avatar de <?php echo htmlspecialchars($pseudo); ?>" />
	<span class="label_profil">Nom</span> : <?php echo htmlspecialchars($nom); ?><br />
	<span class="label_profil">Prénom</span> : <?php echo htmlspecialchars($prenom); ?><br />
	<span class="label_profil">Sexe</span> : <?php echo htmlspecialchars($sexe); ?><br />
	<span class="label_profil">Date de naissance</span> : <?php echo htmlspecialchars($date_naissance); ?><br />
	<span class="label_profil">Profession</span> : <?php echo htmlspecialchars($profession); ?><br />
	<span class="label_profil">Adresse email</span> : <?php echo htmlspecialchars($email); ?><br />
	<span class="label_profil">Numéro de téléphone</span> : <?php echo htmlspecialchars($tel); ?><br />
	<span class="label_profil">Rue</span> : <?php echo htmlspecialchars($rue); ?><br />
	<span class="label_profil">Code postal</span> : <?php echo htmlspecialchars($code_postal); ?><br />
	<span class="label_profil">Ville</span> : <?php echo htmlspecialchars($ville); ?><br />
	<span class="label_profil">Pays</span> : <?php echo htmlspecialchars($pays); ?><br />
	<span class="label_profil">Nombre d'adulte</span> : <?php echo htmlspecialchars($nb_adulte); ?><br />
	<span class="label_profil">Nombre d'enfant</span> : <?php echo htmlspecialchars($nb_enfant); ?><br />
	<span class="label_profil">Centre d'intérêt</span> : <?php echo htmlspecialchars($interet); ?><br />
	<span class="label_profil">Date d'inscription</span> : <?php echo $date_inscription; ?>
</p>