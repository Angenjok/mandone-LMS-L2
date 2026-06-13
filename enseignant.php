<?php
session_start();
if ($_SESSION['role'] !== 'enseignant') {
    die("Accès refusé.");
}
include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Interface Enseignant</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Ajouter un nouveau cours</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="titre" placeholder="Titre de la leçon" required><br><br>
        <input type="file" name="file" required><br><br>
        <button type="submit">Publier le cours</button>
    </form>
</body>
</html>
