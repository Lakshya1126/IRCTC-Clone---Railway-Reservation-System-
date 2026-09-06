<?php session_start(); include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$username = $_POST['username'];
$password = $_POST['password'];
if ($username === 'admin' && $password === 'admin123') {
$_SESSION['admin_logged_in'] = true; header("Location: admin_dashboard.php"); exit();
} else {
$error = "Invalid credentials!";
}
}
?>


<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<style> body {
background-image: url('https://aniportalimages.s3.amazonaws.com/media/details/ANI-20221223164007.jfif');
background-size: cover; background-repeat: no-repeat; color: white;
font-family: Arial, sans-serif; text-align: center;
padding-top: 100px;
}
.container {
background: rgba(0, 0, 0, 0.6); padding: 20px;
margin: auto; width: 300px;
border-radius: 10px;
}
input, button { width: 90%; padding: 10px; margin: 5px 0; border-radius: 5px;
}
button {
background-color: #28a745; color: white;
border: none;
}
.error { color: red;
}
</style>
</head>
<body>
<div class="container">
<h2>Admin Login</h2>
<?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
<form method="POST">
<input type="text" name="username" placeholder="Username" required><br><br>
<input type="password" name="password" placeholder="Password" required><br><br>
<button type="submit">Login</button>
</form>
</div>
</body>
</html>
