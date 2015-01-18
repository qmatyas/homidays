<?php

if (!utilisateur_est_connecte()) {
	// On affiche la page d'erreur comme quoi l'utilisateur doit être connecté pour voir la page
	include CHEMIN_VUE_GLOBALE . 'erreur_non_connecte.php';
} else {
	// Si le paramètre id est manquant ou invalide
	if (!isset($_GET['id']) || empty($_GET['id']) || !is_numeric($_GET['id'])) {
		include CHEMIN_VUE . 'erreur_parametre_profil.php';
	} else {
		$id = $_GET['id'];
		if ($id == $_SESSION['Utilisateur']['id']) {
			// Si le membre demande à voir son profil
			$membre = $_SESSION['Utilisateur'];
		} else {
			include CHEMIN_MODELE . 'membres.php';
			$membre = membres_recuperer($id);

			// Si le profil existe et que le compte est validé
			if (!$membre && !empty($membre['hash_validation'])) {
				include CHEMIN_VUE . 'erreur_profil_inexistant.php';
			}
		}
		include CHEMIN_MODELE . 'logements.php';
		$logements = logements_recuperer_liste($id);
		include CHEMIN_VUE . 'profil_membre.php';
	}

}