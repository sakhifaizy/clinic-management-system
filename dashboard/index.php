<?php
include("../includes/db.php");
include("../includes/header.php");
include("../includes/sidebar.php");

// Counts
$patients = $conn->query("SELECT COUNT(*) as total FROM patients")->fetch_assoc();
$appointments = $conn->query("SELECT COUNT(*) as total FROM appointments")->fetch_assoc();
?>

        <!-- Content -->
<div class="col-md-10 p-4">
    <div class="row">

        <div class="col-md-4">
            <div class="card text-bg-success mb-3">
                <div class="card-body">
                    <h5>Patients</h5>
                    <h2><?php echo $patients['total']; ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-bg-primary mb-3">
                <div class="card-body">
                    <h5>Appointments</h5>
                    <h2><?php echo $appointments['total']; ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("../includes/footer.php");
?>