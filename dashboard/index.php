<?php
session_start();
include("../config/database.php");

if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit();
}
include("../includes/header.php");
include("../includes/sidebar.php");

// Counts
$patients = $conn->query("SELECT COUNT(*) as total FROM patients")->fetch_assoc();
$doctors = $conn->query("SELECT COUNT(*) as total FROM doctors")->fetch_assoc();
$appointments = $conn->query("SELECT COUNT(*) as total FROM appointments")->fetch_assoc();


?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        .box {
            width: 250px;
            display: inline-block;
            margin: 10px;
            padding: 20px;
            background: #3498db;
            color: white;
            text-align: center;
            font-family: "pinkAndGray";
            font-size: 30px;
            font-weight: bold;
            border-radius: 10px;
        }
    </style>
</head>
    <body>

        <h2>Hospital Dashboard</h2>

        <div class="box">
            <h3>Patients</h3>
            <p><?php echo $patients['total']; ?></p>
        </div>

        <div class="box">
            <h3>Doctors</h3>
            <p><?php echo $doctors['total']; ?></p>
        </div>

        <div class="box">
            <h3>Appointments</h3>
            <p><?php echo $appointments['total']; ?></p>
        </div>

        <br>

    </body>
</html>

<?php
include("../includes/footer.php");
?>