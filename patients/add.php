<?php
include("../config/database.php");
include("../includes/header.php");
include("../includes/sidebar.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $full_name = $_POST['full_name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "INSERT INTO patients (full_name, age, gender, phone, address)
            VALUES ('$full_name', '$age', '$gender', '$phone', '$address')";


     if ($conn->query($sql)) {
        echo "Patient added successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<h2>Add Patient</h2>

<form method="POST">
    <input type="text" name="full_name" placeholder="Name"><br>
    Gender:
    <select name="gender">
        <option>Male</option>
        <option>Female</option>
    </select><br><br>
    <input type="number" name="age" placeholder="Age"><br>
    <input type="text" name="phone" placeholder="Phone"><br>
    <textarea name="address" placeholder="Address"></textarea><br>

    <button type="submit">Save</button>
</form>

<?php
include("../includes/footer.php");
?>