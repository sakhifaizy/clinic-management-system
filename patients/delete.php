<?php
include("../config/database.php");

$id = $_GET['id'];

$sql = "DELETE FROM patients WHERE id=$id";

if ($conn->query($sql)) {
    header("Location: list.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

?>