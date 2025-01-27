<?php
session_start();
require_once 'config.php'; // Datenbankverbindung

$error_message = "";
$success_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT id, username, password, role FROM users WHERE username = ?");
        if (!$stmt) {
            $error_message = "Fehler bei der Datenbankabfrage.";
        } else {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row['password'])) {
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['role'] = $row['role'];
                    header("Location: dashboard.php");
                    exit();
                } else {
                    $error_message = "Falsches Passwort.";
                }
            } else {
                $error_message = "Benutzer nicht gefunden.";
            }
            $stmt->close();
        }
    } elseif (isset($_POST['register'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = $_POST['password'];

        // Überprüfen, ob der Benutzername bereits existiert
        $checkStmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $checkStmt->bind_param("s", $username);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            $error_message = "Benutzername bereits vergeben.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            if (!$stmt) {
                $error_message = "Fehler bei der Datenbankabfrage.";
            } else {
                $stmt->bind_param("ss", $username, $hashed_password);
                if ($stmt->execute()) {
                    $success_message = "Registrierung erfolgreich. Bitte logge dich ein.";
                } else {
                    $error_message = "Registrierung fehlgeschlagen: " . $stmt->error;
                }
                $stmt->close();
            }
        }
        $checkStmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Registrierung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <h2>Login / Registrierung</h2>

            <?php if ($error_message): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error_message) ?></div>
            <?php endif; ?>

            <?php if ($success_message): ?>
                <div class="alert alert-success"><?= htmlspecialchars($success_message) ?></div>
            <?php endif; ?>

            <form method="post">
                <h3>Login</h3>
                <div class="mb-3">
                    <label for="username" class="form-label">Benutzername:</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Passwort:</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <button type="submit" name="login" class="btn btn-primary">Einloggen</button>
            </form>

            <hr>

            <form method="post">
                <h3>Registrierung</h3>
                <div class="mb-3">
                    <label for="reg_username" class="form-label">Benutzername:</label>
                    <input type="text" name="username" id="reg_username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="reg_password" class="form-label">Passwort:</label>
                    <input type="password" name="password" id="reg_password" class="form-control" required>
                </div>
                <button type="submit" name="register" class="btn btn-success">Registrieren</button>
            </form>
        </div>
    </div>
</body>
</html>