<?php
include("../config/database.php");
include("../includes/header.php");
include("../includes/sidebar.php");

$result = $conn->query("SELECT * FROM patients");
?>

<h2>Patients List</h2>

<a href="add.php">Add New Patient</a>

<table border="1">
    <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Phone</th>
        <th>Action</th>
    </tr>

    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['age']; ?></td>
        <td><?php echo $row['gender']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td>
            <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
            <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>

<?php
include("../includes/footer.php");
?>