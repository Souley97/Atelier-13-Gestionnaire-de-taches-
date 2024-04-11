<?php
require_once '../models/Tache.php';

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
    $tacheModel = new Tache();

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
?>
