<?php

class Barber {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    // replace "barbers" with table name from db
    public function createBarber($name) {
        $stmt = $this->db->prepare("INSERT INTO barber (barbername) VALUES (?)");
        return $stmt->execute([$name]);
    }

    public function getBarbers() {
        $stmt = $this->db->query("SELECT * FROM barber"); 
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateBarber($id, $name) {
        $stmt = $this->db->prepare("UPDATE barber SET name = ? WHERE id = ?");
        return $stmt->execute([$name, $id]);
    }

    public function deleteBarber($id) {
        $stmt = $this->db->prepare("DELETE FROM barber WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
$barberModel = new Barber($db);
?>
