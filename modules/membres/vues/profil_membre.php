<h2><?= $membre['id'] == $_SESSION['Utilisateur']['id'] ? 'Mon profil' : 'Profil de ' . htmlspecialchars($membre['pseudo']); ?></h2>

<section class="">
	<img class="flottant_droite" src="<?= $membre['avatar']; ?>" title="Avatar de <?= htmlspecialchars($membre['pseudo']); ?>">

	<div class="">
		<h3>Informations membre</h3>
		<p class="label_profil"><b>Note :</b> <?= $membre['note_totale'] === null ? '-' : $membre['note_totale']; ?> /10</p>
		<p class="label_profil"><b>Nom :</b> <?= $membre['nom']; ?></p>
		<p class="label_profil"><b>Prénom :</b> <?= $membre['prenom']; ?></p>
		<p class="label_profil"><b>Pseudo :</b> <?= $membre['pseudo']; ?></p>
		<p class="label_profil"><b>Sexe :</b> <?= $membre['sexe'] ? 'Femme' : 'Homme'; ?></p>
		<p class="label_profil"><b>Date de naissance :</b> <?= (new DateTime($membre['date_naissance']))->format('d/m/Y'); ?></p>
		<p class="label_profil"><b>Date d'inscription :</b> <?= (new DateTime($membre['date_inscription']))->format('d/m/Y'); ?></p>
		<p class="label_profil"><b>Profession :</b> <?= $membre['profession']; ?></p>
		<p class="label_profil"><b>Parle :</b> <?= $membre['langue']; ?></p>
	</div>
	<div class="">
		<h3>Coordonnées</h3>
		<p class="label_profil"><b>Email :</b> <?= $membre['email']; ?></p>
		<p class="label_profil"><b>Rue :</b> <?= $membre['rue']; ?></p>
		<p class="label_profil"><b>Code postal :</b> <?= $membre['code_postal']; ?></p>
		<p class="label_profil"><b>Ville :</b> <?= $membre['ville']; ?></p>
		<p class="label_profil"><b>Pays :</b> <?= $membre['pays']; ?></p>
	</div>
	<div class="">
		<h3>Profil membre</h3>
		<p class="label_profil"><b>Nombre d'adulte :</b> <?= $membre['nb_adulte']; ?></p>
		<p class="label_profil"><b>Nombre d'enfant :</b> <?= $membre['nb_enfant']; ?></p>
		<p class="label_profil"><b>Centre d'intérêt :</b><br><?= nl2br($membre['interet']); ?></p>
		<p class="label_profil"><b>Fumeur :</b> <?= $membre['fumeur'] ? 'Oui' : 'Non'; ?></p>
		<p class="label_profil"><b>Animaux :</b> <?= $membre['animaux'] ? 'Oui' : 'Non'; ?></p>
	</div>
	<div>
		<h3><?= $membre['id'] == $_SESSION['Utilisateur']['id'] ? (count($logements) > 1 ? 'Mes' : 'Mon') : (count($logements) > 1 ? 'Ses' : 'Son'); ?> logement<?= count($logements) > 1 ? 's' : ''; ?></h3>
<?php foreach ($logements as $logement) : ?>
		<p><a href="index.php?module=logements&action=afficher&id=<?= $logement['id']; ?>"><?= $logement['nom']; ?></a></p>
<?php endforeach; ?>
	</div>

</section>