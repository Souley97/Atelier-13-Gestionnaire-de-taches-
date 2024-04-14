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

class Tache implements ICRUD
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getDb();
    }
    public function readAll()
    {
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

    // Méthode pour créer une nouvelle tâche dans la base de données
    public function create($data)
    {
        try {

            // Exemple de requête SQL d'insertion
            $query = "INSERT INTO tasks (name, description, priority, due_date, project_id, status_id, assigned_to) 
                          VALUES (:name, :description, :priority, :due_date, :project_id, :status_id, :assigned_to)";

            // Préparez la requête SQL
            $statement = $this->db->prepare($query);

            // Liez les valeurs aux paramètres de la requête
            $statement->bindParam(':name', $data['name']);
            $statement->bindParam(':description', $data['description']);
            $statement->bindParam(':priority', $data['priority']);
            $statement->bindParam(':due_date', $data['due_date']);
            $statement->bindParam(':project_id', $data['project_id']);
            $statement->bindParam(':status_id', $data['status_id']);
            $statement->bindParam(':assigned_to', $data['assigned_to']);

            // Exécutez la requête SQL
            $statement->execute();

            // Retournez l'identifiant de la nouvelle tâche insérée
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            // Gérez les erreurs de requête SQL
            echo "Erreur lors de la création de la tâche : " . $e->getMessage();
            return false;
        }
    }




    // TODO: Implémenter la logique pour lire les détails d'une tâche spécifique dans la base de données
    public function read($id)
    {
        try {
            // Préparer la requête SQL paramétrée pour sélectionner la tâche avec l'ID spécifié
            $query = "SELECT tasks.*, 
                             projects.name AS project_name, 
                             status.status_name AS status_name, 
                             users.username AS assigned_to_username,  
                             modifier.username AS modifier_username 
                      FROM tasks 
                      LEFT JOIN projects ON tasks.project_id = projects.id
                      LEFT JOIN status ON tasks.status_id = status.id
                      LEFT JOIN users ON tasks.assigned_to = users.id
                      LEFT JOIN users AS modifier ON tasks.modifier_by = modifier.id 
                      WHERE tasks.id = :id";
            
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
    
    public function readStatusTodo()
    {
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

    public function readStatusProgress()
    {
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
    public function readStatusCompleted()
    {
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
    public function readAllStatus()
    {
        try {
            // Préparer la requête SQL avec des jointures
            $query = "SELECT *  FROM status ";

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

    public function readAllProjet()
    {
        try {
            // Préparer la requête SQL avec des jointures
            $query = "SELECT *  FROM projects ";

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
    public function readAllUser()
    {
        try {
            // Préparer la requête SQL avec des jointures
            $query = "SELECT *  FROM users ";

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
        public function updateStatusTodo($tache_id) {
            try {
                $query = "UPDATE tasks SET status_id = :completed_status_id WHERE id = :tache_id";
                $statement = $this->db->prepare($query);
                $completed_status_id = 1; // Supposons que l'ID du statut "completed" est 2
                $statement->bindParam(':completed_status_id', $completed_status_id, PDO::PARAM_INT);
                $statement->bindParam(':tache_id', $tache_id, PDO::PARAM_INT);
                $statement->execute();
                return true;
            } catch (PDOException $e) {
                echo "Erreur lors de la mise à jour du statut de la tâche : " . $e->getMessage();
                return false;
            }
        }
        
    public function updateStatusProgress($tache_id) {
        try {
            $query = "UPDATE tasks SET status_id = :completed_status_id WHERE id = :tache_id";
            $statement = $this->db->prepare($query);
            $completed_status_id = 2; // Supposons que l'ID du statut "completed" est 2
            $statement->bindParam(':completed_status_id', $completed_status_id, PDO::PARAM_INT);
            $statement->bindParam(':tache_id', $tache_id, PDO::PARAM_INT);
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour du statut de la tâche : " . $e->getMessage();
            return false;
        }
    }
    public function updateStatusCompleted($tache_id) {
        try {
            $query = "UPDATE tasks SET status_id = :completed_status_id WHERE id = :tache_id";
            $statement = $this->db->prepare($query);
            $completed_status_id = 1; // Supposons que l'ID du statut "completed" est 3
            $statement->bindParam(':completed_status_id', $completed_status_id, PDO::PARAM_INT);
            $statement->bindParam(':tache_id', $tache_id, PDO::PARAM_INT);
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour du statut de la tâche : " . $e->getMessage();
            return false;
        }
    }
    public function updateStatus($tache_id, $status_id) {
        try {
            $query = "UPDATE tasks SET status_id = :status_id WHERE id = :tache_id";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':status_id', $status_id, PDO::PARAM_INT);
            $statement->bindParam(':tache_id', $tache_id, PDO::PARAM_INT);
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour du statut de la tâche : " . $e->getMessage();
            return false;
        }
    }
    
 
        public function getProjectId($tache_id) {
            try {
                $query = "SELECT project_id FROM tasks WHERE id = :tache_id";
                $statement = $this->db->prepare($query);
                $statement->bindParam(':tache_id', $tache_id, PDO::PARAM_INT);
                $statement->execute();
                $result = $statement->fetch(PDO::FETCH_ASSOC);
                return $result['project_id'];
            } catch (PDOException $e) {
                echo "Erreur lors de la récupération de l'ID du projet de la tâche : " . $e->getMessage();
                return false;
            }
        
    }
    public function updateTache($id, $data, $modifier_by)
{
    try { 
        // Ajouter modifier_by aux données
        $data['modifier_by'] = $modifier_by;

        $query = "UPDATE tasks SET name = :name, description = :description, priority = :priority, due_date = :due_date, assigned_to = :assigned_to, modifier_by = :modifier_by WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':name', $data['name']);
        $statement->bindParam(':description', $data['description']);
        $statement->bindParam(':priority', $data['priority']);
        $statement->bindParam(':due_date', $data['due_date']);
        $statement->bindParam(':assigned_to', $data['assigned_to']);
        $statement->bindParam(':modifier_by', $data['modifier_by']);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        return true;             
    } catch (PDOException $e) {
        echo "Erreur lors de la mise à jour du projet : " . $e->getMessage();
        return false;
    }
}


    public function update($id, $data)
    {
        try { 
            $query = "UPDATE tasks SET name = :name, description = :description, priority = :priority, due_date = :due_date, assigned_to = :assigned_to WHERE id = :id";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':name', $data['name']);
            $statement->bindParam(':description', $data['description']);
            $statement->bindParam(':priority', $data['priority']);
            $statement->bindParam(':due_date', $data['due_date']);
            $statement->bindParam(':assigned_to', $data['assigned_to']);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            return true;             
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour du projet : " . $e->getMessage();
            return false;
        }
    }
    
   // Méthode pour supprimer une tâche de la base de données
   public function delete($id) {
    try {
        // Préparez la requête SQL de suppression
        $query = "DELETE FROM tasks WHERE id = :id";
        
        // Préparez la requête SQL
        $statement = $this->db->prepare($query);
        
        // Liez la valeur du paramètre de requête à l'ID de la tâche à supprimer
        $statement->bindParam(':id', $id);
        
        // Exécutez la requête SQL
        $statement->execute();

        // Retournez true si la suppression a réussi
        return true;
    } catch (PDOException $e) {
        // Gérez les erreurs de requête SQL
        echo "Erreur lors de la suppression de la tâche : " . $e->getMessage();
        return false;
    }
}
}
