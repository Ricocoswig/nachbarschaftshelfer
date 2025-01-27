<?php
// ... (PHP-Code zur Datenbankverbindung und Benutzerdatenabfrage bleibt gleich)
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            Versichertenverwaltung
        </div>
        <ul class="nav">
	    <li><a href="logout.php">Logout</a>
            <li><a href="#"><i class="fas fa-users"></i> Versicherte</a></li>
            <li><a href="#"><i class="fas fa-calendar-days"></i> Leistungsplanung <span class="badge">31</span></a></li>
            <li><a href="#"><i class="fas fa-file-alt"></i> Verordnungen</a></li>
            <li><a href="#"><i class="fas fa-briefcase"></i> Pflegeunterbrechungen</a></li>
            <li><a href="#"><i class="fas fa-house-user"></i> Wohngemeinschaften</a></li>
            <li><a href="#"><i class="fas fa-key"></i> Schlüsselkasten</a></li>
            <li><a href="#"><i class="fas fa-calculator"></i> Pflegegrad-Rechner (NBA)</a></li>
        </ul>
        <a href="logout.php" class="logout-button">Logout</a>
    </div>
    <div class="content">
        <?php if ($error_message !== ""): ?>
            <div class="alert alert-danger" role="alert">
                <?= htmlspecialchars($error_message) ?>
            </div>
        <?php else: ?>
            <h1>Willkommen im Dashboard, <?= htmlspecialchars($username) ?>!</h1>
            <p class="lead">Hier finden Sie eine Übersicht Ihrer Aufgaben und Informationen.</p>

            <div class="dashboard-widgets">
              <div class="widget">
                <div class="widget-header">Aktuelle Aufgaben</div>
                <div class="widget-content">
                  <ul>
                    <li><i class="fas fa-check-circle"></i> Besuch bei Frau Müller</li>
                    <li><i class="fas fa-exclamation-triangle"></i> Medikamente für Herrn Schmidt bestellen</li>
                  </ul>
                </div>
              </div>

              <div class="widget">
                <div class="widget-header">Nächste Termine</div>
                <div class="widget-content">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Datum</th>
                                <th>Uhrzeit</th>
                                <th>Beschreibung</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2024-03-15</td>
                                <td>10:00</td>
                                <td>Kontrollbesuch</td>
                            </tr>
                            <tr>
                                <td>2024-03-18</td>
                                <td>14:30</td>
                                <td>Beratungsgespräch</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>