<?php
include("../config/database.php");
include("../includes/header.php");
include("../includes/sidebar.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $specialization = $_POST['specialization'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $status = $_POST['status'];

    $sql = "INSERT INTO doctors (name, specialization, phone, email, status)
            VALUES ('$name', '$specialization', '$phone', '$email', '$status')";

    $conn->query($sql);

    header("Location: list.php");
}
?>

<h2>Add Doctors</h2>

<form method="POST">
    <input type="text" name="name" placeholder="Name"><br>
    <input type="text" name="specialization" placeholder="specialization"><br>
    <input type="text" name="phone" placeholder="Phone"><br>
    <input type="email" name="email" placeholder="Email"><br>
     <select name="status" id="status" class="form-select">
        <option value="">-- Select Status --</option>
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
    </select>

    <button type="submit">Save</button>
</form>

<?php
include("../includes/footer.php");
?>