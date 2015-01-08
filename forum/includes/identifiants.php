<?php
try
{
$db = new PDO('mysql:host=localhost;dbname=bdd', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
