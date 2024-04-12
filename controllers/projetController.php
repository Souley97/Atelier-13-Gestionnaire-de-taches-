<?php


// CREATE TABLE projects (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(255) NOT NULL,
//     description TEXT,
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
// );

// CREATE TABLE user_project (
//     user_id INT,
//     project_id INT,
//     PRIMARY KEY (user_id, project_id),
//     FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
//     FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE
// );
session_start();
// Récupérer les informations de l'utilisateur depuis la session
$user = $_SESSION['user'];
require_once '../models/Projet.php';
$projetModel = new Projet();


// Create
if (isset($_POST['addProjet'])) {
    // Récupérer l'identifiant de l'utilisateur depuis la session
    $user_id = $user['id']; // Supposons que 'id' est la clé de l'identifiant de l'utilisateur dans la session

    // Récupérer les données du formulaire
    $data = [
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'user_id' => $user_id
    ];

    // Appeler la méthode create() du modèle Projet pour ajouter le projet
    $projetId = $projetModel->create($data);

    if ($projetId) {
        header('Location: listeProjets?success');
        exit();
    } else {
        echo "Erreur lors de l'ajout de la projet";
    }
}

// modifcation  

if (isset($_POST['editProjet'])) {
    // Récupérer l'identifiant du projet depuis le formulaire
    $id = $_POST['projet_id'];

    // Récupérer les données du formulaire
    $data = [
        'name' => $_POST['name'],
        'description' => $_POST['description'],
    ];

    // Appeler la méthode updateProjet() du modèle Projet pour mettre à jour le projet
    $success = $projetModel->update($id, $data);

    if ($success) {
        header('Location: listeProjets?Modifier success');
        exit();
    } else {
        echo "Erreur lors de la mise à jour du projet";
    }
}

 // Vérifie si l'action de suppression est demandée
// if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    // Vérifie si l'ID du projet à supprimer est défini dans l'URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        if ($projetModel->delete($id)) {
            
            // Rediriger vers la page principale avec un message de succès
            header('Location: listeProjets?Suppression Success');
            exit();
        } else {
            // Rediriger vers la page principale avec un message d'erreur
            header('Location: listeProjets?error=Une erreur s\'est produite lors de la suppression du projet.');
            exit();
        }
    // }
}

