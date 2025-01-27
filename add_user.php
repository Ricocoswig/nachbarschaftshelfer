<?php
require 'config.php';

$username = 'Rico';
$password = 'Meissen1993.';
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
$role = 'admin';

try {
    $stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
    $stmt->execute([$username, $hashedPassword, $role]);
    echo "Benutzer erfolgreich hinzugefügt!";
} catch (PDOException $e) {
    echo "Fehler: " . $e->getMessage();
}
?>
