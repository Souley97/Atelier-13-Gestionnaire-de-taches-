<?php
require_once '../models/Tache.php';
$tacheModel = new Tache();

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

    // Créer une instance de la classe modèle Tache avec la connexion à la base de données

    // Appeler la méthode pour créer une nouvelle tâche en utilisant les données du formulaire
    $tacheId = $tacheModel->create($data);
    
    if ($tacheId ) {
        // Rediriger vers une page de succès ou afficher un message de succès
        header("Location: listeTaches");
        exit();
    } else {
        // Gérer le cas où la création de la tâche a échoué
        echo "Erreur lors de la création de la tâche.";
    }
} else {
    // Les données requises ne sont pas présentes dans $_POST, vous pouvez afficher un message d'erreur ou rediriger l'utilisateur vers une autre page
    echo "Tous les champs du formulaire sont obligatoires.";
}

// Vérifie si l'ID du tra$tranch à supprimer est défini dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($tacheModel->delete($id)) {
        // Rediriger vers la page principale avec un message de succès
        header('Location:listeTaches?Success');
        exit();
    } else {
        // Rediriger vers la page principale avec un message d'erreur
        header('Location: listeTaches?error=Une erreur s\'est produite lors de la suppression du {$tranch}.');
        exit();
    }

    // Inclure le fichier de configuration de la base de données et la classe tranc$tranche
}
?>
