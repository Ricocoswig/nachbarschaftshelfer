
    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: index.php');
    }
    ?>
    <html>
    <head>
        <title>Patientenverwaltung</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h2 class="mt-5">Patientenübersicht</h2>
            <a href="add_patient.php" class="btn btn-success mb-3">Neuen Patienten hinzufügen</a>
            <!-- Patientenliste wird hier geladen -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dynamische Patienten anzeigen -->
                </tbody>
            </table>
        </div>
    </body>
    </html>
    