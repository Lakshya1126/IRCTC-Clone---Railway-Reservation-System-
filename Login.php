
<?php 
session_start();
$error = '';
$success = '';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$conn = new mysqli('localhost', 'root', '', 'irctc_clone'); if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$username = $_POST['username'];
$password = $_POST['password'];


// Check user in DB
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);


if ($result && $result->num_rows == 1) {
$row = $result->fetch_assoc();
if (password_verify($password, $row['password'])) {
$_SESSION['username'] = $username; header('Location: dashboard.php'); exit();
} else {
$error = "Incorrect password.";
}
} else {
$error = "User not found.";
}


$conn->close();
}
?>


<!DOCTYPE html>
<html>
<head>
<title>User Login</title>
<style>
body { margin: 0;
font-family: Arial, sans-serif;
background: url('https://wallpapercave.com/wp/wp498614.jpg') no-repeat center center/cover;
color: #fff;
}
.container {
background-color: rgba(0, 0, 0, 0.85); padding: 30px;
width: 350px; margin: 60px auto; border-radius: 15px;
box-shadow: 0 0 15px rgba(255, 255, 255, 0.3);
}
h2 {
text-align: center; color: #ffd700;
}
label {
font-weight: bold; margin-top: 10px; display: block;
}
input[type="text"], input[type="password"] { width: 100%;
padding: 10px; margin-top: 5px; border: none;
border-radius: 8px; background-color: #222; color: white;
}
input[type="submit"] { width: 100%;
padding: 12px; margin-top: 20px;
background-color: #06d6a0; border: none;
color: white; font-size: 16px;
border-radius: 10px; cursor: pointer;
}
input[type="submit"]:hover { background-color: #04b08a;
}
.message {
text-align: center; margin-top: 10px; font-weight: bold;
}
.success {
color: lightgreen;
}
.error {
color: #ff6b6b;
}
.buttons {
display: flex;
justify-content: space-between; margin-top: 20px;
}
.buttons a {
text-decoration: none; background-color: #457b9d; padding: 10px 15px;
border-radius: 8px; color: white;
font-weight: bold;
}
.buttons a:hover { background-color: #1d3557;
}
</style>
</head>
<body>


<div class="container">
<h2>User Login</h2>
<?php if ($success): ?>
<div class="message success"><?= $success ?></div>
<?php elseif ($error): ?>
<div class="message error"><?= $error ?></div>
<?php endif; ?>


<form method="post" action="login.php">
<label>Username</label>
<input type="text" name="username" required>
<label>Password</label>
<input type="password" name="password" required>


<input type="submit" value="Login">
</form>


<div class="buttons">
<a href="index.php"> ,m“_ Homepage</a>
<a href="register.php">’ ˙),‘f Register</a>
</div>
</div>


</body>
</html>
