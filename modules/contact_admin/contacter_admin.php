<?php

if (empty($_POST)) {
            include CHEMIN_VUE.'formulaire_contact.php';
    } 

    else {
        if(isset($_POST) && isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['message'])){
            if(!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['message'])){
                //Exécution si le formulaire est posté et si les champs sont remplis

                $destinataire = "homidays@mail.fr";
                $sujet = "Demande de contact";

                $message = "nom : ".$_POST['nom']."\r\n";
                $message = "Adresse email : ".$_POST['email']."\r\n";
                $message = "Message : ".$_POST['message']."\r\n";

                $entete = 'From: '.$_POST['email']."\r\n".
                'Reply-To: '.$_POST['email']."\r\n".
                'X-Mailer: PHP/'.phpversion();

                if (mail($destinataire,$sujet,$message,$entete)){
                    //Le mail a été expédié
                    include CHEMIN_VUE.'envoi_ok.php'; 
                } else {
                    //Le mail n'a pas été expédié
                    include CHEMIN_VUE.'envoi_echec.php';
                }
            }
        else {
                //Le mail n'a pas été expédié
                include CHEMIN_VUE.'envoi_echec.php';
            }
        }
    }