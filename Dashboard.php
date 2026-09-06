<?php session_start();

// Redirect if not logged in
if (!isset($_SESSION['username'])) { header("Location: login.php"); exit();
}


// Get username
$username = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Dashboard - Railway Reservation</title>
<style> body { margin: 0;
padding: 0;
background: url('http://egov.eletsonline.com/wp-content/uploads/2017/06/railway-station.jpg') no-repeat center center/cover;
font-family: Arial, sans-serif; color: white;
text-align: center;
}
.navbar {
background-color: #cc3333; padding: 15px;
}
.navbar a { color: white;
text-decoration: none; margin: 0 15px;
font-size: 18px; font-weight: bold;
}
.navbar a:hover {
text-decoration: underline;
}
.container { margin-top: 60px;
background-color: rgba(0, 0, 0, 0.85); padding: 40px;
width: 400px; margin-left: auto; margin-right: auto; border-radius: 15px;
box-shadow: 0 0 15px rgba(255, 255, 255, 0.3);
}
h1 {
color: #ffd700;
}
.option-box { background: #222; padding: 20px; margin: 20px auto; width: 90%;
border-radius: 10px; cursor: pointer;
font-size: 20px; font-weight: bold; transition: 0.3s;
}
.option-box:hover { background: #cc3333;
}
.option-box a {
color: white;
text-decoration: none;
}
.welcome-msg { font-size: 18px;
margin-bottom: 20px; color: lightgreen;
}
</style>
</head>
<body>


<div class="navbar">
<div class="left">
<a href="index.php"> ,m“_ Home</a>
</div>
<div class="right">
<a href="profile.php">¨❢ ˆ View Profile</a>
<a href="logout.php">l_˙÷ · Logout</a>
</div>
</div>


<div class="container">
<h1>Welcome to Your Dashboard</h1>
<p class="welcome-msg">Hello, <strong><?= htmlspecialchars($username) ?></strong>
$  </p>


<div class="option-box"><a href="my_bookings.php"> K¯-_ _   Book a Ticket</a></div>
<div class="option-box"><a href="cancel.php">+ Cancel a Ticket</a></div>
</div>


</body>
</html>
