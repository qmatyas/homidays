<?php

// Vérification des droits d'accès de la page
if (!utilisateur_est_connecte()) {
	// On affiche la page d'erreur comme quoi l'utilisateur est déjà connecté   
	include CHEMIN_VUE_GLOBALE.'erreur_non_connecte.php';
} else {
	
		$valid = true;
		$erreur = array();

		$logement = array();
		$quartier = array();
		$activite = array();
		$transport = array();
		$environnement = array();
		$contrainte = array();
		$service = array();
		$option = array();

	// Recuperer l'id de l'utilisateur connecte ! Provisoirement on en met un bidon.
	$logement['utilisateur'] = $_SESSION['Utilisateur']['id'];

	function valid (&$array, $nom, $titre, $type = null) {
		global $erreur, $valid;
		if (empty($_POST[$nom]) && $type !== 'bool') {
			$valid = false;
			echo 'erreur : ' . $nom;
			$erreur[$nom] = 'Vous n\'avez pas rempli votre ' . $titre . '.';
		} else {
			switch ($type) {
				case 'bool':
					if (isset($_POST[$nom]) && $_POST[$nom] === 'on')
						$array[$nom] = 1;
					else
						$array[$nom] = 0;
					break;
				default:
					$array[$nom] = $_POST[$nom];
			}
		}
	}

	valid($logement, 'nom', 'nom');
	valid($logement, 'rue', 'rue');
	valid($logement, 'code_postal', 'code postal');
	valid($logement, 'ville', 'ville');
	valid($logement, 'pays', 'pays');
	valid($logement, 'type_logement', 'type_logement');
	valid($logement, 'superficie', 'superficie');
	valid($logement, 'nombre_piece', 'nombre de pièce');
	valid($logement, 'nombre_chambre', 'nombre de chambre');
	valid($logement, 'nombre_salle_bain', 'nombre de salle de bain');
	valid($logement, 'description', 'description');

	valid($quartier, 'points_forts', 'points_forts');
	valid($quartier, 'restauration', 'restauration');

	valid($activite, 'musee', 'musee', 'bool');
	valid($activite, 'sport', 'sport', 'bool');
	valid($activite, 'parc_attraction', 'parc_attraction', 'bool');
	valid($activite, 'shopping', 'shopping', 'bool');
	valid($activite, 'autre', 'autre', 'bool');

	valid($transport, 'metro', 'metro', 'bool');
	valid($transport, 'velib', 'velib', 'bool');
	valid($transport, 'bus', 'bus', 'bool');
	valid($transport, 'tramway', 'tramway', 'bool');
	valid($transport, 'autre', 'autre', 'bool');

	valid($environnement, 'lac', 'lac', 'bool');
	valid($environnement, 'foret', 'foret', 'bool');
	valid($environnement, 'campagne', 'campagne', 'bool');
	valid($environnement, 'mer', 'mer', 'bool');
	valid($environnement, 'ville_env', 'ville', 'bool');
	valid($environnement, 'autre', 'autre', 'bool');

	valid($contrainte, 'pas_fumer', 'pas_fumer', 'bool');
	valid($contrainte, 'pas_bruit', 'pas_bruit', 'bool');
	valid($contrainte, 'pas_enfant', 'pas_enfant', 'bool');
	valid($contrainte, 'pas_animaux', 'pas_animaux', 'bool');
	valid($contrainte, 'autre', 'autre', 'bool');

	valid($service, 'fermer', 'fermer', 'bool');
	valid($service, 'garder_animaux', 'garder_animaux', 'bool');
	valid($service, 'arroser_plantes', 'arroser_plantes', 'bool');
	valid($service, 'discuter_voisine', 'discuter_voisine', 'bool');
	valid($service, 'menage', 'menage', 'bool');
	valid($service, 'autre', 'autre', 'bool');

	valid($option, 'wifi', 'wifi', 'bool');
	valid($option, 'voiture', 'voiture', 'bool');
	valid($option, 'jardin_terrase', 'jardin_terrase', 'bool');
	valid($option, 'piscine', 'piscine', 'bool');
	valid($option, 'equipement_sportif', 'equipement_sportif', 'bool');
	valid($option, 'acces_handicape', 'acces_handicape', 'bool');
	valid($option, 'autre', 'autre', 'bool');

		if ($valid) {
			include CHEMIN_MODELE.'logements.php';
			try {
                $form['id'] = $_SESSION['Utilisateur']['id'];
				$result = logement_modifier($form);
			} catch (PDOException $e) {
                                echo "Echec de la connexion à la base de données.\nErreur : " . $e->getMessage();
				include CHEMIN_VUE.'formulaire_modifier.php';
				die();
			}
                        foreach ($form as $key => $value) {
                            $_SESSION['Utilisateur'][$key] = $value;
                        }
		}
            
	
        include CHEMIN_VUE.'formulaire_modifier.php';
}