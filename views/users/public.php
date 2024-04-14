<?php

require_once '../../models/Projet.php';

$result = new Projet();
// Appeler la méthode readAll du contrôleur  pour récupérer toutes les projets
$projets = $result->readAll();

// Récupérer les informations de l'utilisateur depuis la session
$id = $_SESSION['user']['id']; // Supposons que 'id' est la clé de l'identifiant de l'utilisateur dans la session
$myProjets = $result->myProjet($id);

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $proje = $result->read($id);
}
