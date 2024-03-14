<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
    <h2>Admin Panel</h2>
    
    <!-- Add form for adding barbers -->
    <h3>Add Barber</h3>
    <form action="admin.php?action=addBarber" method="POST">
        <input type="text" name="name" placeholder="Barber Name" required>
        <input type="submit" value="Add Barber">
    </form>

    <!-- Add form for adding services -->
    <h3>Add Service</h3>
    <form action="admin.php?action=addService" method="POST">
        <input type="text" name="type" placeholder="Service Type" required>
        <input type="number" name="duration" placeholder="Duration (minutes)" required>
        <input type="number" name="price" placeholder="Price" required>
        <input type="submit" value="Add Service">
    </form>

    <!-- Display appointments -->
    <h3>Appointments</h3>
    <table>
        <thead>
            <tr>
                <th>Customer ID</th>
                <th>Barber ID</th>
                <th>Service ID</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php if(isset($appointments)): ?>
                <?php foreach ($appointments as $appointmentModel): ?>
                    <tr>
                        <td><?php echo $appointment['customer_id']; ?></td>
                        <td><?php echo $appointment['barber_id']; ?></td>
                        <td><?php echo $appointment['service_id']; ?></td>
                        <td><?php echo $appointment['adate']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>

<?php
require_once 'db.php';
require_once 'Barbers.php'; 
require_once 'Services.php';
require_once 'Appointments.php';

if(isset($_GET['action'])) {
    $action = $_GET['action'];

    if($action == 'addBarber') {
        $name = $_POST['name'];
        $barberModel->createBarber($name);
        header("Location: admin.php");
    } elseif($action == 'addService') {
        $type = $_POST['type'];
        $duration = $_POST['duration'];
        $price = $_POST['price'];
        $serviceModel->createService($type, $duration, $price);
        header("Location: admin.php");
    }
}



?>
