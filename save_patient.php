<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

$db_host = 'localhost';
$db_user = 'd0429cfc';
$db_pass = 'Meissen1993.';
$db_name = 'd0429cfc';

try {
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (mysqli_connect_errno()) {
        throw new Exception("Verbindung fehlgeschlagen: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_patient'])) {
        // Daten bereinigen und validieren (SEHR WICHTIG!)
        $vorname = mysqli_real_escape_string($conn, $_POST['vorname']);
        $nachname = mysqli_real_escape_string($conn, $_POST['nachname']);
        $anrede = isset($_POST['anrede']) ? mysqli_real_escape_string($conn, $_POST['anrede']) : '';
        $strasse = isset($_POST['strasse']) ? mysqli_real_escape_string($conn, $_POST['strasse']) : '';
        $plz = isset($_POST['plz']) ? mysqli_real_escape_string($conn, $_POST['plz']) : '';
        $ort = isset($_POST['ort']) ? mysqli_real_escape_string($conn, $_POST['ort']) : '';
        $geburtsdatum = isset($_POST['geburtsdatum']) ? mysqli_real_escape_string($conn, $_POST['geburtsdatum']) : null;