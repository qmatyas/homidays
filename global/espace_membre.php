<div class="connexion">
	
                <h2>Espace membre</h2>
                
		<?php if (!utilisateur_est_connecte()) : ?>
                <ul>
                    <li><a href="index.php?module=membres&amp;action=inscription">Inscription</a></li>
                    <li><a href="index.php?module=membres&amp;action=connexion">Connexion</a></li>
                </ul>
                <?php else : ?>
                <ul>
                    <img class="flottant_droite" src="<?= $_SESSION['Utilisateur']['avatar']; ?>" title="Avatar de <?= htmlspecialchars($_SESSION['Utilisateur']['avatar']); ?>">
                    <li><a href="index.php?module=membres&amp;action=afficher&amp;id=<?php echo $_SESSION['Utilisateur']['id'];?>">Mon profil</a></li>
                    <li><a href="index.php?module=logements&amp;action=lister&amp;id=<?= $_SESSION['Utilisateur']['id']; ?>">Mes logements</a></li>
                    <li><a href="index.php?module=logements&amp;action=inscription">Proposer un logement</a></li>
                    <li><a href="index.php?module=membres&amp;action=modifier_profil">Modifier mon profil</a></li>
                    <li><a href="index.php?module=logements&amp;action=modifier_logement">Modifier mes logements</a></li>
                    <li><a href="index.php?module=membres&amp;action=deconnexion">Déconnexion</a></li>
                </ul>
        <?php endif; ?>
</div>
