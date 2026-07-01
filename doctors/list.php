<?php
include("../config/database.php");
include("../includes/header.php");
include("../includes/sidebar.php");

$result = $conn->query("SELECT * FROM doctors");
?>

<h2>Doctors List</h2>

<a href="add.php">Add Doctors</a>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Name</th>
        <th>specialization</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['specialization']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['status']; ?></td>
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