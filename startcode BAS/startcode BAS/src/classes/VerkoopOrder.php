<?php

namespace Bas\classes;

use Bas\classes\Database;

class VerkoopOrder {

    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM verkooporder";
        return $this->db->query($sql)->fetchAll();
    }

    // ✅ INSERT
    public function insertVerkooporder($row) : bool {

        $sql = "INSERT INTO verkooporder
                (klantId, artId, verkOrdDatum, verkOrdBestAantal, verkOrdStatus)
                VALUES
                (:klantId, :artId, :verkOrdDatum, :verkOrdBestAantal, :verkOrdStatus)";

        $stmt = $this->db->prepare($sql); // 🔥 FIX HIER

        return $stmt->execute([
            ':klantId' => $row['klantId'],
            ':artId' => $row['artId'],
            ':verkOrdDatum' => $row['verkOrdDatum'],
            ':verkOrdBestAantal' => $row['verkOrdBestAantal'],
            ':verkOrdStatus' => $row['verkOrdStatus']
        ]);
    }
public function getVerkoopOrder(int $id)
{
    $sql = "SELECT * FROM verkooporder WHERE verkOrdId = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(['id' => $id]);

    return $stmt->fetch();
}
    public function crudVerkoopOrder()
    {
        $sql = "SELECT * FROM verkooporder";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function updateVerkooporder($row) : bool {

    $sql = "UPDATE verkooporder SET
            klantId = :klantId,
            artId = :artId,
            verkOrdDatum = :verkOrdDatum,
            verkOrdBestAantal = :verkOrdBestAantal,
            verkOrdStatus = :verkOrdStatus
            WHERE verkOrdId = :verkOrdId";

    $stmt = $this->db->prepare($sql);

    return $stmt->execute([
        ':verkOrdId' => $row['verkOrdId'],
        ':klantId' => $row['klantId'],
        ':artId' => $row['artId'],
        ':verkOrdDatum' => $row['verkOrdDatum'],
        ':verkOrdBestAantal' => $row['verkOrdBestAantal'],
        ':verkOrdStatus' => $row['verkOrdStatus']
    ]);
}
public function getKlanten() {

    $sql = "SELECT klantId, klantNaam FROM klanten";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll();
}
public function getArtikelen() {

    $sql = "SELECT artId, artOmschrijving FROM artikelen";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll();
}

public function deleteVerkooporder(int $id) : bool {

    $sql = "DELETE FROM verkooporder WHERE verkOrdId = :id";
    $stmt = $this->db->prepare($sql);

    return $stmt->execute([':id' => $id]);
}
}
?>
