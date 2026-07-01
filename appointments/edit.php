<?php
session_start();
include("../config/database.php");
include("../includes/header.php");
include("../includes/sidebar.php");

$id = $_GET['id'];

$sql = "SELECT * FROM appointments WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// patients & doctors
$patients = $conn->query("SELECT * FROM patients");
$doctors = $conn->query("SELECT * FROM doctors");

if(isset($_POST['update'])) {

    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $date = $_POST['appointment_date'];
    $status = $_POST['status'];

    $sql = "UPDATE appointments SET 
            patient_id='$patient_id',
            doctor_id='$doctor_id',
            appointment_date='$date',
            status='$status'
            WHERE id=$id";

    $conn->query($sql);

    header("Location: list.php");
    exit();
}
?>

<form method="POST">

<label>Patient:</label>
<select name="patient_id">
<?php while($p = $patients->fetch_assoc()) { ?>
<option value="<?php echo $p['id']; ?>"
<?php if($p['id'] == $row['patient_id']) echo "selected"; ?>>
<?php echo $p['full_name']; ?>
</option>
<?php } ?>
</select>
<br><br>

<label>Doctor:</label>
<select name="doctor_id">
<?php while($d = $doctors->fetch_assoc()) { ?>
<option value="<?php echo $d['id']; ?>"
<?php if($d['id'] == $row['doctor_id']) echo "selected"; ?>>
<?php echo $d['full_name']; ?>
</option>
<?php } ?>
</select>
<br><br>

<label>Date:</label>
<input type="date" name="appointment_date" value="<?php echo $row['appointment_date']; ?>">
<br><br>

<label>Status:</label>
<select name="status">
    <option <?php if($row['status']=="Pending") echo "selected"; ?>>Pending</option>
    <option <?php if($row['status']=="Completed") echo "selected"; ?>>Completed</option>
    <option <?php if($row['status']=="Cancelled") echo "selected"; ?>>Cancelled</option>
</select>
<br><br>

<button type="submit" name="update">Update</button>
</form>