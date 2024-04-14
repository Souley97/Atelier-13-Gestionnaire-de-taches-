<?php
session_start();

require_once '../models/Tache.php';
$tacheModel = new Tache();
$user = $_SESSION['user'];

$modifier_by = $user['id']; // Supposons que 'id' est la clé de l'identifiant de l'utilisateur dans la session

if (isset($_POST['addTache'])) {
    // Les données du formulaire ont été soumises, vous pouvez les récupérer et les traiter ici
    $data = array(
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'priority' => $_POST['priority'],
        'due_date' => $_POST['due_date'],
        'project_id' => $_POST['project_id'],
        'status_id' => $_POST['status_id'],
        'assigned_to' => $_POST['assigned_to']
    );
    $id = $_GET['id'];

    // Créer une instance de la classe modèle Tache avec la connexion à la base de données

    // Appeler la méthode pour créer une nouvelle tâche en utilisant les données du formulaire
    $tacheId = $tacheModel->create($data);
    
    if ($tacheId ) {
        // Rediriger vers une page de succès ou afficher un message de succès
        header("Location: detailProjet?id=" . $data['project_id']);
        exit();
    } else {
        // Gérer le cas où la création de la tâche a échoué
        echo "Erreur lors de la création de la tâche.";
    }
} else {
    // Les données requises ne sont pas présentes dans $_POST, vous pouvez afficher un message d'erreur ou rediriger l'utilisateur vers une autre page
    echo "Tous les champs du formulaire sont obligatoires.";
}


// modification status pour les taches
if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] === 'update_status' && isset($_GET['status'])) {
    $tache_id = $_GET['id'];
    $status = $_GET['status'];
     // Récupérer l'ID du projet à partir des données de la tâche
     $project_id = $tacheModel->getProjectId($tache_id);
    // Déterminez l'ID du statut en fonction du statut spécifié
    if ($status === 'completed') {
        $status_id = 3; // Supposons que l'ID du statut "completed" est 3
    } elseif ($status === 'in_progress') {
        $status_id = 2; // Supposons que l'ID du statut "in_progress" est 2
    } elseif ($status === 'todo') {
        $status_id = 1; // Supposons que l'ID du statut "todo" est 1
    }

    // Mettre à jour le statut de la tâche
    if ($tacheModel->updateStatus($tache_id, $status_id)) {
        // Rediriger vers la page de détail du projet avec un message de succès
        header("Location: detailProjet?id=" . $project_id . '&success=Le statut de la tâche a été mis à jour avec succès');
        exit();
    } else {
        // Gérer l'erreur si la mise à jour a échoué
        header("Location: detailProjet?id=" . $project_id . '&error=Une erreur s\'est produite lors de la mise à jour du statut de la tâche');
        exit();
    }
}


// modifcation  

// Assurez-vous que vous avez récupéré l'ID de l'utilisateur qui effectue la modification, par exemple à partir de la session

// Vérifiez si le formulaire de modification de tâche a été soumis
if (isset($_POST['editTache'])) {
    // Récupérer l'identifiant de la tâche depuis le formulaire
    $id = $_POST['id'];

    // Récupérer les données du formulaire
    $data = [
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'priority' => $_POST['priority'],
        'due_date' => $_POST['due_date'],
        'assigned_to' => $_POST['assigned_to']
    ];

    // Appeler la méthode updateTache() du modèle Tache pour mettre à jour la tâche
    $success = $tacheModel->updateTache($id, $data, $modifier_by);

    if ($success) {
        // Rediriger vers la page de détail de la tâche avec un message de succès
        header("Location: detailTache?id=$id&success=La tâche a été mise à jour avec succès");
        exit();
    } else {
        // Gérer l'erreur si la mise à jour a échoué
        echo "Erreur lors de la mise à jour de la tâche";
    }
}

// Le reste de votre logique de contrôleur...

// Vérifie si l'ID du tra$tranch à supprimer est défini dans l'URL
if (isset($_GET['id'])) {
    $tache_id = $_GET['id'];
    $project_id = $tacheModel->getProjectId($tache_id);

    if ($tacheModel->delete($tache_id)) {
        // Rediriger vers la page principale avec un message de succès
        header("Location: detailProjet?id=" . $project_id . '&success=Le statut de la tâche a été supprimee avec succès');
        exit();
    } else {
        // Rediriger vers la page principale avec un message d'erreur
        header("Location: detailProjet?id=" . $project_id . '&errue=s');
        exit();
    }

    // Inclure le fichier de configuration de la base de données et la classe tranc$tranche
}
?>
