<?php session_start();
if (!isset($_SESSION['username'])) { header("Location: login.php"); exit();
}


$conn = new mysqli("localhost", "root", "", "irctc_clone"); if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
<title>User Profile</title>
<style> body { margin: 0;
padding: 0;
background: url('https://www.brittany.com.ph/wp-content/uploads/2023/01/The-Current-Status-of-the-Railway-System-in-the-Philippines-1024x640.jpg') no-repeat center center/cover;
font-family: Arial, sans-serif; color: white;
text-align: center;
}
.navbar {
background-color: #cc3333; padding: 15px 20px;
text-align: right;
}
.navbar a { color: white;
text-decoration: none; margin-left: 15px; font-weight: bold;
}
.profile-box {
max-width: 500px; margin: 50px auto; padding: 30px;
background-color: rgba(0, 0, 0, 0.85); border-radius: 15px;
box-shadow: 0 0 10px white;
}
h2 {
text-align: center; color: #ffd700;
}
.info {
margin: 20px 0; font-size: 18px; line-height: 1.6;
}
.info label {
font-weight: bold; color: #66ffcc;
}
</style>
</head>
<body>


<div class="navbar">
<a href="dashboard.php">⬅ Back to Dashboard</a>
</div>


<div class="profile-box">
<h2>User Profile</h2>
<div class="info">
<p><label>Name:</label> <?= htmlspecialchars($user['name']) ?></p>
<p><label>Date of Birth:</label> <?= htmlspecialchars($user['dob']) ?></p>
<p><label>Address:</label> <?= htmlspecialchars($user['address']) ?></p>
<p><label>City:</label> <?= htmlspecialchars($user['city']) ?></p>
<p><label>Phone Number:</label> <?= htmlspecialchars($user['phone']) ?></p>
<p><label>Email:</label> <?= htmlspecialchars($user['email']) ?></p>
<p><label>Username:</label> <?= htmlspecialchars($user['username']) ?></p>
</div>
</div>


</body>
</html>
