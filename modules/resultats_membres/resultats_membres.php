<?php

if (utilisateur_est_connecte()) {
    include CHEMIN_MODELE.'resultats.php';
    $membre = recup_membre($_GET['id']);
    include CHEMIN_VUE.'afficher_resultats_membres.php';
} else {
    echo 'casse-toi connard';
}