<?php

// Vérification des droits d'accès de la page
if (!utilisateur_est_connecte()) {
	// On affiche la page d'erreur comme quoi l'utilisateur est déjà connecté   
	include CHEMIN_VUE_GLOBALE.'erreur_non_connecte.php';
} else {
	if (!empty($_POST)) {
            if (isset($_POST['pass'], $_POST['pass0'], $_POST['pass2'])) {
                if ($_POST['pass'] === $_POST['pass2']) {
                    include_once CHEMIN_MODELE.'membres.php';
                    $pass = sha1($_POST['pass0']);
                    if ($pass === membre_recuperer_pass($_SESSION['Utilisateur']['id'])){
                        membre_modifier_pass($_SESSION['Utilisateur']['id'], $pass);
                    } else {
                        $erreur['pass'] = 'Mauvais mot de passe.';
                    }
                } else {
                    $erreur['pass'] = 'Vous avez spécifié deux mots de passe différents.';
                }
            } else {
		$valid = true;
		$erreur = array();
		$form = array();

		function valid($nom, $titre){
			global $erreur, $form, $valid;
			if (empty($_POST[$nom])) {
				$valid = false;
				$erreur[$nom] = 'Vous n\'avez pas rempli le champs ' . $titre . '.';
			} else {
				$form[$nom] = $_POST[$nom];
			}
		}

		valid('nom', 'nom');
		valid('prenom', 'prénom');
		valid('date_naissance', 'date de naissance');
		valid('profession', 'profession');
		valid('langue', 'langue');
		valid('email', 'email');
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$valid = false;
			$erreur['email'] = 'Email invalide.';
		}
		valid('tel', 'télephone');
		valid('rue', 'rue');
		valid('code_postal', 'postal');
		valid('ville', 'ville');
		valid('pays', 'pays');
		valid('pseudo', 'pseudo');
		valid('nb_adulte', 'adultes');
		valid('nb_enfant', 'enfants');
		valid('interet', 'intérêt');
		$form['animaux'] = isset($_POST['animaux']) && $_POST['animaux'] === 'on';
		$form['fumeur'] = isset($_POST['fumeur']) && $_POST['fumeur'] === 'on';
		$form['sexe'] = $_POST['sexe'] === 'femme';

		if ($valid) {
			include_once CHEMIN_MODELE.'membres.php';
			try {
                $form['id'] = $_SESSION['Utilisateur']['id'];
				$result = membre_modifier($form);
			} catch (PDOException $e) {
                                echo "Echec de la connexion à la base de données.\nErreur : " . $e->getMessage();
				include CHEMIN_VUE.'formulaire_modifier_profil.php';
				die();
			}
                        foreach ($form as $key => $value) {
                            $_SESSION['Utilisateur'][$key] = $value;
                        }
		}
            }
	}
        include CHEMIN_VUE.'formulaire_modifier_profil.php';
}