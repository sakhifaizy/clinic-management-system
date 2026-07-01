<?php
session_start();
include("../config/database.php");
include("../includes/header.php");
include("../includes/sidebar.php");

if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit();
}

$sql = "SELECT 
appointments.id,
patients.full_name AS patient,
doctors.full_name AS doctor,
appointments.appointment_date, appointments.status,
appointments.notes
FROM appointments
JOIN patients ON appointments.patient_id = patients.id
JOIN doctors ON appointments.doctor_id = doctors.id";

$result = $conn->query($sql);
?>
<h2>Appointments List</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Patient</th>
        <th>Doctor</th>
        <th>Date</th>
        <th>Notes</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

<?php while($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['patient']; ?></td>
        <td><?php echo $row['doctor']; ?></td>
        <td><?php echo $row['appointment_date']; ?></td>
        <td><?php echo $row['notes']; ?></td>
        <td>
        <?php
        if ($row['status'] == 'Pending') {
            echo "<span style='color:orange;'>Pending</span>";
        } elseif ($row['status'] == 'Completed') {
            echo "<span style='color:green;'>Completed</span>";
        } else {
            echo "<span style='color:red;'>Cancelled</span>";
        }
        ?>
        </td>
        <td>
            <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
            <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
<?php } ?>

</table>