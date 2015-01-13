<h2>Profil de <?= htmlspecialchars($infos_utilisateur['pseudo']); ?></h2>

<p>
    <img class="flottant_droite" src="<?= DOSSIER_AVATAR.urlencode($infos_utilisateur['avatar']); ?>" title="Avatar de <?= htmlspecialchars($infos_utilisateur['pseudo']); ?>">
    <div><span class="label_profil">Nom</span> : <?= $infos_utilisateur['nom']; ?></p></div>
    <div><span class="label_profil">Prénom</span> : <?= $infos_utilisateur['prenom']; ?></p></div>
    <div><span class="label_profil">Pseudo</span> : <?= $infos_utilisateur['pseudo']; ?></p></div>
    <div><span class="label_profil">Sexe</span> : <?= $infos_utilisateur['sexe'] ? 'Femme' : 'Homme'; ?></p></div>
    <div><span class="label_profil">Date de naissance</span> : <?= $infos_utilisateur['date_naissance']; ?></p></div>
    <div><span class="label_profil">Date d'inscription</span> : <?= $infos_utilisateur['date_inscription']; ?></p></div>
    <div><span class="label_profil">Profession</span> : <?= $infos_utilisateur['profession']; ?></p></div>
    <div><span class="label_profil">Parle</span> : <?= $infos_utilisateur['langue']; ?></p></div>
    <div><span class="label_profil">Email</span> : <?= $infos_utilisateur['email']; ?></p></div>
    <div><span class="label_profil">Rue</span> : <?= $infos_utilisateur['rue']; ?></p></div>
    <div><span class="label_profil">Code postal</span> : <?= $infos_utilisateur['code_postal']; ?></p></div>
    <div><span class="label_profil">Ville</span> : <?= $infos_utilisateur['ville']; ?></p></div>
    <div><span class="label_profil">Pays</span> : <?= $infos_utilisateur['pays']; ?></p></div>
    <div><span class="label_profil">Nombre d'adulte</span> : <?= $infos_utilisateur['nb_adulte']; ?></p></div>
    <div><span class="label_profil">Nombre d'enfant</span> : <?= $infos_utilisateur['nb_enfant']; ?></p></div>
    <div><span class="label_profil">Centre d'intérêt</span> :<br><?= nl2br($infos_utilisateur['interet']); ?></p></div>
    <div><span class="label_profil">Fumeur</span> : <?= $infos_utilisateur['fumeur'] ? 'Oui' : 'Non'; ?></p></div>
    <div><span class="label_profil">Animaux</span> : <?= $infos_utilisateur['animaux'] ? 'Oui' : 'Non'; ?></p></div>
</p>