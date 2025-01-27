<?php
require 'config.php';

// Klientendaten mit Krankenkasseninformationen abrufen
$stmt = $conn->query("SELECT klienten.*, krankenkassen.name AS krankenkasse_name, 
    krankenkassen.ik_nummer, krankenkassen.strasse, krankenkassen.plz, krankenkassen.ort
    FROM klienten
    LEFT JOIN krankenkassen ON klienten.krankenkasse_id = krankenkassen.id");

$klienten = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Klientenliste</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <div class="container">
        <h1>Klientenliste</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Geburtstag</th>
                <th>Adresse</th>
                <th>Krankenkasse</th>
                <th>IK-Nummer</th>
                <th>Krankenkassenadresse</th>
            </tr>
            <?php foreach ($klienten as $klient): ?>
            <tr>
                <td><?= htmlspecialchars($klient['id']) ?></td>
                <td><?= htmlspecialchars($klient['vorname'] . ' ' . $klient['nachname']) ?></td>
                <td><?= htmlspecialchars($klient['geburtstag']) ?></td>
                <td><?= htmlspecialchars($klient['strasse'] . ', ' . $klient['plz'] . ' ' . $klient['ort']) ?></td>
                <td><?= htmlspecialchars($klient['krankenkasse_name']) ?></td>
                <td><?= htmlspecialchars($klient['ik_nummer']) ?></td>
                <td><?= htmlspecialchars($klient['strasse'] . ', ' . $klient['plz'] . ' ' . $klient['ort']) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
