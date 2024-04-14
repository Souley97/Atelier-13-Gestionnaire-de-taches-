<?php
require_once 'Database.php';
class UserProjet
{

    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getDb();
    }

    // public function inviteUserToProject($user_id, $project_id) {
// commentaire
    public function inviteUserToProject($user_id, $project_id) {
        try {
            // Vérifier d'abord si l'utilisateur n'est pas déjà invité à ce projet
            if ($this->isUserInvitedToProject($user_id, $project_id)) {
                // L'utilisateur est déjà invité à ce projet, retourner false
                return false;
            }
            
            // Préparez la requête SQL d'insertion
            $stmt = $this->db->prepare("INSERT INTO user_project (user_id, project_id) VALUES (:user_id, :project_id)");

            // Binder les valeurs des paramètres
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':project_id', $project_id);

            // Exécuter la requête
            $stmt->execute();

            // Retourner true si l'invitation a été envoyée avec succès
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs
            // Vous pouvez journaliser l'erreur ou la renvoyer pour une gestion ultérieure
            return false;
        }
    }
    
    private function isUserInvitedToProject($user_id, $project_id) {
        // Préparez la requête SQL pour vérifier si l'utilisateur est déjà invité à ce projet
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM user_project WHERE user_id = :user_id AND project_id = :project_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':project_id', $project_id);
        $stmt->execute();
        
        // Récupérer le nombre de lignes résultantes
        $count = $stmt->fetchColumn();
        
        // Retourner true si l'utilisateur est déjà invité à ce projet, sinon false
        return ($count > 0);
    }
    public function getUserByProjectId($project_id) {
        try {
            // Préparez la requête SQL pour récupérer les utilisateurs du projet
            $stmt = $this->db->prepare("SELECT u.id, u.username FROM users u INNER JOIN user_project up ON u.id = up.user_id WHERE up.project_id = :project_id");
    
            // Liez la valeur du paramètre
            $stmt->bindParam(':project_id', $project_id);
    
            // Exécutez la requête
            $stmt->execute();
    
            // Récupérez les résultats de la requête
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Retournez les utilisateurs récupérés
            return $users;
        } catch (PDOException $e) {
              return false;
        }            
    }
    
}
