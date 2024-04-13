<?php

// Database.php

class Database
{
    private static $instance;
    private $db;

    private function __construct()
    {
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "gestion_taches";
        try {
            $this->db = new PDO("mysql:host=$host;dbname=$database", $user, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getDb()
    {
        return $this->db;
    }

    // public function loginUser($email, $password)
    // {
    //     try {
    //         // Récupérer le mot de passe associé à l'email de l'utilisateur depuis la base de données
    //         $stmt = $this->db->prepare("SELECT id, password FROM users WHERE email = :email");
    //         $stmt->bindParam(':email', $email);
    //         $stmt->execute();
    //         $user = $stmt->fetch(PDO::FETCH_ASSOC);

    //         // Vérifier si l'email correspond à un utilisateur
    //         if ($user) {
    //             // Vérifier si le mot de passe est valide
    //             if (password_verify($password, $user['password'])) {
    //                 session_start();
    //                 $_SESSION['user'] = $user;                    return true;
    //             }

    //         }

    //         return true; // Authentification réussie
    //     } catch (PDOException $e) {
    //         // Gérer les erreurs (par exemple, erreur de requête SQL)
    //         // Vous pouvez journaliser l'erreur ou la renvoyer pour une gestion ultérieure
    //         return false;
    //     }
    // }
    public function loginUser($email, $password)
    {
        $stmt = $this->db->prepare("SELECT * FROM users  WHERE email = :email AND password = :password");
        $stmt->execute(['email' => $email, 'password' => $password]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Démarrer une session et stocker l'utilisateur connecté
            session_start();
            $_SESSION['user'] = $user;
            return true; // Authentification réussie
        } else {
            return false; // Échec de l'authentification
        }
    }

    public function logoutUser()
    {
        // Détruire la session utilisateur pour se déconnecter
        session_start();
        session_unset();
        session_destroy();
    }

    public function isLoggedIn()
    {
        // Vérifier si l'utilisateur est connecté en vérifiant la présence de la session utilisateur
        return isset($_SESSION['user']);
    }

    public function getLoggedInUser()
    {
        // Récupérer l'utilisateur connecté à partir de la session
        return isset($_SESSION['user']) ? $_SESSION['user'] : null;
    }

    public function registerUser($username, $email, $password)
    {
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
            if ($stmt->rowCount() > 0) {
                // L'inscription a réussi, authentifier automatiquement l'utilisateur
                return $this->authenticateUser($email, $password);
            }
            // Retourner true si l'inscription a réussi
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs (par exemple, utilisateur existant avec le même email)
            // Vous pouvez journaliser l'erreur ou la renvoyer pour une gestion ultérieure
            return false;
        }
    }
public function authenticateUser($email, $password)
{
    // Récupérer le mot de passe associé à l'email de l'utilisateur depuis la base de données
    $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifier si l'email correspond à un utilisateur
    if ($user) {
        // Vérifier si le mot de passe est valide
        if (password_verify($password, $user['password'])) {
            // Démarrer la session
            session_start();
            // Stocker l'ID de l'utilisateur dans la session
            session_start();
            $_SESSION['user'] = $user;            // Authentification réussie, retourner true
            return true;
        } else {
            // Mot de passe invalide, retourner false
            return false;
        }
    } else {
        // L'utilisateur n'existe pas, retourner false
        return false;
    }
}

}
