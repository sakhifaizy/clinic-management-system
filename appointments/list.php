<?php
include("../config/database.php");
include("../includes/header.php");
include("../includes/sidebar.php");

$result = $conn->query("SELECT appointments.*, patients.name AS patient_name
FROM appointments
INNER JOIN patients
ON appointments.patient_id = patients.id");
?>

<h2>Appointments</h2>

<a href="add.php">Add Appointment</a>

<table border="1">
<tr>
    <th>Patient Name</th>
    <th>Doctor</th>
    <th>Date</th>
    <th>Time</th>
    <th>Notes</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>
<tr>
    <td><?php echo $row['patient_name']; ?></td>
    <td><?php echo $row['doctor_name']; ?></td>
    <td><?php echo $row['appointment_date']; ?></td>
    <td><?php echo $row['appointment_time']; ?></td>
    <td><?php echo $row['notes']; ?></td>
</tr>
<?php } ?>

</table>

<?php
include("../includes/footer.php");
?>