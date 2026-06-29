<?php
include("../includes/db.php");
include("../includes/header.php");
include("../includes/sidebar.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "INSERT INTO patients (name, age, gender, phone, address)
            VALUES ('$name', '$age', '$gender', '$phone', '$address')";

    $conn->query($sql);

    header("Location: list.php");
}
?>

<h2>Add Patient</h2>

<form method="POST">
    <input type="text" name="name" placeholder="Name"><br>
    <input type="number" name="age" placeholder="Age"><br>
    <input type="text" name="gender" placeholder="Gender"><br>
    <input type="text" name="phone" placeholder="Phone"><br>
    <textarea name="address" placeholder="Address"></textarea><br>

    <button type="submit">Save</button>
</form>

<?php
include("../includes/footer.php");
?>