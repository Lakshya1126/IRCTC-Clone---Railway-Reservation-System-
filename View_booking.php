<?php
include "session.php"; include "db.php";
?>


<!DOCTYPE html>
<html>
<head>
<title>All Bookings (Admin View)</title>
<style> body {
background-image: url('https://www.brittany.com.ph/wp-content/uploads/2023/01/Railway-System-in-the-Philippines.jpg');
background-size: cover;
font-family: Arial, sans-serif; color: white;
padding: 50px; text-align: center;
}


table { width: 95%; margin: auto;
border-collapse: collapse; background-color: rgba(0, 0, 0, 0.75);
}


th, td { padding: 12px;
border: 1px solid #ccc; text-align: center;
}


th {
background-color: #007bff;
}
.back-button { display: inline-block; margin-top: 25px; padding: 10px 20px;
background-color: #28a745; color: white;
border-radius: 5px; text-decoration: none; font-weight: bold;
}


.back-button:hover { background-color: #1e7e34;
}
</style>
</head>
<body>
<h1>f´  All Booked Tickets (Admin View)</h1>
<table>
<tr>
<th> ID</th>
<th>Train Name</th>
<th>class</th>
<th>food</th>


</tr>
<?php
$result = $conn->query("SELECT * FROM bookings ORDER BY id DESC"); if ($result && $result->num_rows > 0) {
while ($row = $result->fetch_assoc()) { echo "<tr>
<td>{$row['id']}</td>
<td>{$row['train_name']}</td>
<td>{$row['class']}</td>
<td>{$row['food']}</td>


</tr>";
}
} else {
echo "<tr><td colspan='5'>No bookings found.</td></tr>";
}
?>
</table>


<a href="admin_dashboard.php" class="back-button">⬅ Back to Dashboard</a>
</body>
</html>
