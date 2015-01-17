<h2><?= $membre['id'] == $_SESSION['Utilisateur']['id'] ? 'Mon profil' : 'Profil de ' . htmlspecialchars($membre['pseudo']); ?></h2>

<img class="flottant_droite" src="<?= $membre['avatar']; ?>" title="Avatar de <?= htmlspecialchars($membre['pseudo']); ?>">
<div><span class="label_profil">Note</span> : <?= $membre['note_totale'] === null ? '-' : $membre['note_totale']; ?> /10</div>
<div><span class="label_profil">Nom</span> : <?= $membre['nom']; ?></div>
<div><span class="label_profil">Prénom</span> : <?= $membre['prenom']; ?></div>
<div><span class="label_profil">Pseudo</span> : <?= $membre['pseudo']; ?></div>
<div><span class="label_profil">Sexe</span> : <?= $membre['sexe'] ? 'Femme' : 'Homme'; ?></div>
<div><span class="label_profil">Date de naissance</span> : <?= (new DateTime($membre['date_naissance']))->format('d/m/Y'); ?></div>
<div><span class="label_profil">Date d'inscription</span> : <?= (new DateTime($membre['date_inscription']))->format('d/m/Y'); ?></div>
<div><span class="label_profil">Profession</span> : <?= $membre['profession']; ?></div>
<div><span class="label_profil">Parle</span> : <?= $membre['langue']; ?></div>
<div><span class="label_profil">Email</span> : <?= $membre['email']; ?></div>
<div><span class="label_profil">Rue</span> : <?= $membre['rue']; ?></div>
<div><span class="label_profil">Code postal</span> : <?= $membre['code_postal']; ?></div>
<div><span class="label_profil">Ville</span> : <?= $membre['ville']; ?></div>
<div><span class="label_profil">Pays</span> : <?= $membre['pays']; ?></div>
<div><span class="label_profil">Nombre d'adulte</span> : <?= $membre['nb_adulte']; ?></div>
<div><span class="label_profil">Nombre d'enfant</span> : <?= $membre['nb_enfant']; ?></div>
<div><span class="label_profil">Centre d'intérêt</span> :<br><?= nl2br($membre['interet']); ?></div> <!-- securite -->
<div><span class="label_profil">Fumeur</span> : <?= $membre['fumeur'] ? 'Oui' : 'Non'; ?></div>
<div><span class="label_profil">Animaux</span> : <?= $membre['animaux'] ? 'Oui' : 'Non'; ?></div>