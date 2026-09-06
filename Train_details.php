<?php
include "session.php"; include "db.php";
?>


<!DOCTYPE html>
<html>
<head>
<title>Train Details Log</title>
<style> body {
background-image: url('https://discoverscandinaviatours.com/wp-content/uploads/2023/04/medium-The-Flam-Railway-Flamsdalen-Oyvind-Heen-fjords.com_.jpg');
background-size: cover;
font-family: Arial, sans-serif; color: white;
padding: 50px; text-align: center;
}


table { width: 90%; margin: auto;
border-collapse: collapse; background-color: rgba(0, 0, 0, 0.7);
}


th, td { padding: 12px;
border: 1px solid #ccc;
}


th {
background-color: #ffc107;
}


.back-button { margin-top: 20px; display: inline-block;
background-color: #007bff; color: white;
padding: 10px 20px; text-decoration: none; border-radius: 5px;
}


.back-button:hover { background-color: #0056b3;
}
</style>
</head>
<body>
<h1>Train Add/Delete Logs</h1>
<table>
<tr>
<th>Log ID</th>
<th>Action</th>
<th>Train Name</th>
<th>Train Number</th>
<th>Timestamp</th>
</tr>
<?php
$logResult = $conn->query("SELECT * FROM train_logs ORDER BY timestamp DESC"); while ($log = $logResult->fetch_assoc()) {
echo "<tr>
<td>{$log['log_id']}</td>
<td>{$log['action']}</td>
<td>{$log['train_name']}</td>
<td>{$log['train_number']}</td>
<td>{$log['timestamp']}</td>
</tr>";
}
?>
</table>
<a href="admin_dashboard.php" class="back-button">⬅ Back to Dashboard</a>
</body>
</html>
