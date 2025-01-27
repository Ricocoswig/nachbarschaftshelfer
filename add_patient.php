<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

require_once 'config.php';

$error_message = "";
$success_message = "";

if (isset($_POST['add_client'])) {
    // Sichere und validiere die Eingaben (SEHR WICHTIG!)
    $anrede = mysqli_real_escape_string($conn, $_POST['anrede']);
    $titel = mysqli_real_escape_string($conn, $_POST['titel']);
    $nachname = mysqli_real_escape_string($conn, $_POST['nachname']);
    $vorname = mysqli_real_escape_string($conn, $_POST['vorname']);
    $geburtstag = mysqli_real_escape_string($conn, $_POST['geburtstag']);
    $geburtsort = mysqli_real_escape_string($conn, $_POST['geburtsort']);
    $strasse = mysqli_real_escape_string($conn, $_POST['strasse']);
    $hausnummer = mysqli_real_escape_string($conn, $_POST['hausnummer']);
    $plz = mysqli_real_escape_string($conn, $_POST['plz']);
    $ort = mysqli_real_escape_string($conn, $_POST['ort']);
    $adresszusatz = mysqli_real_escape_string($conn, $_POST['adresszusatz']);
    $adressqualitaet = mysqli_real_escape_string($conn, $_POST['adressqualitaet']);
    $geburtsname = mysqli_real_escape_string($conn, $_POST['geburtsname']);
    $geschlecht = mysqli_real_escape_string($conn, $_POST['geschlecht']);
    $staatsangehoerigkeit = mysqli_real_escape_string($conn, $_POST['staatsangehoerigkeit']);
    $familienstand = mysqli_real_escape_string($conn, $_POST['familienstand']);
    $konfession = mysqli_real_escape_string($conn, $_POST['konfession']);
    $wohnsituation = mysqli_real_escape_string($conn, $_POST['wohnsituation']);
    $oe = mysqli_real_escape_string($conn, $_POST['oe']);
    $ik_krankenkasse = mysqli_real_escape_string($conn, $_POST['ik_krankenkasse']);
    $ik_pflegekasse = mysqli_real_escape_string($conn, $_POST['ik_pflegekasse']);
    $vers_nr = mysqli_real_escape_string($conn, $_POST['vers_nr']);
    $vers_status = mysqli_real_escape_string($conn, $_POST['vers_status']);
    $aufnahmedatum = mysqli_real_escape_string($conn, $_POST['aufnahmedatum']);
    $erstgespraech_datum = mysqli_real_escape_string($conn, $_POST['erstgespraech_datum']);
    $erstgespraech_durch = mysqli_real_escape_string($conn, $_POST['erstgespraech_durch']);
    $pflegestartdatum = mysqli_real_escape_string($conn, $_POST['pflegestartdatum']);
    $pflegevertrag_ab = mysqli_real_escape_string($conn, $_POST['pflegevertrag_ab']);
    $pflege_beendet = mysqli_real_escape_string($conn, $_POST['pflege_beendet']);
    $hausnotruf_bei = mysqli_real_escape_string($conn, $_POST['hausnotruf_bei']);
    $vorsorgevollmacht = isset($_POST['vorsorgevollmacht']) ? 1 : 0; // Checkbox
    $patientenverfuegung = isset($_POST['patientenverfuegung']) ? 1 : 0; // Checkbox
    $schwerbehinderung = mysqli_real_escape_string($conn, $_POST['schwerbehinderung']);
    $freiheitsentziehende_massnahmen = mysqli_real_escape_string($conn, $_POST['freiheitsentziehende_massnahmen']);
    $haustiere = mysqli_real_escape_string($conn, $_POST['haustiere']);
    $chipkarte = isset($_POST['chipkarte']) ? 1 : 0; // Checkbox
    $palliativ = isset($_POST['palliativ']) ? 1 : 0; // Checkbox
    $dialysepflichtig = isset($_POST['dialysepflichtig']) ? 1 : 0; // Checkbox
    $anus_praeter = isset($_POST['anus_praeter']) ? 1 : 0; // Checkbox
    $schluesselcode = mysqli_real_escape_string($conn, $_POST['schluesselcode']);
    $schluesselkasten = mysqli_real_escape_string($conn, $_POST['schluesselkasten']);
    $schluesseltext = mysqli_real_escape_string($conn, $_POST['schluesseltext']);
    $allergien = mysqli_real_escape_string($conn, $_POST['allergien']);


    // Hier die SQL-Abfrage zum Einfügen in die Datenbank
    $sql = "INSERT INTO clients (anrede, titel, nachname, vorname, geburtstag, geburtsort, strasse, hausnummer, plz, ort, adresszusatz, adressqualitaet, geburtsname, geschlecht, staatsangehoerigkeit, familienstand, konfession, wohnsituation, oe, ik_krankenkasse, ik_pflegekasse, vers_nr, vers_status, aufnahmedatum, erstgespraech_datum, erstgespraech_durch, pflegestartdatum, pflegevertrag_ab, pflege_beendet, hausnotruf_bei, vorsorgevollmacht, patientenverfuegung, schwerbehinderung, freiheitsentziehende_massnahmen, haustiere, chipkarte, palliativ, dialysepflichtig, anus_praeter, schluesselcode, schluesselkasten, schluesseltext, allergien) VALUES ('$anrede', '$titel', '$nachname', '$vorname', '$geburtstag', '$geburtsort', '$strasse', '$hausnummer', '$plz', '$ort', '$adresszusatz', '$adressqualitaet', '$geburtsname', '$geschlecht', '$staatsangehoerigkeit', '$familienstand', '$konfession', '$wohnsituation', '$oe', '$ik_krankenkasse', '$ik_pflegekasse', '$vers_nr', '$vers_status', '$aufnahmedatum', '$erstgespraech_datum', '$erstgespraech_durch', '$pflegestartdatum', '$pflegevertrag_ab', '$pflege_beendet', '$hausnotruf_bei', $vorsorgevollmacht, $patientenverfuegung, '$schwerbehinderung', '$freiheitsentziehende_massnahmen', '$haustiere', $chipkarte, $palliativ, $dialysepflichtig, $anus_praeter, '$schluesselcode', '$schluesselkasten', '$schluesseltext', '$allergien')";

    if ($conn->query($sql) === TRUE) {
        $success_message = "Klient erfolgreich hinzugefügt";
    } else {
        $error_message = "Fehler beim Hinzufügen des Klienten: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klient hinzufügen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Klient hinzufügen</h1>

        <?php if ($error_message): ?>
            <div class="alert alert-danger"><?= $error_message ?></div>
        <?php endif; ?>

        <?php if ($success_message): ?>
            <div class="alert alert-success"><?= $success_message ?></div>
        <?php endif; ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="card mb-3">
                <div class="card-header">Persönliche Daten</div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <