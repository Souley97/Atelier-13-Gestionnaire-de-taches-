<?php 
require_once '../../models/Tache.php';

$result = new Tache();
// Appeler la méthode readAll du contrôleur de tâches pour récupérer toutes les tâches
$taches = $result->readAll();
$todos = $result->readStatusTodo();
$progress = $result->readStatusProgress();
$completes = $result->readStatusCompleted();

$statuss = $result->readAllStatus();
$projects = $result->readAllProjet();
$users = $result->readAllUSer();
