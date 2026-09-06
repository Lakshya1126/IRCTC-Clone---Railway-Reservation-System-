

<?php session_start();
if (!isset($_SESSION['username'])) { header("Location: login.php"); exit();
}


include 'db_connection.php';
$conn = OpenCon();


$username = $_SESSION['username'];


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ticket_id'])) {
$ticket_id = $_POST['ticket_id'];


// Cancel the ticket
$stmt = $conn->prepare("DELETE FROM bookings WHERE id = ? AND username = ?");
$stmt->bind_param("is", $ticket_id, $username);
if ($stmt->execute()) {
$msg = " $?   Ticket cancelled successfully!";
} else {
$msg = "+ Failed to cancel ticket. Please try again.";
}
$stmt->close();
}


// Fetch bookings
$stmt = $conn->prepare("SELECT * FROM bookings WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
?>


<!DOCTYPE html>
<html>
<head>
<title>Cancel Ticket</title>
<style> body {
background-color: #000000; color: #ffffff;
font-family: 'Segoe UI', sans-serif; padding: 30px;
}
h2 {
text-align: center;
color: #00ffcc;
}
.msg {
text-align: center; font-size: 18px; color: #00ffcc; margin: 10px 0 20px;
}
table { width: 100%;
border-collapse: collapse; margin-top: 25px;
}
th, td {
border: 1px solid #444; padding: 12px;
text-align: center;
}
th {
background-color: #111; color: #ffcc00;
}
tr:nth-child(even) { background-color: #1a1a1a;
}
tr:hover {
background-color: #333;
}
.cancel-form { display: inline;
}
.cancel-btn {
background-color: #cc3333; color: white;
padding: 7px 12px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;
}
.cancel-btn:hover { background-color: #ff4444;
}
.back-btn { display: block; text-align: center; margin-top: 30px;
}
.back-btn a { background: #00cc99; color: white;
text-decoration: none; padding: 10px 20px; border-radius: 8px; font-weight: bold;
}
.back-btn a:hover { background: #00ffcc; color: black;
}
</style>
</head>
<body>


<h2>Cancel Your Booked Tickets</h2>


<?php if (isset($msg)) echo "<p class='msg'>$msg</p>"; ?>


<?php if ($result->num_rows > 0): ?>
<table>
<tr>
<th>Train</th>
<th>From</th>
<th>To</th>
<th>Travel Date</th>
<th>Seat</th>
<th>Action</th>
</tr>
<?php while ($row = $result->fetch_assoc()): ?>
<tr>
<td><?= htmlspecialchars($row['train_name']) ?></td>
<td><?= htmlspecialchars($row['from_station']) ?></td>
<td><?= htmlspecialchars($row['to_station']) ?></td>
<td><?= htmlspecialchars($row['travel_date']) ?></td>
<td><?= htmlspecialchars($row['seat_no']) ?></td>
<td>
<form method="POST" class="cancel-form">
<input type="hidden" name="ticket_id" value="<?= $row['id'] ?>">
<button type="submit" class="cancel-btn">Cancel</button>
</form>
</td>
</tr>
<?php endwhile; ?>
</table>
<?php else: ?>
<p style="text-align:center; font-size:18px;">You have no tickets to cancel.</p>
<?php endif; ?>


<div class="back-btn">
<a href="dashboard.php">⬅ Back to Dashboard</a>
</div>


</body>
</html>


<?php
$stmt->close();
$conn->close();
?>
