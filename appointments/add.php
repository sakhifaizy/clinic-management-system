<?php
include("../config/database.php");
include("../includes/header.php");
include("../includes/sidebar.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $patient_id = $_POST['patient_id'];
    $doctor_name = $_POST['doctor_name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $notes = $_POST['notes'];

    $sql = "INSERT INTO appointments (patient_id, doctor_name, appointment_date, appointment_time, notes)
            VALUES ('$patient_id', '$doctor_name', '$date', '$time', '$notes')";

    $conn->query($sql);

    header("Location: list.php");
}
?>

<h2>Add Appointment</h2>

<form method="POST">

    <?php        $patients = $conn->query("SELECT * FROM patients");       ?>

        <label>Select Patient:</label>
<select name="patient_id">

        <?php while($p = $patients->fetch_assoc()) { ?>

            <option value="<?php echo $p['id']; ?>">
                <?php echo $p['name']; ?>
            </option>

        <?php } ?>

</select><br>

    Doctor Name:
    <input type="text" name="doctor_name"><br>

    Date:
    <input type="date" name="date"><br>

    Time:
    <input type="time" name="time"><br>

    Notes:
    <textarea name="notes"></textarea><br>

    <button type="submit">Save</button>
</form>

<?php
include("../includes/footer.php");
?>