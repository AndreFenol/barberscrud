<?php
require_once('includes/db.php');

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'addAppointment':
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["customerName"], $_POST["date"], $_POST["time"], $_POST["serviceID"], $_POST["barberID"])) {
            $customerName = $_POST["customerName"];
            $date = $_POST["date"];
            $time = $_POST["time"];
            $serviceID = $_POST["serviceID"];
            $barberID = $_POST["barberID"];

            try {
                $stmt = $db->prepare("INSERT INTO appointments (customerName, serviceID, barberID, appointmentDate, appointmentTime) VALUES (:customerName, :serviceID, :barberID, :appointmentDate, :appointmentTime)");
                $stmt->bindParam(':customerName', $customerName);
                $stmt->bindParam(':serviceID', $serviceID);
                $stmt->bindParam(':barberID', $barberID);
                $stmt->bindParam(':appointmentDate', $date);
                $stmt->bindParam(':appointmentTime', $time);
                $stmt->execute();

                echo "Appointment added successfully.";
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        break;

    // Add other cases for different actions if needed

    default:
        // Default action if no action is specified
        // You can add additional logic here if needed
        break;
}
?>
