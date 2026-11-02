<?php
require_once 'conn.php';

if (isset($_POST['id'])) {
    $stmt = $pdo->prepare("DELETE FROM exercice WHERE id = ?");
    $stmt->execute([$_POST['id']]);
}
?>