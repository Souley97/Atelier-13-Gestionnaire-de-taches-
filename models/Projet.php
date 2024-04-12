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
require_once 'Database.php';
require_once 'ICRUD.php';

class Projet implements ICRUD
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getDb();
    }
  
    public function create($data)
    {
        try {
            $query = "INSERT INTO projects (name, description) VALUES (:name, :description)";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':name', $data['name'], PDO::PARAM_STR);
            $statement->bindParam(':description', $data['description'], PDO::PARAM_STR);
            $statement->execute();
    
            $project_id = $this->db->lastInsertId();
    
            // Insérer une entrée dans la table de liaison user_project
            $query = "INSERT INTO user_project (user_id, project_id) VALUES (:user_id, :project_id)";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':user_id', $data['user_id'], PDO::PARAM_INT);
            $statement->bindParam(':project_id', $project_id, PDO::PARAM_INT);
            $statement->execute();
    
            return $project_id;
        } catch (PDOException $e) {
            echo "Erreur lors de la création du projet : " . $e->getMessage();
            return false;
        }
    }

    // public function create($data)
    // {
    //     try {
    //         $query = "INSERT INTO projects (name, description) VALUES (:name, :description)";
    //         $statement = $this->db->prepare($query);
    //         $statement->bindParam(':name', $data['name'], PDO::PARAM_STR);
    //         $statement->bindParam(':description', $data['description'], PDO::PARAM_STR);
    //         $statement->execute();
    
    //         $project_id = $this->db->lastInsertId();
    
    //         // Insérer une entrée dans la table de liaison user_project
    //         $query = "INSERT INTO user_project (user_id, project_id) VALUES (:user_id, :project_id)";
    //         $statement = $this->db->prepare($query);
    //         $statement->bindParam(':user_id', $data['user_id'], PDO::PARAM_INT);
    //         $statement->bindParam(':project_id', $project_id, PDO::PARAM_INT);
    //         $statement->execute();
    
    //         return $project_id;
    //     } catch (PDOException $e) {
    //         echo "Erreur lors de la création du projet : " . $e->getMessage();
    //         return false;
    //     }
    // }
    

    // Méthode pour lire les détails d'un élément
    public function read($id)
    {
        //
    }
    // Methods pour lire tous les elements
    public function readAll()
    {
        try {
            // Préparer la requête SQL avec des jointures
            // count(id) pour la list
            $query = "SELECT *, users.username AS user_name, projects.name AS project_name , projects.created_at AS date_projet
            FROM user_project
            INNER JOIN users ON user_project.user_id = users.id
            INNER JOIN projects ON user_project.project_id = projects.id;
             ";

            // Exécuter la requête SQL
            $statement = $this->db->query($query);

            // Récupérer toutes les lignes de résultats
            $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

            // Retourner le tableau des tâches
            return $tasks;
        } catch (PDOException $e) {
            // Gérer les erreurs de requête SQL
            echo "Erreur lors de la lecture des tâches : " . $e->getMessage();
            return false;
        }
    }
    
    // Méthode pour mettre à jour un élément existant
    public function update($id, $data)
    {
        //
    }

    // Méthode pour supprimer un élément
    public function delete($id)
    {
    }
}
