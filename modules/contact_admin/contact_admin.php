<?php

// Ne pas oublier d'inclure la librarie Form
include CHEMIN_LIB.'form.php';

// "formulaire_contact" est l'ID unique du formulaire
$form_contact = new Form('formulaire_contact');

$form_contact->method('POST');

$form_contact->add('Text', 'nom')
                 ->label("Nom");

$form_contact->add('Email', 'email')
                 ->label("Adresse email");

$form_contact->add('Text', 'sujet')
                 ->label("Sujet");                

$form_contact->add('Textarea', 'message')
                 ->label("Message");

$form_contact->add('Submit', 'submit')
                 ->value("Envoyer mon message !");

// Pré-remplissage avec les valeurs précédemment entrées (s'il y en a)
$form_contact->bound($_POST);

//Si le formulaire est envoyé alors on fait les traitements //
if (isset($_POST['submit'])){
    
    // Récupération des valeurs des champs du formulaire //
    if (get_magic_quotes_gpc()) {
        $nom = stripslashes($_POST['nom']); 
        $expediteur = stripslashes($_POST['email']); 
        $sujet = stripslashes($_POST['sujet']); 
        $message = stripslashes($_POST['message']); 
    } 
    
    else {  
        $nom = $_POST['nom']; 
        $expediteur = $_POST['email']; 
        $sujet = $_POST['sujet']; 
        $message = $_POST['message'];  
    }
    
    // Expression régulière permettant de vérifier si le format d'une adresse e-mail est correct //
    $regex_mail = '/^[-+.\w]{1,64}@[-.\w]{1,64}\.[-.\w]{2,6}$/i';
    
     //Expression régulière permettant de vérifier qu'aucun en-tête n'est inséré dans nos champs //
    $regex_head = '/[\n\r]/';
 
    // Si le formulaire n'est pas posté de notre site on renvoie vers la page d'accueil //
    if($_SERVER['HTTP_REFERER'] != 'http://www.homidays.com/contact_admin.php') {
      header('Location: http://www.homidays.com/');
    }
    
    // On vérifie que tous les champs sont remplis //
    elseif (empty($nom) || empty($expediteur) || empty($sujet) || empty($message)){
      $erreur_contact = 'Tous les champs doivent être renseignés';
    }
    
    // On vérifie que le format de l'e-mail est correct //
    elseif (!preg_match($regex_mail, $expediteur)){
      $erreur_contact = 'L\'adresse '.$expediteur.' n\'est pas valide';
    }
    
    // On vérifie qu'il n'y a aucun header dans les champs //
    elseif (preg_match($regex_head, $expediteur) 
            || preg_match($regex_head, $nom) 
            || preg_match($regex_head, $sujet)){
        $erreur_contact = 'En-têtes interdites dans les champs du formulaire';
    }
    
    // Si aucun problème et aucun cookie créé, on construit le message et on envoie l'e-mail //
    elseif (!isset($_COOKIE['sent'])){
    
    // Preparation du mail
    $message_mail = '<html><head></head><body>
	<p>Bonjour,</p>
	<p>Ce mail a été envoyé depuis homidays.com par '.$nom.'</p>
	<p>Voici le message qui vous est adressé :</p>
	<p>'.$message.'</p>
	</body></html>';
 
    $headers_mail  = 'MIME-Version: 1.0'                           ."\r\n";
    $headers_mail .= 'Content-type: text/html; charset=utf-8'      ."\r\n";
    $headers_mail .= 'From: '.$nom.' <'.$expediteur.'>'            ."\r\n";
 
    // Function mail()
    if(mail('homidays@gmail.com', 'Question sur <homidays.com>' , $message_mail, $headers_mail)){
        
            $erreur_contact = 'E-mail envoyé avec succès';
 
            // On créé un cookie de courte durée (ici 120 secondes) pour éviter de renvoyer un mail en rafraichissant la page //
            setcookie("sent", "1", time() + 120);
 
            // On détruit la variable $_POST //
            unset($_POST);
    }
    else {
            $erreur_contact = 'Erreur d\'envoi de l\'e-mail';
        }
 
    }
    
    // Cas où le cookie est créé et que la page est rafraichie, on détruit la variable $_POST //
    else{
        unset($_POST);
    }
}
    
    

