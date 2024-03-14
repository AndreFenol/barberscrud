<?php

require_once('../includes/db.php');
require_once('../app/models/Barbers.php');
require_once('../app/models/Services.php');
require_once('../app/models/Appointments.php');

class AdminController {
    private $barberModel;
    private $serviceModel;
    private $appointmentModel;

    public function __construct($db) {
        $this->barberModel = new Barber($db);
        $this->serviceModel = new Service($db);
        $this->appointmentModel = new Appointment($db);
    }

    public function addBarber($name) {
        return $this->barberModel->createBarber($name);
    }

    public function getBarbers() {
        return $this->barberModel->getBarbers();
    }

    public function updateBarber($id, $name) {
        return $this->barberModel->updateBarber($id, $name);
    }

    public function deleteBarber($id) {
        return $this->barberModel->deleteBarber($id);
    }

    // Services CRUD methods
    public function addService($type, $duration, $price) {
        return $this->serviceModel->createService($type, $duration, $price);
    }

    public function getServices() {
        return $this->serviceModel->getServices();
    }

    public function updateService($id, $type, $duration, $price) {
        return $this->serviceModel->updateService($id, $type, $duration, $price);
    }

    public function deleteService($id) {
        return $this->serviceModel->deleteService($id);
    }

    // Appointments CRUD methods
    public function addAppointment($customerName, $serviceID, $barberID, $date, $time, $duration, $price) {
        return $this->appointmentModel->createAppointment($customerName, $serviceID, $barberID, $date, $time, $duration, $price);
    }

    public function getAppointments() {
        return $this->appointmentModel->getAppointments();
    }

    public function updateAppointment($id, $customerName, $serviceID, $barberID, $date, $time, $duration, $price) {
        return $this->appointmentModel->updateAppointment($id, $customerName, $serviceID, $barberID, $date, $time, $duration, $price);
    }

    public function deleteAppointment($id) {
        return $this->appointmentModel->deleteAppointment($id);
    }
}
?>