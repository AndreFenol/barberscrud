<?php

class Appointment {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createAppointment($customerName, $serviceID, $barberID, $date, $time, $duration, $price) {
        $stmt = $this->db->prepare("INSERT INTO appointment (customer_name, service_id, barber_id, date, time, duration, price) VALUES (?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$customerName, $serviceID, $barberID, $date, $time, $duration, $price]);
    }

    public function getAppointments() {
        $stmt = $this->db->query("SELECT a.id, a.customer_name, s.type as service, b.name as barber, a.date, a.time, a.duration, a.price FROM appointment a JOIN services s ON a.service_id = s.id JOIN barbers b ON a.barber_id = b.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateAppointment($id, $customerName, $serviceID, $barberID, $date, $time, $duration, $price) {
        $stmt = $this->db->prepare("UPDATE appointment SET customer_name = ?, service_id = ?, barber_id = ?, date = ?, time = ?, duration = ?, price = ? WHERE id = ?");
        return $stmt->execute([$customerName, $serviceID, $barberID, $date, $time, $duration, $price, $id]);
    }

    public function deleteAppointment($id) {
        $stmt = $this->db->prepare("DELETE FROM appointment WHERE id = ?");
        return $stmt->execute([$id]);
    }
}

?>
