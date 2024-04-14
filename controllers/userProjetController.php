<?php
require_once '../models/Projet.php';
require_once '../models/UserProjet.php';
$projetModel = new Projet();
$userModel = new UserProjet();


// Vérifier si le formulaire a été soumis
if (isset($_POST['invite_user'])) {
    // Récupérer les données du formulaire
    $user_id = $_POST['user_id'];
    $project_id = $_POST['project_id'];
    $id = $_GET['id'];

    // Créer une instance du modèle d'utilisateur

    // Appeler la méthode pour inviter l'utilisateur au projet
    if ($userModel->inviteUserToProject($user_id, $project_id)) {
        // L'invitation a réussi, rediriger vers une page de succès ou afficher un message de succès
        header("Location: detailProjet?id=" . $project_id . '&success=Le statut de la tâche a été supprimee avec succès');
        exit;
    } else {
        // L'invitation a échoué, rediriger vers une page d'erreur ou afficher un message d'erreur
        header("Location: dashboard?error=message");
        exit;
    }
    
}