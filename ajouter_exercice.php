<?php
require_once 'conn.php';

if (isset($_POST['titre'], $_POST['auteur'], $_POST['date_creation'])) {
    $stmt = $pdo->prepare("INSERT INTO exercice (titre, auteur, date_creation) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['titre'], $_POST['auteur'], $_POST['date_creation']]);
}
?>