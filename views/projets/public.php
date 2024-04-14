<?php
require_once '../../models/Tache.php';
// Appele les les method dans la class Tache
$result = new Tache();

$statuss = $result->readAllStatus();
$projects = $result->readAllProjet();
$users = $result->readAllUSer();

// Appele les les method dans la class Tache

require_once '../../models/Projet.php';

$result = new Projet();
$projet_ids = $_GET['id'];

// Appeler la méthode readAll du contrôleur de tâches pour récupérer toutes les tâches
$todos = $result->readStatusTodo($projet_ids);
$progress = $result->readStatusProgress($projet_ids);
$completes = $result->readStatusCompleted($projet_ids);
// Appeler la méthode readAll du contrôleur  pour récupérer toutes les projets
$projets = $result->readAll();
$user_id = $_SESSION['user']['id']; // Supposons que 'id' est la clé de l'identifiant de l'utilisateur dans la session


// Récupérer les informations de l'utilisateur depuis la session
$myProjets = $result->myProjet($user_id);
$taches = $result->tachesProjet($projet_ids);
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $proje = $result->read($id);
}


require_once '../../models/UserProjet.php';
// Vérifier si l'ID du projet est passé en tant que paramètre GET ou POST

$project_id = $_GET['id'];

$result = new UserProjet();

$pusers = $result->getUserByProjectId($project_id);
