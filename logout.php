<?php
session_start();

// Alle Session-Variablen l�schen
session_unset();

// Die Session zerst�ren
session_destroy();

// Cookies l�schen (optional, aber empfohlen)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Zur Startseite weiterleiten
header("Location: index.php"); // Oder zur Login-Seite (login.php), je nach Bedarf
exit();
?>