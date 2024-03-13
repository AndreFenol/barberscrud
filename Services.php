<?php

class Service {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    // replace "services" with table name from db
    public function createService($type, $duration, $price) {
        $stmt = $this->db->prepare("INSERT INTO services (type, duration, price) VALUES (?, ?, ?)");
        return $stmt->execute([$type, $duration, $price]);
    }

    public function getServices() {
        $stmt = $this->db->query("SELECT * FROM 'service'"); 
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateService($id, $type, $duration, $price) {
        $stmt = $this->db->prepare("UPDATE services SET type = ?, duration = ?, price = ? WHERE id = ?");
        return $stmt->execute([$type, $duration, $price, $id]);
    }

    public function deleteService($id) {
        $stmt = $this->db->prepare("DELETE FROM services WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
