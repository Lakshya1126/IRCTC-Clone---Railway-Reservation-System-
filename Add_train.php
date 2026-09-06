

<?php
include "session.php"; include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$train_name = $_POST['train_name'];
$train_number = $_POST['train_number'];


$sql = "INSERT INTO train (train_name, train_number) VALUES ('$train_name', '$train_number')";
if ($conn->query($sql) === TRUE) {
$conn->query("INSERT INTO train_logs (action, train_name, train_number) VALUES ('Added', '$train_name', '$train_number')");
$message = "⬛✓ Train added successfully!";
} else {
$message = "+ Error: " . $conn->error;
}
}
?>


<!DOCTYPE html>
<html>
<head>
<title>Add Train</title>
<style> body {
background-image: url('https://english.cdn.zeenews.com/sites/default/files/2023/05/11/1197967-siemens-train.jpg');
background-size: cover;
font-family: Arial, sans-serif; text-align: center;
color: white; padding-top: 80px;
}
.form-container { background: rgba(0,0,0,0.7); width: 350px;
margin: auto; padding: 30px; border-radius: 15px;
}


input, button { width: 90%; padding: 10px; margin: 10px 0; border-radius: 5px; border: none;
}


button {
background-color: #28a745; color: white;
font-weight: bold;
}


a.back-button { background-color: #007bff; color: white;
display: inline-block; margin-top: 15px; padding: 10px 20px; border-radius: 5px; text-decoration: none;
}


.message { margin-top: 10px; font-weight: bold;
}
</style>
</head>
<body>
<div class="form-container">
<h2>Add Train</h2>
<form method="POST">
<input type="text" name="train_name" placeholder="Train Name" required>
<input type="text" name="train_number" placeholder="Train Number" required>
<button type="submit">Add Train</button>
</form>
<?php if (!empty($message)) echo "<div class='message'>$message</div>"; ?>
<a href="admin_dashboard.php" class="back-button">⬅ Back to Dashboard</a>
</div>
</body>
</html>
