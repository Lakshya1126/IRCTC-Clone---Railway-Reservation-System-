<?php
$success = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$conn = new mysqli('localhost', 'root', '', 'irctc_clone');


if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


// Collect input safely
$name = htmlspecialchars($_POST['name']);
$dob = $_POST['dob'];
$address = htmlspecialchars($_POST['address']);
$city = htmlspecialchars($_POST['city']);
$pin = $_POST['pin'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$username = htmlspecialchars($_POST['username']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
// Save to database
$sql = "INSERT INTO users (name, dob, address, city, pin, phone, email, username, password)
VALUES ('$name', '$dob', '$address', '$city', '$pin', '$phone', '$email', '$username', '$password')";


if ($conn->query($sql) === TRUE) {
$success = true;
}


$conn->close();
}
?>


<!DOCTYPE html>
<html>
<head>
<title>User Registration</title>
<style> body { margin: 0;
font-family: Arial, sans-serif;
background: url('https://i.ytimg.com/vi/T33kRRSflA8/maxresdefault.jpg') no-repeat center center/cover;
color: #fff;
}
.container {
background-color: rgba(0,0,0,0.85); padding: 30px;
width: 400px; margin: 60px auto;
border-radius: 15px;
box-shadow: 0 0 15px rgba(255, 255, 255, 0.3);
}
h2 {
text-align: center; color: #ffd700;
}
label {
font-weight: bold; margin-top: 10px; display: block;
}
input[type="text"], input[type="email"], input[type="password"], input[type="date"] { width: 100%;
padding: 10px; margin-top: 5px; border: none; border-radius: 8px;
background-color: #222; color: white;
}
input[type="submit"] { width: 100%;
padding: 12px; margin-top: 20px;
background-color: #e63946; border: none;
color: white; font-size: 16px;
border-radius: 10px; cursor: pointer;
}
input[type="submit"]:hover { background-color: #d62828;
}
.message { color: lightgreen;
text-align: center; margin-top: 10px; font-weight: bold;
}
.buttons { display: flex;
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
<h2>User Registration</h2>
<?php if ($success): ?>
<div class="message">User registered successfully!</div>
<?php endif; ?>
<form method="post" action="register.php">
<label>Name</label>
<input type="text" name="name" pattern="[A-Za-z\s]+" title="Only letters and spaces allowed" required>


<label>Date of Birth</label>
<input type="date" name="dob" required>


<label>Address</label>
<input type="text" name="address" required>


<label>City</label>
<input type="text" name="city" pattern="[A-Za-z\s]+" title="Only letters and spaces allowed" required>


<label>Pin Code</label>
<input type="text" name="pin" pattern="\d{6}" title="Enter a valid 6-digit pin code" required>


<label>Phone Number</label>
<input type="text" name="phone" pattern="\d{10}" title="Enter a valid 10-digit phone number" required>
<label>Email ID</label>
<input type="email" name="email" required>


<label>Username</label>
<input type="text" name="username" required>


<label>Password</label>
<input type="password" name="password" required>


<input type="submit" value="Register">
</form>


<div class="buttons">
<a href="index.php">“_m ,  Homepage</a>
<a href="login.php">’j. ¡˙µ) Login</a>
</div>
</div>


</body>
</html>
