<?php session_start();
if (!isset($_SESSION['username'])) { header("Location: login.php"); exit();
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "irctc_clone";


$conn = new mysqli($servername, $username, $password, $dbname); if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


$user = $_SESSION['username'];
$stmt = $conn->prepare("SELECT * FROM bookings WHERE username = ?");
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();
?>


<!DOCTYPE html>
<html>
<head>
<title>Your Tickets</title>
<style> body { margin: 0;
padding: 0;
background: url('https://akm-img-a-in.tosshub.com/indiatoday/images/story/202312/ayodhya-railway-station-280121546-16x9_0.jpg?VersionId=ZiTktxJK43TmzyKpMCXpdV65kWPxC9M2') no-repeat center center/cover;
font-family: Arial, sans-serif; color: white;
text-align: center;
}
table { width: 100%;
border-collapse: collapse;
background: rgba(255, 255, 255, 0.05);
}
th, td { padding: 15px;
border: 1px solid #999; text-align: center;
}
th {
background-color: #222;
}
tr:hover {
background-color: #444;
}
h1 {
text-align: center; margin-bottom: 40px;
}
a {
color: #00ffff; font-weight: bold;
text-decoration: none;
}
</style>
</head>
<body>


<h1>Your Train Tickets</h1>
<?php if ($result->num_rows > 0): ?>
<table>
<tr>
<th>ID</th>
<th>Train</th>
<th>From</th>
<th>To</th>
<th>Class</th>
<th>Berth</th>
<th>Food</th>
<th>Date</th>
<th>Seats</th>
<th>Price</th>
<th>Seat No</th>
<th>Booking Time</th>
</tr>
<?php while ($row = $result->fetch_assoc()): ?>
<tr>
<td><?= htmlspecialchars($row['id']) ?></td>
<td><?= htmlspecialchars($row['train_name']) ?></td>
<td><?= htmlspecialchars($row['from_station']) ?></td>
<td><?= htmlspecialchars($row['to_station']) ?></td>
<td><?= htmlspecialchars($row['class']) ?></td>
<td><?= htmlspecialchars($row['berth']) ?></td>
<td><?= htmlspecialchars($row['food']) ?></td>
<td><?= htmlspecialchars($row['travel_date']) ?></td>
<td><?= htmlspecialchars($row['num_seats']) ?></td>
<td><?= htmlspecialchars($row['price']) ?></td>
<td><?= htmlspecialchars($row['seat_no']) ?></td>
<td><?= htmlspecialchars($row['booking_time']) ?></td>
</tr>
<?php endwhile; ?>
</table>
<?php else: ?>
<p>No bookings found.</p>
<?php endif; ?>


<a href="dashboard.php">⬅ Back to Dashboard</a>


</body>
</html>
