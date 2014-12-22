<?php

// Ne pas oublier d'inclure la librarie Form
include CHEMIN_LIB.'form.php';

// "formulaire_inscription" est l'ID unique du formulaire
$form_inscription = new Form('formulaire_inscription');

$form_inscription->method('POST');

$form_inscription->add('Text', 'nom')
                 ->label("Nom :");

$form_inscription->add('Text', 'prenom')
                 ->label("Prénom :");

$form_inscription->add('Checkbox', 'sexe')
                ->label("Sexe :");

$form_inscription->add('Date', 'date_naissance')
                 ->label("Date de naissance :");

$form_inscription->add('Text', 'profession')
                 ->label("Profession :");

$form_inscription->add('File', 'carte_ID')
                 ->filter_extensions('jpg', 'png', 'gif')
                 ->max_size(8192) // 8 Kb
                 ->label("Copie Carte ID :")
                 ->Required(false);

$form_inscription->add('Email', 'email')
                 ->label("Adresse email :");  

$form_inscription->add('Number', 'tel')
                 ->label("Numéro de téléphone :");               

$form_inscription->add('Text', 'rue')
                 ->label("Rue :");

$form_inscription->add('Number', 'code_postal')
                 ->label("Code postal :");   

$form_inscription->add('Text', 'ville')
                 ->label("Ville :");

$form_inscription->add('Text', 'pays')
                 ->label("Pays :");

$form_inscription->add('Text','pseudo')
                 ->label("Pseudo :");

$form_inscription->add('Password', 'mdp')
                 ->label("Mot de passe :");  

$form_inscription->add('Password', 'mdp_verif')
                 ->label("Mot de passe (vérification) :");     

$form_inscription->add('File', 'avatar')
                 ->filter_extensions('jpg', 'png', 'gif')
                 ->max_size(8192) // 8 Kb
                 ->label("Avatar :")
                 ->Required(false);

$form_inscription->add('Number', 'nb_adulte')
                 ->min(0)
                 ->label("Adultes :");  

$form_inscription->add('Number','nb_enfant')
                 ->min(0)
                 ->label("Enfants :"); 

$form_inscription->add('Textarea', 'interet')
                 ->label("Centres d'intérêt :");

$form_inscription->add('Submit', 'submit')
                 ->value("Suivant");

$form_inscription->add('Reset', 'reset')
                 ->value("Annuler");


// Pré-remplissage avec les valeurs précédemment entrées (s'il y en a)
$form_inscription->bound($_POST);

// Affichage du formulaire
include CHEMIN_VUE.'formulaire_inscription.php';
?>