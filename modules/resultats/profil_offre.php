<?php

if (utilisateur_est_connecte()) {
    include CHEMIN_MODELE.'resultats.php';
    $offre = recup_offre($_GET['id']);
    include CHEMIN_VUE.'afficher_profil_offre.php';
} else {
    echo 'Vous ne pouvez pas accéder à cette page, car vous n\êtes pas connecté(e)!';
}