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

    // Méthode pour lire les détails d'un élément
    public function read($id)
    {
        try {
            // Préparation de la requête SQL pour récupérer les détails du projet
            $query = "SELECT * FROM projects WHERE id = :id";
            $statement = $this->db->prepare($query);
            
            // Liaison des valeurs des paramètres
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            
            // Exécution de la requête
            $statement->execute();
            
            // Récupération du projet
            $projet = $statement->fetch(PDO::FETCH_ASSOC);
            
            // Retourner le projet récupéré
            return $projet;
        } catch (PDOException $e) {
            // En cas d'erreur, afficher un message d'erreur ou enregistrez-le dans un journal, selon vos besoins
            echo "Erreur lors de la récupération du projet : " . $e->getMessage();
            return false;
        }
    }
    
    public function myProjet($id)
{
    try {
        // Préparation de la requête SQL avec une jointure pour récupérer les projets associés à l'utilisateur
        $query = "SELECT projects.id, projects.name, projects.description
                  FROM user_project
                  INNER JOIN projects ON user_project.project_id = projects.id
                  WHERE user_project.user_id = :user_id";
        
        // Préparation de la requête
        $statement = $this->db->prepare($query);
        
        // Liaison des valeurs des paramètres
        $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
        
        // Exécution de la requête
        $statement->execute();
        
        // Récupération des résultats
        $projects = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        // Retourne les projets associés à l'utilisateur
        return $projects;
    } catch (PDOException $e) {
        // En cas d'erreur, affichez un message d'erreur ou enregistrez-le dans un journal, selon vos besoins
        echo "Erreur lors de la récupération des projets de l'utilisateur : " . $e->getMessage();
        return false;
    }
}

    // Methods pour lire tous les elements
    public function readAll()
    {
        try {
            // Préparer la requête SQL avec des jointures
            // count(id) pour la list
            $query = "SELECT *, user_project.id AS idProjetUser, users.username AS user_name, projects.name AS project_name , projects.created_at AS date_projet 
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
    try { 
        $query = "UPDATE projects SET  name = :name, description = :description WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':name', $data['name'], PDO::PARAM_STR);
        $statement->bindParam(':description', $data['description'], PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        return true;             
    } catch (PDOException $e) {
        echo "Erreur lors de la mise à jour du projet : " . $e->getMessage();
        return false;
    }
}


    // Méthode pour supprimer un élément
    // public function delete($id) {
    //     try {
    //         // Préparez la requête SQL de suppression
    //         $query = "DELETE FROM user_project WHERE id = :id";
            
    //         // Préparez la requête SQL
    //         $statement = $this->db->prepare($query);
            
    //         // Liez la valeur du paramètre de requête à l'ID de la tâche à supprimer
    //         $statement->bindParam(':id', $id);
            
    //         // Exécutez la requête SQL
    //         $statement->execute();
    
    //         // Retournez true si la suppression a réussi
    //         return true;
    //     } catch (PDOException $e) {
    //         // Gérez les erreurs de requête SQL
    //         echo "Erreur lors de la suppression de la tâche : " . $e->getMessage();
    //         return false;
    //     }
    // }
    public function delete($id) {
        try {
            // Préparez la requête SQL de suppression
            $query = "DELETE FROM projects WHERE id = :id";
            
            // Préparez la requête SQL
            $statement = $this->db->prepare($query);
            
            // Liez la valeur du paramètre de requête à l'ID du projet à supprimer
            $statement->bindParam(':id', $id);
            
            // Exécutez la requête SQL
            $statement->execute();
    
            // Vérifiez combien de lignes ont été affectées
            $rowCount = $statement->rowCount();
            
            if ($rowCount > 0) {
                // La suppression a réussi
                echo "Suppression réussie. Nombre de lignes supprimées : " . $rowCount;
                return true;
            } else {
                // Aucune ligne n'a été supprimée
                echo "Aucune ligne n'a été supprimée. Vérifiez l'ID du projet.";
                return false;
            }
        } catch (PDOException $e) {
            // Gestion des erreurs PDO
            echo "Erreur PDO : " . $e->getMessage();
            return false;
        }
    }
    
    
}
