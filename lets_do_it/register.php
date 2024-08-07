<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'to-do app');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();

    $_SESSION['user'] = $email;
    header("Location: login.php");
    exit();
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="login_register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />
</head>
<body>
    <div id = "header">
        <div class="flexrow-container">
            <div class="standard-theme theme-selector"></div>
            <div class="light-theme theme-selector"></div>
            <div class="darker-theme theme-selector"></div>
        </div>
    </div>
    <form method="POST" action="register.php">
        <h2>Register</h2>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="register">Register</button>
        <a href="login.php">Already have an account? Login here</a>
    </form>
    <script src="JS/main.js" type="text/javascript"></script>
</body>
</html>
