<!--
	Auteur:
-->
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
<link rel="stylesheet" href="../verkooporders/styleverkooporder.css">

</head>

<body>
<header>
        <h1>CRUD VerkoopOrder</h1>
        <nav>
            
                <a href="../index.html">Home</a><br><br>   
                <a href="../verkooporders/insert.php">Nieuwe verkooporder toevoegen</a><br><br>   

            
        </nav>
    </header>
<?php
require '../../vendor/autoload.php';

use Bas\classes\VerkoopOrder;

$verkooporder = new VerkoopOrder();
$data = $verkooporder->crudVerkoopOrder();

echo "<table border='1'>";

echo "<tr>
        <th>ID</th>
        <th>Klant</th>
        <th>Artikel</th>
        <th>Datum</th>
        <th>Aantal</th>
        <th>Status</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>";

foreach ($data as $row) {
    echo "<tr>";

    echo "<td>{$row['verkOrdId']}</td>";
    echo "<td>{$row['klantId']}</td>";
    echo "<td>{$row['artId']}</td>";
    echo "<td>{$row['verkOrdDatum']}</td>";
    echo "<td>{$row['verkOrdBestAantal']}</td>";
    echo "<td>{$row['verkOrdStatus']}</td>";

    // ✅ UPDATE
    echo "<td>
        <form method='get' action='update.php'>
            <input type='hidden' name='verkOrdId' value='{$row['verkOrdId']}'>
            <button type='submit'>Wijzigen</button>
        </form>
    </td>";

    // ✅ DELETE
   echo "<td>
    <form method='post' action='delete.php'>
        <input type='hidden' name='verkOrdId' value='{$row['verkOrdId']}'>
        <button type='submit'>Verwijderen</button>
    </form>
</td>";
   
}

echo "</table>";
?>
</body>
</html>