<?php
include 'config.php';

$name = $_POST['name'];
$age = $_POST['age'];
$disease = $_POST['disease'];

$sql = "INSERT INTO patients (name, age, disease)
        VALUES ('$name', '$age', '$disease')";

if ($conn->query($sql) === TRUE) {
    echo "Patient added successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>