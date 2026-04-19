<?php
namespace Bas\classes;

use Bas\classes\Database;
use Bas\classes\TableHelper;

class Klant extends Database {

    private $table_name = "klanten";

    // ✅ HAAL ALLE KLANTEN OP
    public function getKlanten() : array {
        $sql = "SELECT * FROM {$this->table_name}";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // ✅ HAAL 1 KLANT OP
    public function getKlant(int $klantId) : array {
        $sql = "SELECT * FROM {$this->table_name} WHERE klantId = :klantId";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute(['klantId' => $klantId]);
        return $stmt->fetch();
    }

    // ✅ INSERT
    public function insertKlant($row) : bool {
        $sql = "INSERT INTO {$this->table_name}
                (klantNaam, klantEmail, klantAdres, klantPostcode, klantWoonplaats)
                VALUES
                (:klantNaam, :klantEmail, :klantAdres, :klantPostcode, :klantWoonplaats)";
        
        $stmt = self::$conn->prepare($sql);
        return $stmt->execute($row);
    }

    // ✅ UPDATE
    public function updateKlant($row) : bool {
        $sql = "UPDATE {$this->table_name} SET
                klantNaam = :klantNaam,
                klantEmail = :klantEmail,
                klantAdres = :klantAdres,
                klantPostcode = :klantPostcode,
                klantWoonplaats = :klantWoonplaats
                WHERE klantId = :klantId";

        $stmt = self::$conn->prepare($sql);
        return $stmt->execute($row);
    }

    // ✅ DELETE
    public function deleteKlant(int $klantId) : bool {
        $sql = "DELETE FROM {$this->table_name} WHERE klantId = :klantId";
        $stmt = self::$conn->prepare($sql);
        return $stmt->execute(['klantId' => $klantId]);
    }

    // ✅ TABEL TONEN
    public function showTable($lijst) : void {

        if (empty($lijst)) {
            echo "Geen klanten gevonden.";
            return;
        }

        echo "<table border='1'>";
        echo TableHelper::getTableHeader($lijst[0]);

        foreach($lijst as $row){
            echo "<tr>";
            echo "<td>{$row['klantId']}</td>";
            echo "<td>{$row['klantNaam']}</td>";
            echo "<td>{$row['klantEmail']}</td>";
            echo "<td>{$row['klantAdres']}</td>";
            echo "<td>{$row['klantPostcode']}</td>";
            echo "<td>{$row['klantWoonplaats']}</td>";

            echo "<td>
                <form method='get' action='update.php'>
                    <input type='hidden' name='klantId' value='{$row['klantId']}'>
                    <button type='submit'>Wijzigen</button>
                </form>
            </td>";

            echo "<td>
                <form method='post' action='delete.php?klantId={$row['klantId']}'>
                    <button type='submit'>Verwijderen</button>
                </form>
            </td>";

            echo "</tr>";
        }

        echo "</table>";
    }

    // ✅ CRUD OVERZICHT
    public function crudKlant() : void {
        $lijst = $this->getKlanten();
        $this->showTable($lijst);
    }
}
?>
