<?php
require_once '../models/Tache.php';
$tacheModel = new Tache();
$modifier_by = $_SESSION['user_id']; // Assurez-vous de remplacer 'user_id' par la clé correcte de l'ID de l'utilisateur dans votre session

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

if (isset($_POST['editTache'])) {
    // Récupérer l'identifiant du projet depuis le formulaire
    $id = $_POST['id'];

    // Récupérer les données du formulaire
    $data = [
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'priority' => $_POST['priority'],
        'project_id' => $_POST['project_id'],
        'due_date' => $_POST['due_date'],
        // 'modifier_by' => $_POST['modifier_by'],
        'assigned_to' => $_POST['assigned_to']
    ];

    // Appeler la méthode updateTache() du modèle Tache pour mettre à jour le Tache
    $project_id = $tacheModel->update($id, $data);

    if ($project_id) {
        header("Location: detailProjet?id=" .$data['project_id'] . '&success=Le statut de la tâche a été mis à jour avec succès');
        exit();
    } else {
        echo "Erreur lors de la mise à jour du Tache";
    }
}
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
