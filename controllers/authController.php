<?php
// authController.php
// require_once '../../models/Database.php';
session_start();

// Vérifie si l'utilisateur est déjà connecté
if (isset($_SESSION['users'])) {
    header("Location: dashboard");
    exit;
}

// Initialisation des variables pour les messages d'erreur
$emailErr = $passwordErr = "";
$email = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
//     // Validation des champs
//     if (empty($_POST["email"])) {
//         $emailErr = "L'email est requis";
//     } else {
//         $email = test_input($_POST["email"]);
//         // Vérifie si l'email est valide
//         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//             $emailErr = "Format d'email invalide";
//         }
//     }

//     if (empty($_POST["password"])) {
//         $passwordErr = "Le mot de passe est requis";
//     } 

//     // Si les champs sont valides, vérifier les informations d'identification
//     if (empty($emailErr) && empty($passwordErr)) {
//         $db = Database::getInstance();
//         if ($db->loginUser($email, $_POST["password"])) {
//             // Authentification réussie, rediriger vers la page de bienvenue
//             header("Location: ../../dashboard");
//             exit;
//         } else {
//             // Authentification échouée, afficher un message d'erreur
//             $passwordErr = "Email ou mot de passe incorrect";
//         }
//     }
// }
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login"])) {
    // Récupérer les données du formulaire
    $email = $_POST["email"];
    $password = $_POST["password"];
    if (empty($_POST["email"])) {
        $emailErr = "L'email est requis";
    } else {
        $email = test_input($_POST["email"]);
        // Vérifie si l'email est valide
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Format d'email invalide";
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Le mot de passe est requis";
    } 

     // Si les champs sont valides, vérifier les informations d'identification
    if (empty($emailErr) && empty($passwordErr)) {
    $db = Database::getInstance();
    if ($db->authenticateUser($email, $password)){

        // Rediriger l'utilisateur vers le tableau de bord après l'authentification réussie
        header("Location: ../../dashboard");
        exit;
    } else {
        $errors[] = "Email ou mot de passe incorrect.";
    }
    }


// Charger la vue de connexion
}
   // Vérifier si le formulaire d'inscription a été soumis
   if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["register"])) {
    // Récupérer les données du formulaire
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];


    if (empty($_POST["email"])) {
        $emailErr = "L'email est requis";
    } else {
        $email = test_input($_POST["email"]);
        // Vérifie si l'email est valide
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Format d'email invalide";
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Le mot de passe est requis";
    } 

     // Si les champs sont valides, vérifier les informations d'identification
    if (empty($emailErr) && empty($passwordErr)) {
        $db = Database::getInstance();
        if ($db->registerUser($username, $email, $password)){
            // Rediriger l'utilisateur vers la page de connexion
        // Rediriger l'utilisateur vers le tableau de bord après l'authentification réussie
        header("Location: ../../dashboard");
            exit;
        } else {
            $errors[] = "Une erreur s'est produite lors de l'inscription. Veuillez réessayer.";
        }
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>