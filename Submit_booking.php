<?php session_start();

if (!isset($_SESSION['username'])) { header("Location: login.php");
exit();
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "irctc_clone";


$conn = new mysqli($servername, $username, $password, $dbname); if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


$user = $_SESSION['username'];
$from = $_POST['from_station'];
$to = $_POST['to_station'];
$class = $_POST['class'];
$berth = $_POST['berth'];
$food = $_POST['food'];
$travel_date = $_POST['travel_date'];
$train_name = $_POST['train_name'];
$num_seats = intval($_POST['num_seats']);
$price = floatval($_POST['price']);
$payment_mode = $_POST['payment_mode'];
$seat_no = "S" . rand(100, 999); // simple seat logic


// Payment fields
$card_number = $_POST['card_number'] ?? null;
$card_name = $_POST['card_name'] ?? null;
$upi_id = $_POST['upi_id'] ?? null;
$didi_id = $_POST['didi_id'] ?? null;


// Insert booking
$stmt = $conn->prepare("INSERT INTO bookings (username, train_name, from_station, to_station, class, berth, food, travel_date, num_seats, price, seat_no) VALUES (?, ?, ?, ?, ?, ?,
?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssdds", $user, $train_name, $from, $to, $class, $berth, $food,
$travel_date, $num_seats, $price, $seat_no);
$stmt->execute();
$booking_id = $stmt->insert_id;
$stmt->close();


// Update train seats
$seatUpdate = $conn->prepare("UPDATE trains SET seats = seats - ? WHERE train_name =
? AND from_station = ? AND to_station = ?");
$seatUpdate->bind_param("isss", $num_seats, $train_name, $from, $to);
$seatUpdate->execute();
$seatUpdate->close();


// Payment insert
$payStmt = $conn->prepare("INSERT INTO payments (booking_id, username, amount, payment_mode, card_number, upi_id, didi_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
$payStmt->bind_param("isdssss", $booking_id, $user, $price, $payment_mode,
$card_number, $upi_id, $didi_id);
$payStmt->execute();
$payStmt->close();


$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Booking Success</title>
<style> body { margin: 0;
padding: 0;
background: url('https://akm-img-a-in.tosshub.com/indiatoday/images/story/202312/ayodhya-railway-station-280121546-16x9_0.jpg?VersionId=ZiTktxJK43TmzyKpMCXpdV65kWPxC9M2') no-repeat center center/cover;
font-family: Arial, sans-serif; color: white;
text-align: center;
}
.success-box {
background-color: rgba(0,0,0,0.7); padding: 40px;
margin: auto; width: 50%;
border-radius: 10px;
}
h1 {
color: #00ff88;
}
a {
display: inline-block; margin-top: 20px; background: #ffcc00; padding: 12px 25px; color: black;
text-decoration: none; font-weight: bold; border-radius: 6px;
}
a:hover {
background-color: #ffaa00;
}
</style>
</head>
<body>


<div class="success-box">
<h1> $?   Booking Successful!</h1>
<p>Your train ticket has been booked and payment processed successfully.</p>
<p><strong>Booking ID:</strong> <?= $booking_id ?></p>
<a href="view_ticket.php">View Ticket</a>
<a href="dashboard.php" style="margin-left: 10px;">Back to Dashboard</a>
</div>


</body>
</html>
