<?php
session_start();
include 'db.php';

// Vérification de sécurité
if ($_SESSION['role'] !== 'etudiant') {
    die("Accès réservé aux étudiants.");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Espace Étudiant</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Liste des cours disponibles</h2>
    <ul>
        <?php
        $result = $conn->query("SELECT * FROM lecons");
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row['titre'] . " - <a href='" . $row['fichier_url'] . "' target='_blank'>Accéder au cours</a></li>";
        }
        ?>
    </ul>
</body>
</html>
