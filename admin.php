<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <!-- CSS link -->
</head>
<body>
    <h2>Admin Panel</h2>
    
    <!-- Add forms for adding barbers, services, and appointments -->
    <h3>Add Barber</h3>
    <form action="../index.php?action=addBarber" method="POST">
        <input type="text" name="name" placeholder="Barber Name" required>
        <input type="submit" value="Add Barber">
    </form>

    <h3>Add Service</h3>
    <form action="../index.php?action=addService" method="POST">
        <input type="text" name="type" placeholder="Service Type" required>
        <input type="number" name="duration" placeholder="Duration (minutes)" required>
        <input type="number" name="price" placeholder="Price" required>
        <input type="submit" value="Add Service">
    </form>


    <!-- Add table to display appointments -->
    <h3>Appointments</h3>
    <table>
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Service</th>
                <th>Barber</th>
                <th>Date</th>
                <th>Time</th>
                <th>Duration</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appointments as $appointment): ?>
                <tr>
                    <td><?php echo $appointment['customer_name']; ?></td>
                    <td><?php echo $appointment['service']; ?></td>
                    <td><?php echo $appointment['barber']; ?></td>
                    <td><?php echo $appointment['date']; ?></td>
                    <td><?php echo $appointment['time']; ?></td>
                    <td><?php echo $appointment['duration']; ?></td>
                    <td><?php echo $appointment['price']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
