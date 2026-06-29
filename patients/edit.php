<?php
include("../includes/db.php");
include("../includes/header.php");
include("../includes/sidebar.php");

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM patients WHERE id=$id");
$row = $result->fetch_assoc();

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "UPDATE patients SET
            name='$name',
            age='$age',
            gender='$gender',
            phone='$phone',
            address='$address'
            WHERE id=$id";

    $conn->query($sql);

    header("Location: list.php");
}
?>

<h2>Edit Patient</h2>

<form method="POST">
    <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
    <input type="number" name="age" value="<?php echo $row['age']; ?>"><br>
    <input type="text" name="gender" value="<?php echo $row['gender']; ?>"><br>
    <input type="text" name="phone" value="<?php echo $row['phone']; ?>"><br>
    <textarea name="address"><?php echo $row['address']; ?></textarea><br>

    <button type="submit">Update</button>
</form>
<?php
include("../includes/footer.php");
?>