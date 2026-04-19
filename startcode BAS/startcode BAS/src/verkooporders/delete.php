<?php

require '../../vendor/autoload.php';

use Bas\classes\VerkoopOrder;

if (isset($_GET['verkOrdId'])) {

    $id = $_GET['verkOrdId'];

    $verkooporder = new VerkoopOrder();

    if ($verkooporder->deleteVerkooporder($id)) {
        echo "Verkooporder verwijderd!";
    } else {
        echo "Verwijderen mislukt!";
    }

} else {
    echo "Geen ID ontvangen!";
}
?>
<br><a href="read.php">Terug</a>
<link rel="stylesheet" href="../verkooporders/styleverkooporder.css">