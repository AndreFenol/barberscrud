<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Appointment</title>
</head>
<body>
    <h2>Add Appointment</h2>
    <form action="../index.php?action=addAppointment" method="POST">
        <label for="customerName">Customer Name:</label><br>
        <input type="text" id="customerName" name="customerName" required><br>
        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date" required><br>
        <label for="time">Time:</label><br>
        <input type="time" id="time" name="time" required><br>
        <label for="serviceID">Service:</label><br>
        
        <select name="serviceID" id="serviceID" required>
            <?php
            require_once('../includes/db.php');

            try {
                $stmt = $db->query("SELECT * FROM 'service'");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row['serviceID'] . "'>" . $row['serviceName'] . "</option>";
                }
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
        </select><br>
        <label for="barberID">Barber:</label><br>
        <select name="barberID" id="barberID" required>
            <?php
            try {
                $stmt = $db->query("SELECT * FROM barber");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row['barberID'] . "'>" . $row['barberName'] . "</option>";
                }
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
        </select><br>
        <input type="submit" value="Add Appointment">
    </form>

    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["customerName"], $_POST["date"], $_POST["time"], $_POST["serviceID"], $_POST["barberID"])) {
        $customerName = $_POST["customerName"];
        $date = $_POST["date"];
        $time = $_POST["time"];
        $serviceID = $_POST["serviceID"];
        $barberID = $_POST["barberID"];

        require_once('../includes/db.php');

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
    ?>
</body>
</html>
</body>
</html>


