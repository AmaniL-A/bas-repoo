<?php
session_start();

if (!isset($_SESSION['rol'])) {
    header("Location: login/login.php");
    exit;
}

$rol = $_SESSION['rol'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bas Boodschappenservice</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <h1>Menu BAS</h1>
    <h2>Ingelogd als: <?= $rol ?></h2>

    <nav>

    <?php
    if ($rol == "verkoper") {
        echo "<a href='klant/read.php'>CRUD klant</a>";
        echo "<a href='verkooporders/read.php'>CRUD verkoopOrder</a>";
    }

    if ($rol == "magazijn") {
        echo "<a href='artikel/read.php'>CRUD artikel</a>";
        echo "<a href='verkooporders/read.php'>Status aanpassen</a>";
    }

    if ($rol == "bezorger") {
        echo "<a href='verkooporders/read.php'>Orders afleveren</a>";
    }

    if ($rol == "inkoper") {
        echo "<a href='artikel/read.php'>Artikelen</a>";
    }
    ?>

    </nav>

    <br><br>
    <a href="auth/logout.php">Uitloggen</a>

</body>
</html>