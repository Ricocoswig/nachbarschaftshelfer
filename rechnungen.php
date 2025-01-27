<?php
require 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$invoices = $pdo->query("SELECT * FROM invoices")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Rechnungen</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <h1>Rechnungen</h1>
    <table>
        <tr>
            <th>Betrag</th>
            <th>Fälligkeitsdatum</th>
            <th>Status</th>
        </tr>
        <?php foreach ($invoices as $invoice): ?>
        <tr>
            <td><?= htmlspecialchars($invoice['amount']) ?></td>
            <td><?= htmlspecialchars($invoice['due_date']) ?></td>
            <td><?= htmlspecialchars($invoice['status']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
