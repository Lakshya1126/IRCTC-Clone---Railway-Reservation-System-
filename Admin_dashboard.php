

<?php include "session.php"; ?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<style> body {
background-image: url('https://oss.seetao.com/upload/image/20220120/a34bf85034b087638b3ba0cf9ecded1d.jpe g');
background-size: cover; background-repeat: no-repeat; background-position: center; color: white;
font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0;
padding: 0; display: flex;
justify-content: center; align-items: center; height: 100vh;
}


.dashboard {
background: rgba(0, 0, 0, 0.7); padding: 40px;
border-radius: 20px;
text-align: center; width: 90%;
max-width: 500px;
box-shadow: 0 0 20px rgba(255,255,255,0.2); animation: fadeIn 1s ease-in-out;
}


.dashboard h1 { margin-bottom: 30px; font-size: 28px; color: #00ffff;
}


.dashboard a { display: block; margin: 10px auto; padding: 15px 25px; width: 80%;
text-decoration: none; color: white;
background: linear-gradient(to right, #007bff, #00c6ff); border-radius: 30px;
font-size: 18px; font-weight: bold;
transition: transform 0.2s ease, background 0.3s ease; box-shadow: 0 5px 15px rgba(0,0,0,0.3);
}


.dashboard a:hover { transform: scale(1.05);
background: linear-gradient(to right, #00c6ff, #007bff);
}


@keyframes fadeIn {
from { opacity: 0; transform: translateY(-20px); } to { opacity: 1; transform: translateY(0); }
}
</style>
</head>
<body>
<div class="dashboard">
<h1>Welcome to Admin Dashboard</h1>
<a href="add_train.php">+ Add Train</a>
<a href="update_train.php">⬛“ Update Train</a>
<a href="deleat_train.php">+ Delete Train</a>
<a href="view_booking.php">´ f   View Booked Tickets</a>
<a href="train_details.php">;'u¨†    Train Details (Logs)</a>
<a href="logout.php">l_·÷ _˙   Logout</a>
</div>
</body>
</html>
