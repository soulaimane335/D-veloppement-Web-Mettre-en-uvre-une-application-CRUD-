<?php
require_once 'connection.php';

$query = $pdo->query("SELECT * FROM exercice ORDER BY id ASC");
$exercices = $query->fetchAll(PDO::FETCH_ASSOC);

echo "<table>";
echo "<tr><th>N°</th><th>Titre</th><th>Auteur</th><th>Date création</th><th>Actions</th></tr>";

foreach ($exercices as $exe) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($exe['id']) . "</td>";
    echo "<td>" . htmlspecialchars($exe['titre']) . "</td>";
    echo "<td>" . htmlspecialchars($exe['auteur']) . "</td>";
    echo "<td>" . htmlspecialchars($exe['date_creation']) . "</td>";
    echo "<td><button class='btn-supprimer' data-id='" . $exe['id'] . "'>Supprimer</button></td>";
    echo "</tr>";
}
echo "</table>";
?>