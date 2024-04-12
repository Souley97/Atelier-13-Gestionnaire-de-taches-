<?php 
require_once '../../models/Projet.php';

$result = new Projet();
// Appeler la méthode readAll du contrôleur  pour récupérer toutes les projets
$projets = $result->readAll();
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
$proje = $result->read($id);
}