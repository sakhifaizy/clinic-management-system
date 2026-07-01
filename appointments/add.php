<?php
session_start();
include("../config/database.php");
include("../includes/header.php");
include("../includes/sidebar.php");

if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit();
}

// Get patients
$patients = $conn->query("SELECT * FROM patients");

// Get doctors
$doctors = $conn->query("SELECT * FROM doctors");
?>

<?php

if (isset($_POST['save'])) {

    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $date = $_POST['appointment_date'];
    $notes = $_POST['notes'];

    $sql = "INSERT INTO appointments (patient_id, doctor_id, appointment_date, notes)
            VALUES ('$patient_id', '$doctor_id', '$date', '$notes')";

    if ($conn->query($sql)) {
        echo "Appointment saved successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<h2>Add Appointment</h2>

<form method="POST">

    <label>Patient:</label>
    <select name="patient_id" required>
        <?php while($p = $patients->fetch_assoc()) { ?>
            <option value="<?php echo $p['id']; ?>">
                <?php echo $p['full_name']; ?>
            </option>
        <?php } ?>
    </select>
    <br><br>

    <label>Doctor:</label>
    <select name="doctor_id" required>
        <?php while($d = $doctors->fetch_assoc()) { ?>
            <option value="<?php echo $d['id']; ?>">
                <?php echo $d['full_name']; ?>
            </option>
        <?php } ?>
    </select>
    <br><br>

    <label>Date:</label>
    <input type="date" name="appointment_date" required>
    <br><br>

    <label>Notes:</label>
    <textarea name="notes"></textarea>
    <br><br>

    <button type="submit" name="save">Save</button>
</form>