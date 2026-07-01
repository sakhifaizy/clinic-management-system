<?php
include("../config/database.php");

$id = $_GET['id'];

$sql = "DELETE FROM appointments WHERE id=$id";

$conn->query($sql);

header("Location: list.php");
exit();
?>