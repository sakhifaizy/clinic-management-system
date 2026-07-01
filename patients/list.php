<?php
include("../config/database.php");
include("../includes/header.php");
include("../includes/sidebar.php");

$result = $conn->query("SELECT * FROM patients");
?>

<h2>Patients List</h2>

<a href="add.php">Add New Patient</a>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Age</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Action</th>
    </tr>
<?php

$sql = "SELECT * FROM patients";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {  ?> 
    <tr>
        <td><?php   echo $row['id'] ?></td>
        <td><?php   echo $row['full_name'] ?></td>
        <td><?php   echo $row['gender'] ?></td>
        <td><?php   echo $row['age'] ?></td>
        <td><?php   echo $row['phone'] ?></td>
        <td><?php   echo $row['address'] ?></td>
        <td>
            <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
            <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    
 <?php } ?>
</table>

<?php
include("../includes/footer.php");
?>