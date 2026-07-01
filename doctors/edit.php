<?php
include("../config/database.php");
include("../includes/header.php");
include("../includes/sidebar.php");

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM doctors WHERE id=$id");
$row = $result->fetch_assoc();

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $full_name = $_POST['full_name'];
    $specialization = $_POST['specialization'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $status = $_POST['status'];

    $sql = "UPDATE doctors SET
            full_name='$full_name',
            specialization='$specialization',
            phone='$phone',
            email='$email',
            status='$status'
            WHERE id=$id";

    $conn->query($sql);

    header("Location: list.php");
}
?>

<h2>Edit Doctors</h2>

<form method="POST">
    <input type="text" name="full_name" placeholder="Name"><br>
    <input type="text" name="specialization" placeholder="specialization"><br>
    <input type="text" name="phone" placeholder="Phone"><br>
    <input type="email" name="email" placeholder="Email"><br>
     <select name="status" id="status" class="form-select">
        <option value="">-- Select Status --</option>
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
    </select>

    <button type="submit">Update</button>
</form>
<?php
include("../includes/footer.php");
?>