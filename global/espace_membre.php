<?php include 'global/trads/espace_membre_' . LANG . '.php'; ?>

<div class="connexion">
	
                <h2><?= TXT_ESPACEMBR; ?></h2>
                
		<?php if (!utilisateur_est_connecte()) : ?>
                <ul>
                    <li><a href="<?= url('membres', 'inscription'); ?>"><?= TXT_INSCRIPTION ;?></a></li>
                    <li><a href="<?= url('membres', 'connexion'); ?>"><?= TXT_CONNEX ;?></a></li>
                </ul>
                <?php else : ?>
                <ul>
                    <div class="avatar">
                        <img src="<?= $_SESSION['Utilisateur']['avatar']; ?>" title="Avatar de <?= htmlspecialchars($_SESSION['Utilisateur']['avatar']); ?>">
                    </div>
                    <li><a href="<?= url('membres', 'afficher', ['id' => $_SESSION['Utilisateur']['id']]); ?>"><?= TXT_MONPROF ;?></a></li>
                    <li><a href="<?= url('logements', 'lister', ['id' => $_SESSION['Utilisateur']['id']]); ?>"><?= TXT_MESLOG ;?></a></li>
                    <li><a href="<?= url('disponibilites', 'afficher_reservations'); ?>"><?= TXT_MESRES ;?></a></li>
                    <li><a href="<?= url('logements', 'inscription'); ?>"><?=TXT_PROPOSER_UN_LOG; ?></a></li>
                    <li><a href="<?= url('membres', 'modifier_profil'); ?>"><?=TXT_MODIFMONPROF; ?></a></li>
                    <li><a href="<?= url('logements', 'modifier_logement'); ?>"><?=TXT_MODIFMESLOGS; ?></a></li>
                    <li><a href="<?= url('membres', 'deconnexion'); ?>"><?= TXT_DECO; ?></a></li>
                </ul>
        <?php endif; ?>
</div>
