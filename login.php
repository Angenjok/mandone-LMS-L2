<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Préparation de la requête pour éviter les failles de sécurité
    $stmt = $conn->prepare("SELECT id, role, password FROM utilisateurs WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        // Dans un vrai projet, on utiliserait password_verify()
        if ($password == $user['password']) { 
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];

            // Redirection selon le rôle
            if ($user['role'] == 'enseignant') header("Location: enseignant.php");
            elseif ($user['role'] == 'etudiant') header("Location: etudiant.php");
            else header("Location: promoteur.php");
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Utilisateur non trouvé.";
    }
}
?>
