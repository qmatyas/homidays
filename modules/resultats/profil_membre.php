<?php

if (utilisateur_est_connecte()) {
    include CHEMIN_MODELE.'resultats.php';
    $membre = recup_membre($_GET['id']);
    include CHEMIN_VUE.'afficher_profil_membre.php';
} else {
    echo 'Vous ne pouvez pas accéder à cette page, car vous n\êtes pas connecté(e)!';
}