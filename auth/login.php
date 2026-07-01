<?php
session_start();
include("../config/database.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        $_SESSION['user'] = $row['id'];

        header("Location: ../dashboard/index.php");
        exit();

    } else {
        $error = "Invalid login details!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hospital Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="login-container">
    <h2>Hospital Management System</h2>
    <form action="" method="POST">
    <?php if(isset($error)) { ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php } ?>
        <input type="text" placeholder="User name" name="username" required>
        <input type="password" placeholder="Password" name="password" required>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>




