<?php
session_start();
// Connexion simplifiée à la base de données
$conn = new mysqli('localhost', 'root', '', 'lms_db');
?>
<!DOCTYPE html>
<html>
<head>
    <title>LMS Connexion</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; padding-top: 50px; }
        form { border: 1px solid #ccc; padding: 20px; border-radius: 8px; }
    </style>
</head>
<body>
    <form method="POST" action="login.php">
        <h2>Connexion au LMS</h2>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Mot de passe" required><br><br>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
