<?php
session_start();
require_once 'config.php';

$error_message = "";

if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

if (isset($_POST['login'])) {
    // ... (Der gleiche Login-Code wie in der separaten login.php Datei)
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Willkommen</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <?php if ($error_message !== ""): ?>
            <div class="alert alert-danger" role="alert">
                <?= htmlspecialchars($error_message) ?>
            </div>
        <?php endif; ?>
        <?php if (!isset($_SESSION['user_id'])): ?>
        <div class="login-container">
            <div class="login-form">
                <h2>Login</h2>
                <form method="post">
                    <div class="form-group">
                        <label for="username">Benutzername:</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Passwort:</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <input type="submit" name="login" value="Einloggen" class="btn btn-primary">
                </form>
                <p class="mt-3">Noch kein Konto? <a href="register.php">Registrieren</a></p>
            </div>
        </div>
        <?php else: ?>
            <div class="jumbotron text-center">
                <h1 class="display-4">Willkommen bei der ambulanten Betreuung</h1>
                <p class="lead">Sie sind bereits angemeldet.</p>
                <a class="btn btn-primary btn-lg" href="dashboard.php" role="button">Zum Dashboard</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>