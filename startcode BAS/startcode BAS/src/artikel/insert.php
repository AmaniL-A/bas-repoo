<?php
// auteur: Amani

require '../../vendor/autoload.php';

use Bas\classes\Artikel;

// Check of formulier is verstuurd
if (isset($_POST["insert"])) {

    $artikel = new Artikel();

    $data = [
        'artOmschrijving' => $_POST['artOmschrijving'],
        'artInkoop' => $_POST['artInkoop'],
        'artVerkoop' => $_POST['artVerkoop'],
        'artVoorraad' => $_POST['artVoorraad'],
        'artMinVoorraad' => $_POST['artMinVoorraad'],
        'artMaxVoorraad' => $_POST['artMaxVoorraad'],
        'artLocatie' => $_POST['artLocatie']
    ];

    $result = $artikel->insertArtikel($data);

    if ($result) {
        echo "<p style='color:green;'>Artikel succesvol toegevoegd!</p>";
    } else {
        echo "<p style='color:red;'>Fout bij toevoegen!</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Artikel toevoegen</title>
<link rel="stylesheet" href="../../style.css">
</head>
<body>

<h1>Artikel toevoegen</h1>

<form method="post">

    <label>Omschrijving:</label><br>
    <input type="text" name="artOmschrijving" required><br><br>

    <label>Inkoopprijs:</label><br>
    <input type="number" step="0.01" name="artInkoop" required><br><br>

    <label>Verkoopprijs:</label><br>
    <input type="number" step="0.01" name="artVerkoop" required><br><br>

    <label>Voorraad:</label><br>
    <input type="number" name="artVoorraad" required><br><br>

    <label>Min voorraad:</label><br>
    <input type="number" name="artMinVoorraad" required><br><br>

    <label>Max voorraad:</label><br>
    <input type="number" name="artMaxVoorraad" required><br><br>

    <label>Locatie:</label><br>
    <input type="number" name="artLocatie" required><br><br>

    <input type="submit" name="insert" value="Toevoegen">

</form>

<br>
<a href="read.php">Terug</a>

</body>
</html>