<h2>Profil de <?php echo htmlspecialchars($pseudo); ?></h2>

<p>
	<img class="flottant_droite" src="<?php echo DOSSIER_AVATAR.urlencode($avatar); ?>" title="Avatar de <?php echo htmlspecialchars($pseudo); ?>" />
        <span class="label_profil">Date d'inscription</span> : <?php echo ($date_inscription); ?>
	<span class="label_profil">Profession</span> : <?php echo htmlspecialchars($profession); ?><br />
        <span class="label_profil">Parle</span> : <?php echo ($langue); ?>
	<span class="label_profil">Nombre d'adulte</span> : <?php echo htmlspecialchars($nb_adulte); ?><br />
	<span class="label_profil">Nombre d'enfant</span> : <?php echo htmlspecialchars($nb_enfant); ?><br />
	<span class="label_profil">Centre d'intérêt</span> : <?php echo htmlspecialchars($interet); ?><br />
	
</p>