<?php session_start();

if (!isset($_SESSION['username'])) { header("Location: login.php"); exit();
}


// Collect booking data from book.php
$from = $_POST['from_station'];
$to = $_POST['to_station'];
$class = $_POST['class'];
$berth = $_POST['berth'];
$food = $_POST['food'];
$travel_date = $_POST['travel_date'];
$train_name = $_POST['train_name'] ?? '';
$num_seats = intval($_POST['num_seats']);


// Price calculation logic
$base_price = 1000; // base price for route
$class_multiplier = [ "1st AC" => 1.0, "2nd AC" => 0.85,
"3rd AC" => 0.75,
"Sleeper" => 0.60
];
$food_charge = ($food == "Yes") ? 200 : 0;


$calculated_price = $base_price * $class_multiplier[$class] * $num_seats + $food_charge;
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Payment Page</title>
<style> body { margin: 0;
padding: 0;
background: url('https://akm-img-a-in.tosshub.com/indiatoday/images/story/202312/ayodhya-railway-station-280121546-16x9_0.jpg?VersionId=ZiTktxJK43TmzyKpMCXpdV65kWPxC9M2') no-repeat center center/cover;
font-family: Arial, sans-serif; color: white;
text-align: center;
}
.payment-container {
background-color: rgba(0, 0, 0, 0.8); max-width: 600px;
margin: auto; padding: 25px; border-radius: 10px;
}
h2 {
text-align: center; color: #ffcc00;
}
label { display: block;
margin-top: 15px; font-weight: bold;
}
input, select { width: 100%; padding: 8px; margin-top: 5px; border-radius: 5px;
}
.payment-fields { margin-top: 20px;
}
.btn {
margin-top: 25px; width: 100%; padding: 12px;
background-color: #ffcc00; border: none;
color: black; font-size: 16px; cursor: pointer;
border-radius: 5px;
}
.btn:hover {
background-color: #ffaa00;
}
</style>
<script>
function showPaymentFields() {
const mode = document.getElementById("payment_mode").value;
document.getElementById("card_fields").style.display = (mode === "Card") ? "block" : "none";
document.getElementById("upi_fields").style.display = (mode === "UPI") ? "block" : "none";
document.getElementById("qr_fields").style.display = (mode === "QR") ? "block" : "none";
document.getElementById("didi_fields").style.display = (mode === "DIDI") ? "block" : "none";
}
</script>
</head>
<body>


<div class="payment-container">
<h2>Complete Your Payment</h2>
<p><strong>Total Amount: ₹<?= number_format($calculated_price, 2) ?></strong></p>


<form action="submit_booking.php" method="POST">
<label>Select Payment Method:</label>
<select name="payment_mode" id="payment_mode" required onchange="showPaymentFields()">
<option value="">-- Select --</option>
<option value="Card">Card</option>
<option value="UPI">UPI</option>
<option value="QR">QR Scan</option>
<option value="DIDI">DIDI Wallet</option>
</select>


<div class="payment-fields">
<div id="card_fields" style="display:none;">
<label>Card Number:</label>
<input type="text" name="card_number" maxlength="16" placeholder="Enter card number">


<label>Card Holder Name:</label>
<input type="text" name="card_name" placeholder="Card holder name">
</div>


<div id="upi_fields" style="display:none;">
<label>UPI ID:</label>
<input type="text" name="upi_id" placeholder="yourname@bank">
</div>


<div id="qr_fields" style="display:none;">
<p>Scan the QR code from your UPI app to pay.</p>
<img src="qr_code_sample.png" width="200" alt="QR Code">
</div>


<div id="didi_fields" style="display:none;">
<label>DIDI Wallet ID:</label>
<input type="text" name="didi_id" placeholder="Enter DIDI ID">
</div>
</div>


<!-- Hidden Fields to Pass Data -->
<input type="hidden" name="from_station" value="<?= htmlspecialchars($from) ?>">
<input type="hidden" name="to_station" value="<?= htmlspecialchars($to) ?>">
<input type="hidden" name="class" value="<?= htmlspecialchars($class) ?>">
<input type="hidden" name="berth" value="<?= htmlspecialchars($berth) ?>">
<input type="hidden" name="food" value="<?= htmlspecialchars($food) ?>">
<input type="hidden" name="travel_date" value="<?= htmlspecialchars($travel_date) ?>">
<input type="hidden" name="train_name" value="<?= htmlspecialchars($train_name) ?>">
<input type="hidden" name="num_seats" value="<?= $num_seats ?>">
<input type="hidden" name="price" value="<?= $calculated_price ?>">


<button type="submit" class="btn">Pay & Book Ticket</button>
</form>
</div>


</body>
</html>
