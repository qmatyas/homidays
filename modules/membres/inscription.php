<?php

// Vérification des droits d'accès de la page
if (utilisateur_est_connecte()) {
    // On affiche la page d'erreur comme quoi l'utilisateur est déjà connecté   
    include CHEMIN_VUE_GLOBALE.'erreur_deja_connecte.php';  
} 

else {
    if (empty($_POST)) {
        include CHEMIN_VUE.'formulaire_inscription.php';
    }
    
    else  {
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
    valid('pass', 'mot de passe');
    if($_POST['pass'] !== $_POST['pass2']) {
            $valid = false;
    }
    if(!empty($_FILES)){
        $img = $_FILES['img'];
        $ext = strtolower(substr($img['name'],-3));
        $allow_ext = array('jpg', 'png', 'gif');
        if(in_array($ext,$allow_ext)) {
            $form['avatar'] = "images/avatar/".$form['pseudo'].'.'.$ext;
            move_uploaded_file($img['tmp_name'], $form['avatar']);
        }
        else{
            $valid = false;
            $erreur_avatar = 'Votre fichier n\'est pas une image.';
        }
    } else {
        $valid = false;
        $erreur_avatar = 'Vous devez envoyer une image.';
    }
    valid('nb_adulte', 'adultes');
    valid('nb_enfant', 'enfants');
    valid('interet', 'intérêt');
    $form['animaux'] = isset($_POST['animaux']) && $_POST['animaux'] === 'on';
    $form['fumeur'] = isset($_POST['fumeur']) && $_POST['fumeur'] === 'on';
    $form['sexe'] = $_POST['sexe'] === 'femme';

    if ($valid) {
			$form['pass'] = sha1($form['pass']);
			$form['hash_validation'] = md5(uniqid(rand(), true));
			include_once CHEMIN_MODELE.'membres.php';
			try {
				$result = membre_ajouter($form);
			} catch (PDOException $e) {
				if ($e->getCode == 23000) {
					$erreur['pseudo'] = 'Utilisateur déjà existant.';
				} else {
					echo "Echec de la connexion à la base de données.\nErreur : " . $e->getMessage();
				}
				include CHEMIN_VUE.'formulaire_inscription.php';
				die();
			}
			if ($result) {
				// Preparation du mail
				$message_mail = '<html><head></head><body>
				<p>Merci de vous être inscrit sur "Homidays" !</p>
				<p>Veuillez cliquer sur <a href="localhost/'.$_SERVER['PHP_SELF'].'?module=membres&amp;action=valider_compte&amp;hash='.$form['hash_validation'].'">ce lien</a> pour activer votre compte !</p>
				</body></html>';

				$headers_mail  = 'MIME-Version: 1.0'                           ."\r\n";
				$headers_mail .= 'Content-type: text/html; charset=utf-8'      ."\r\n";
				$headers_mail .= 'From: "Homidays" <contact@homidays.com>'     ."\r\n";

				// Envoi du mail
				mail($form['email'], 'Inscription sur <homidays.com>', $message_mail, $headers_mail);
				include CHEMIN_VUE.'inscription_effectuee.php';
			} else {
				echo 'Un problème';
				include CHEMIN_VUE.'formulaire_inscription.php';
            }

    }
    
}

}