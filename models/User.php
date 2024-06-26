<?php

// UserModel.php

require_once 'Database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getDb();
    }

    public function registerUser($username, $email, $password) {
        try {
            // Hasher le mot de passe avant de le stocker dans la base de données
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Préparer la requête SQL d'insertion
            $stmt = $this->db->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");

            // Binder les valeurs des paramètres
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);

            // Exécuter la requête
            $stmt->execute();

            // Retourner true si l'inscription a réussi
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs (par exemple, utilisateur existant avec le même email)
            // Vous pouvez journaliser l'erreur ou la renvoyer pour une gestion ultérieure
            return false;
        }
    }

    public function authenticateUser($email, $password) {
        try {
            // Récupérer le mot de passe associé à l'email de l'utilisateur depuis la base de données
            $stmt = $this->db->prepare("SELECT id, password FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Vérifier si l'email correspond à un utilisateur
            if ($user) {
                // Vérifier si le mot de passe est valide
                if (password_verify($password, $user['password'])) {
                    // Authentification réussie, retourner true
                    return true;
                }
            }

            // Retourner false si l'authentification a échoué
            return false;
        } catch (PDOException $e) {
            // Gérer les erreurs (par exemple, erreur de requête SQL)
            // Vous pouvez journaliser l'erreur ou la renvoyer pour une gestion ultérieure
            return false;
        }
    }
    public function getUserById($user_id) {
    try {
        // Préparer la requête SQL pour récupérer les détails de l'utilisateur en fonction de son ID
        $stmt = $this->db->prepare("SELECT id, username, email FROM users WHERE id = :user_id");
        // Binder les valeurs des paramètres
        $stmt->bindParam(':user_id', $user_id);
        // Exécuter la requête
        $stmt->execute();
        // Récupérer les résultats de la requête
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        // Retourner les détails de l'utilisateur
        return $user;
    } catch (PDOException $e) {
        // Gérer les erreurs de requête SQL (par exemple, erreur de syntaxe SQL, problème de connexion à la base de données, etc.)
        // Vous pouvez journaliser l'erreur ou la renvoyer pour une gestion ultérieure
        return false;
    }
}

}
