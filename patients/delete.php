<?php
include("../includes/db.php");

$id = $_GET['id'];

$sql = "DELETE FROM patients WHERE id=$id";
$conn->query($sql);

header("Location: list.php");
?>