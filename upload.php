<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['file'])) {
    $titre = $_POST['titre'];
    $file_name = $_FILES['file']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($file_name);

    // Création du dossier s'il n'existe pas (à faire sur le serveur)
    if (!is_dir($target_dir)) { mkdir($target_dir, 0777, true); }

    // Déplacement du fichier vers le serveur
    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
        // Enregistrement dans la base de données
        $stmt = $conn->prepare("INSERT INTO lecons (titre, fichier_url) VALUES (?, ?)");
        $stmt->bind_param("ss", $titre, $target_file);
        $stmt->execute();
        
        echo "Cours ajouté avec succès !";
        echo "<br><a href='enseignant.php'>Retour</a>";
    } else {
        echo "Erreur lors de l'upload.";
    }
}
?>
