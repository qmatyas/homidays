<?php


if (!isset($_POST['logement_id']) && !isset($_GET['id'])) {
    header('Location : /');
} else {
    $logement_id = isset($_POST['logement_id']) ? $_POST['logement_id'] : $_GET['id'];
    if (!isset($_FILES['photos']) || empty($_FILES['photos']['tmp_name'][0])) {
        include CHEMIN_VUE . 'images_logements.php';
        $erreur = 'Vous n\'avez pas envoyer de photos.';
    } else {
        $fichiers = $_FILES['photos'];
        $nombre = count($fichiers['tmp_name']);
        include CHEMIN_MODELE . 'images.php';
        $total = images_compter() + $nombre;
        if ($total < 3) {
            $erreur = 'Vous devez envoyer au moins 3 photos.';
        }
        if ($total > 6) {
            $erreur = 'Vous ne pouvez envoyer plus de 6 photos.';
        }
        if (isset($erreur)) {
            include CHEMIN_VUE . 'images_logements.php';
        }

        $envoye = true;
        $taille = true;
        $extension = true;
        $extensions = array(
            'image/jpeg'    => '.jpg',
            'image/png'     => '.png',
            'image/gif'     => '.gif'
        );
        $fichier = array();
        $date = time();
        for ($i = 0; $i < $nombre; $i++) {
            $envoye = is_uploaded_file($fichiers['tmp_name'][$i]);
            $taille = $fichiers['size'][$i] < 5242880;
            $extension = array_key_exists($fichiers['type'][$i], $extensions);
            if (!$envoye || !$taille || !$extension) {
                break;
            }
            $fichier[] = 'images/logement/logement_' . $logement_id . '_' . $date . $i . $extensions[$fichiers['type'][$i]];
        }
        if (!$envoye) {
            $erreur = 'Un problème est survenue durant l\'envoie des images.';
        }
        if (!$taille) {
            $erreur = 'Vos images ne doivent pas dépasser 5 Mo chacune.';
        }
        if (!$extension) {
            $erreur = 'Vous ne pouvez envoyer que des fichiers images.';
        }

        if (isset($erreur)) {
            include CHEMIN_VUE . 'images_logements.php';
        } else {
            for ($i = 0; $i < $nombre; $i++) {
                move_uploaded_file($fichiers['tmp_name'][$i], $fichier[$i]);
                images_ajouter($logement_id, $fichier[$i]);
            }
            include CHEMIN_VUE . 'images_succes.php';
        }
    }
}