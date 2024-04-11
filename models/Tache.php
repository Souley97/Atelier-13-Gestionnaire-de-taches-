<?php   
// class Tache implement ICRUD interface 
/** id INT AUTO_INCREMENT PRIMARY KEY,
  *  project_id INT,
   * name VARCHAR(255) NOT NULL,
   * description TEXT,
   * due_date DATE,
   * priority ENUM('low', 'medium', 'high') DEFAULT 'medium',
   * status_id INT,
   * assigned_to INT,
   * created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   * FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE,
   * FOREIGN KEY (status_id) REFERENCES status(id),
   * FOREIGN KEY (assigned_to) REFERENCES users(id) ON DELETE SET NULL
**/
require_once 'Database.php';
require_once 'ICRUD.php';

class Tache implements ICRUD {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getDb();
    }
    public function readAll() {
        try {
            // Préparer la requête SQL avec des jointures
            $query = "
                SELECT tasks.*, projects.name AS project_name, status.status_name AS status_name, users.username AS assigned_to_username
                FROM tasks
                LEFT JOIN projects ON tasks.project_id = projects.id
                LEFT JOIN status ON tasks.status_id = status.id
                LEFT JOIN users ON tasks.assigned_to = users.id
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
    public function create($data) {
        // TODO: Implémenter la logique pour créer une nouvelle tâche dans la base de données
    }

        // TODO: Implémenter la logique pour lire les détails d'une tâche spécifique dans la base de données
    public function read($id) {
        try {
            // Préparer la requête SQL paramétrée pour sélectionner la tâche avec l'ID spécifié
            $query = " SELECT tasks.*, projects.name AS project_name, status.status_name AS status_name, users.username AS assigned_to_username
            FROM tasks 
            LEFT JOIN projects ON tasks.project_id = projects.id
            LEFT JOIN status ON tasks.status_id = status.id
            LEFT JOIN users ON tasks.assigned_to = users.id WHERE tasks.id = :id";
            // Préparer la requête SQL
            $statement = $this->db->prepare($query);
    
            // Liaison des valeurs des paramètres
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
    
            // Exécuter la requête SQL
            $statement->execute();
    
            // Récupérer la tâche correspondant à l'ID spécifié
            $task = $statement->fetch(PDO::FETCH_ASSOC);
    
            // Retourner la tâche
            return $task;
        } catch (PDOException $e) {
            // Gérer les erreurs de requête SQL
            echo "Erreur lors de la lecture des détails de la tâche : " . $e->getMessage();
            return false;
        }
    }
    public function readStatusTodo() {
        try {
            // Préparer la requête SQL paramétrée pour sélectionner la tâche avec l'ID spécifié
            $query = " SELECT tasks.*, projects.name AS project_name, status.status_name AS status_name, users.username AS assigned_to_username
            FROM tasks 
            LEFT JOIN projects ON tasks.project_id = projects.id
            LEFT JOIN status ON tasks.status_id = status.id
            LEFT JOIN users ON tasks.assigned_to = users.id  WHERE status.status_name = 'todo'";
            // Préparer la requête SQL
            $statement = $this->db->prepare($query);
    
            // Liaison des valeurs des paramètres
    
            // Exécuter la requête SQL
            $statement->execute();
    
            // Récupérer la tâche correspondant à l'ID spécifié
            $task = $statement->fetchAll(PDO::FETCH_ASSOC);
    
            // Retourner la tâche
            return $task;
        } catch (PDOException $e) {
            // Gérer les erreurs de requête SQL
            echo "Erreur lors de la lecture des détails de la tâche : " . $e->getMessage();
            return false;
        }
    }

    public function readStatusProgress() {
        try {
            // Préparer la requête SQL paramétrée pour sélectionner la tâche avec l'ID spécifié
            $query = " SELECT tasks.*, projects.name AS project_name, status.status_name AS status_name, users.username AS assigned_to_username
            FROM tasks 
            LEFT JOIN projects ON tasks.project_id = projects.id
            LEFT JOIN status ON tasks.status_id = status.id
            LEFT JOIN users ON tasks.assigned_to = users.id  WHERE status.status_name = 'in_progress'";
            // Préparer la requête SQL
            $statement = $this->db->prepare($query);
    
            // Liaison des valeurs des paramètres
    
            // Exécuter la requête SQL
            $statement->execute();
    
            // Récupérer la tâche correspondant à l'ID spécifié
            $task = $statement->fetchAll(PDO::FETCH_ASSOC);
    
            // Retourner la tâche
            return $task;
        } catch (PDOException $e) {
            // Gérer les erreurs de requête SQL
            echo "Erreur lors de la lecture des détails de la tâche : " . $e->getMessage();
            return false;
        }
    }
    public function readStatusCompleted() {
        try {
            // Préparer la requête SQL paramétrée pour sélectionner la tâche avec l'ID spécifié
            $query = " SELECT tasks.*, projects.name AS project_name, status.status_name AS status_name, users.username AS assigned_to_username
            FROM tasks 
            LEFT JOIN projects ON tasks.project_id = projects.id
            LEFT JOIN status ON tasks.status_id = status.id
            LEFT JOIN users ON tasks.assigned_to = users.id  WHERE status.status_name = 'completed'";
            // Préparer la requête SQL
            $statement = $this->db->prepare($query);
    
            // Liaison des valeurs des paramètres
    
            // Exécuter la requête SQL
            $statement->execute();
    
            // Récupérer la tâche correspondant à l'ID spécifié
            $task = $statement->fetchAll(PDO::FETCH_ASSOC);
    
            // Retourner la tâche
            return $task;
        } catch (PDOException $e) {
            // Gérer les erreurs de requête SQL
            echo "Erreur lors de la lecture des détails de la tâche : " . $e->getMessage();
            return false;
        }
    }
    

  

    public function update($id, $data) {
        // TODO: Implémenter la logique pour mettre à jour les informations d'une tâche dans la base de données
    }

    public function delete($id) {
        // TODO: Implémenter la logique pour supprimer une tâche de la base de données
    }
}
    



