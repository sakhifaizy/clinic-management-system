<?php
include("../config/database.php");

$id = $_GET['id'];

$sql = "DELETE FROM doctors WHERE id=$id";
$conn->query($sql);

header("Location: list.php");
?>