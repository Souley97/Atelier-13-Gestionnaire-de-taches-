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
$tacheModel = new Projet();
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
    $projetId = $tacheModel->create($data);
    
    if ($projetId) {
            header('Location: listeProjets?success');
            exit();
            } else {
                echo "Erreur lors de l'ajout de la projet";
   
         } 
}
