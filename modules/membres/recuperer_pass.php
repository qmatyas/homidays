<?php

// Vérification des droits d'accès de la page
if (utilisateur_est_connecte()) {

	// On affiche la page d'erreur comme quoi l'utilisateur est déjà connecté   
	include CHEMIN_VUE_GLOBALE.'erreur_deja_connecte.php';
} 

else {
	if (empty($_POST)) {
			include CHEMIN_VUE.'formulaire_recup_pass.php';
	} else {
	
		if (isset($_POST['email']) && !empty($_POST['email'])) {

			include CHEMIN_MODELE.'membres.php';

			$mot_de_passe = creation_pass();

	        $email = $_POST['email'];
	                            
	        $utilisateur = membre_email($email);

	        if (!$utilisateur) {
	        	echo 'Cet email n\'existe pas !';
	        	die();
	        }

	        $modifier = membre_modifier_passoubli($email, sha1($mot_de_passe));

	        if ($modifier != 0) {
	    		// Preparation du mail
				$message_mail = '<html><head></head><body>
				<p>Bonjour, <p>
				<p>Voici les informations nécessaires pour vous connecter à votre compte:</p>
				<p>votre nouveau mot de passe : '.$mot_de_passe.'</p>
				<p>L\'équipe d\'Homidays</p>
				</body></html>';
				
				$headers_mail  = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/html; charset=utf-8' . "\r\n" . 'From: "Homidays" <contact@homidays.com>' . "\r\n";

				// Envoi du mail
				$succes = mail($email, 'Mot de passe perdu sur <homidays.com>', $message_mail, $headers_mail);
	          	include CHEMIN_VUE . 'recup_pass_ok.php'; 
	        } else {
	            //Le mail n'a pas été expédié
	            echo 'Le mail n a pas été envoyé.';
	        }
	    }
	}
}