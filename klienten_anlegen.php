<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Daten aus dem Formular sammeln
    $stmt = $conn->prepare("INSERT INTO klienten (
        anrede, vorname, nachname, geburtstag, geschlecht, strasse, hausnummer, plz, ort, adresszusatz,
        staatsangehoerigkeit, familienstand, konfession, wohnsituation, oe, ik_krankenkasse,
        ik_pflegekasse, vers_nr, vers_status, aufnahmedatum, erstgespraech_datum, erstgespraech_durch,
        pflegestartdatum, pflegevertrag_ab, pflege_beendet
    ) VALUES (
        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
    )");

    // Werte aus dem POST-Array einsetzen
    $stmt->execute([
        $_POST['anrede'], $_POST['vorname'], $_POST['nachname'], $_POST['geburtstag'], $_POST['geschlecht'],
        $_POST['strasse'], $_POST['hausnummer'], $_POST['plz'], $_POST['ort'], $_POST['adresszusatz'],
        $_POST['staatsangehoerigkeit'], $_POST['familienstand'], $_POST['konfession'], $_POST['wohnsituation'],
        $_POST['oe'], $_POST['ik_krankenkasse'], $_POST['ik_pflegekasse'], $_POST['vers_nr'], $_POST['vers_status'],
        $_POST['aufnahmedatum'], $_POST['erstgespraech_datum'], $_POST['erstgespraech_durch'], $_POST['pflegestartdatum'],
        $_POST['pflegevertrag_ab'], $_POST['pflege_beendet']
    ]);

    echo "Klient erfolgreich angelegt!";
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Klienten anlegen</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <div class="container">
        <h1>Neuen Klienten anlegen</h1>
        <form method="POST">
            <!-- Persönliche Daten -->
            <fieldset>
                <legend>Persönliche Daten</legend>
                <label>Anrede:</label>
                <input type="text" name="anrede" placeholder="z.B. Herr/Frau">
                
                <label>Vorname:</label>
                <input type="text" name="vorname" required>
                
                <label>Nachname:</label>
                <input type="text" name="nachname" required>
                
                <label>Geburtstag:</label>
                <input type="date" name="geburtstag">
                
                <label>Geschlecht:</label>
                <select name="geschlecht">
                    <option value="m">Männlich</option>
                    <option value="w">Weiblich</option>
                    <option value="d">Divers</option>
                </select>
            </fieldset>

            <!-- Adresse -->
            <fieldset>
                <legend>Adresse</legend>
                <label>Straße:</label>
                <input type="text" name="strasse">
                
                <label>Hausnummer:</label>
                <input type="text" name="hausnummer">
                
                <label>PLZ:</label>
                <input type="text" name="plz">
                
                <label>Ort:</label>
                <input type="text" name="ort">
                
                <label>Adresszusatz:</label>
                <input type="text" name="adresszusatz">
            </fieldset>

            <!-- Weitere Daten -->
            <fieldset>
                <legend>Weitere Daten</legend>
                <label>Staatsangehörigkeit:</label>
                <input type="text" name="staatsangehoerigkeit">
                
                <label>Familienstand:</label>
                <input type="text" name="familienstand">
                
                <label>Konfession:</label>
                <input type="text" name="konfession">
                
                <label>Wohnsituation:</label>
                <input type="text" name="wohnsituation">
            </fieldset>

            <!-- Versicherungsdaten -->
            <fieldset>
                <legend>Versicherungsdaten</legend>
                <label>OE:</label>
                <input type="text" name="oe">
                
                <label>IK Krankenkasse:</label>
                <input type="text" name="ik_krankenkasse">
                
                <label>IK Pflegekasse:</label>
                <input type="text" name="ik_pflegekasse">
                
                <label>Versichertennummer:</label>
                <input type="text" name="vers_nr">
                
                <label>Versicherungsstatus:</label>
                <input type="text" name="vers_status">
            </fieldset>

            <!-- Pflegeinformationen -->
            <fieldset>
                <legend>Pflegeinformationen</legend>
                <label>Aufnahmedatum:</label>
                <input type="date" name="aufnahmedatum">
                
                <label>Datum Erstgespräch:</label>
                <input type="date" name="erstgespraech_datum">
                
                <label>Erstgespräch geführt durch:</label>
                <input type="text" name="erstgespraech_durch">
                
                <label>Pflegestartdatum:</label>
                <input type="date" name="pflegestartdatum">
                
                <label>Pflegevertrag ab:</label>
                <input type="date" name="pflegevertrag_ab">
                
                <label>Pflege beendet:</label>
                <input type="date" name="pflege_beendet">
            </fieldset>

            <button type="submit">Klient speichern</button>
        </form>
    </div>
</body>
</html>
