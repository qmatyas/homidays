<div class="connexion">
	
                <h2>Espace membre</h2>
                
		<?php if (!utilisateur_est_connecte()) : ?>
                <ul>
                    <li><a href="<?= url('membres', 'inscription'); ?>">Inscription</a></li>
                    <li><a href="<?= url('membres', 'connexion'); ?>">Connexion</a></li>
                </ul>
                <?php else : ?>
                <ul>
                    <img class="flottant_droite" src="<?= $_SESSION['Utilisateur']['avatar']; ?>" title="Avatar de <?= htmlspecialchars($_SESSION['Utilisateur']['avatar']); ?>">
                    <li><a href="<?= url('membres', 'afficher'); ?>'id' => $_SESSION['Utilisateur']['id']; ?>">Mon profil</a></li>
                    <li><a href="<?= url('logements', 'lister'); ?>'id' => $_SESSION['Utilisateur']['id']; ?>">Mes logements</a></li>
                    <li><a href="<?= url('disponibilites', 'afficher_reservations'); ?>">Mes réservations</a></li>
                    <li><a href="<?= url('logements', 'inscription'); ?>">Proposer un logement</a></li>
                    <li><a href="<?= url('membres', 'modifier_profil'); ?>">Modifier mon profil</a></li>
                    <li><a href="<?= url('logements', 'modifier_logement'); ?>">Modifier mes logements</a></li>
                    <li><a href="<?= url('membres', 'deconnexion'); ?>">Déconnexion</a></li>
                </ul>
        <?php endif; ?>
</div>
