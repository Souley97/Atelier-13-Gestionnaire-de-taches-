<?php

// Database.php

class Database {
    private static $instance;
    private $db;

    private function __construct() {
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "gestion_taches";
        try {
            $this->db = new PDO("mysql:host=$host;dbname=$database", $user, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur : ". $e->getMessage());
        }
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getDb() {
        return $this->db;
    }

    public function loginUser($email, $password) {
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

    public function logoutUser() {
        // Détruire la session utilisateur pour se déconnecter
        session_start();
        session_unset();
        session_destroy();
    }

    public function isLoggedIn() {
        // Vérifier si l'utilisateur est connecté en vérifiant la présence de la session utilisateur
        return isset($_SESSION['user']);
    }

    public function getLoggedInUser() {
        // Récupérer l'utilisateur connecté à partir de la session
        return isset($_SESSION['user']) ? $_SESSION['user'] : null;
    }
}
