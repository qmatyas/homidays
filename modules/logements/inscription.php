<?php

// Vérification des droits d'accès de la page
if (utilisateur_est_connecte()) {

	// On affiche la page d'erreur comme quoi l'utilisateur est déjà connecté   
	include CHEMIN_VUE_GLOBALE.'erreur_deja_connecte.php';
	
}

else {

// Ne pas oublier d'inclure la librarie Form
include CHEMIN_LIB.'form.php';

// "formulaire_inscription_offre" est l'ID unique du formulaire
$form_inscription_offre = new Form('formulaire_inscription_offre');

$form_inscription_offre->method('POST');

$form_inscription_offre->add('Text', 'nom')
                 ->label("Nom");

$form_inscription_offre->add('Text', 'rue')
                 ->label("Rue");

$form_inscription_offre->add('Text', 'code_postal')
                 ->label("Code postale");

$form_inscription_offre->add('Text', 'ville')
                 ->label("Ville");

$form_inscription_offre->add('Text', 'pays')
                 ->label("Pays");

$form_inscription_offre->add('File', 'just_log')
                 ->filter_extensions('jpg', 'png', 'gif')
                 ->max_size(8192) // 8 Kb
                 ->label("Justicatif de logement")
                 ->Required(false);

$form_inscription_offre->add('File', 'photo')
                 ->filter_extensions('jpg', 'png', 'gif')
                 //->max_size(8192) // 8 Kb
                 ->label("Photo(s) du logement")
                 ->Required(false);

$form_inscription_offre->add('Text', 'type')
                 ->label("Type");

$form_inscription_offre->add('Text', 'superficie')
                 ->label("Superficie");

$form_inscription_offre->add('Text', 'nb_piece')
                 ->label("Nombre de pièce");

$form_inscription_offre->add('Text', 'nb_chambre')
                 ->label("Nombre de chambre");

$form_inscription_offre->add('Text', 'nb_salle_bain')
                 ->label("Nombre de salle de bain");

$form_inscription_offre->add('Textarea', 'description')
                 ->label("Description");

$form_inscription_offre->add('Textarea', 'point_fort')
                 ->label("Point(s) fort(s)");

$form_inscription_offre->add('Radio', 'activites')
                       ->choices(array(
                                'musee' => 'Musée',
                                'sport' => 'Sport',
                                'parc_attraction' => 'Parc d\'attraction',
                                'shopping' => 'Shopping'
                                ))
                        ->add('Text', 'autre')
                        ->label("Autre");

$form_inscription_offre->add('Textarea', 'restauration')
                 ->label("Restauration");

$form_inscription_offre->add('Radio', 'transports')
                       ->choices(array(
                                'metro' => 'Métro',
                                'velib' => 'Velib',
                                'bus' => 'Bus',
                                'tramway' => 'Tramway'
                                ))
                        ->add('Text', 'autre')
                        ->label("Autre");
            
$form_inscription_offre->add('Radio', 'environnements')
                       ->choices(array(
                                'lac' => 'Lac',
                                'foret' => 'Forêt',
                                'campagne' => 'Campagne',
                                'mer' => 'Mer',
                                'ville' => 'Ville'
                                ))
                        ->add('Text', 'autre')
                        ->label("Autre");

$form_inscription_offre->add('Radio', 'contraintes')
                       ->choices(array(
                                'pas_fumer' => 'Ne pas fumer',
                                'pas_bruit' => 'Pas de bruit après 23h',
                                'pas_enfant' => 'Enfants refusés',
                                'pas_animaux' => 'Animaux refusés'
                                ))
                        ->add('Text', 'autre')
                        ->label("Autre");

$form_inscription_offre->add('Radio', 'services')
                       ->choices(array(
                                'fermer' => 'Fermer la porte à double tour en sortant',
                                'garder_animaux' => 'Garder les animaux domestiques',
                                'arroser_plantes' => 'Arroser les plantes',
                                'discuter_voisine' => 'Discuter avec la vieille voisine',
                                'menage' => 'Faire le ménage avant de quitter le logement'
                                ))
                        ->add('Text', 'autre')
                        ->label("Autre");

$form_inscription_offre->add('Radio', 'options')
                       ->choices(array(
                                'wifi' => 'Accès Wifi',
                                'voiture' => 'Accès à la voiture',
                                'jardin_terrase' => 'Jardin / Terrase',
                                'piscine' => 'Piscine privée',
                                'equipement_sportif' => 'Equipement sportif',
                                'acces_handicape' => 'Accès handicapé'
                                ))
                        ->add('Text', 'autre')
                        ->label("Autre");

$form_inscription_offre->add('Submit', 'submit')
                 ->value("J'enregistre mon offre");

// Pré-remplissage avec les valeurs précédemment entrées (s'il y en a)
$form_inscription_offre->bound($_POST);

// Création d'un tableau des erreurs
$erreurs_inscription_offre = array();


// Tentative d'ajout du membre dans la base de donnees
list($nom, $rue, $code_postal, $ville, $pays, $just_log, $photo, $type, $supercicie, $nb_piece, $nb_chambre, $nb_salle, $description, $point_fort, $activites, $restauration, $transports, $environnements, $contraintes, $services, $options) =
	$form_inscription->get_cleaned_data('nom', 'rue', 'code_postal', 'ville', 'pays', 'just_log', 'photo', 'type', 'superficie', 'nb_piece', 'nb_chambre', 'nb_salle', 'description', 'point_fort', 'activites', 'restauration', 'transports', 'environnements', 'contraintes', 'services', 'options');

// On veut utiliser le modele de l'inscription (~/modeles/inscription.php)
include CHEMIN_MODELE.'inscription.php';

// ajouter_membre_dans_bdd() est défini dans ~/modeles/inscription.php
$id_utilisateur = ajouter_membre_dans_bdd($nom, $prenom, $sexe, $date_naissance, $profession, $langue, $email, $tel, $rue, $code_postal, $ville, $pays, $pseudo, sha1($pass), $hash_validation, $nb_adulte, $nb_enfant, $interet, $animaux, $fumeur);
}
