<div id="connexion">
	
                <h2>Espace membre</h2>
                
		<?php if (!utilisateur_est_connecte()) { ?>
                <ul>
                    <li><a href="index.php?module=membres&amp;action=inscription">Inscription</a></li>
                    <li><a href="index.php?module=membres&amp;action=connexion">Connexion</a></li>
                </ul>
                <?php } else { ?>
                <p>Bienvenue, <?php echo htmlspecialchars($_SESSION['Utilisateur']['pseudo']); ?>.</p>
                <ul>
                    <li><a href="index.php?module=membres&amp;action=afficher_profil&amp;id=<?php echo $_SESSION['Utilisateur']['id'];?>">Mon profil</a></li>
                    <li><a href="index.php?module=logements&amp;action=inscription">Proposer un logement</a></li>
                    <li><a href="index.php?module=membres&amp;action=modifier_profil">Modifier mon profil</a></li>
                    <li><a href="index.php?module=membres&amp;action=deconnexion">Déconnexion</a></li>
                </ul>
                <?php } ?>
</div>
