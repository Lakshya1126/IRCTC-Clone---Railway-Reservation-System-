<?php session_start();
if (!isset($_SESSION['username'])) { header("Location: login.php"); exit();
}


// Array of 50 stations
$stations = [
"New Delhi", "Mumbai CST", "Howrah", "Chennai Central", "Bangalore", "Hyderabad", "Ahmedabad", "Pune", "Bhopal", "Lucknow",
"Patna", "Kolkata", "Jaipur", "Chandigarh", "Surat", "Ranchi", "Jammu", "Dehradun", "Guwahati", "Nagpur",
"Visakhapatnam", "Indore", "Raipur", "Coimbatore", "Vadodara", "Madurai", "Trivandrum", "Gwalior", "Varanasi", "Kanpur",
"Agra", "Jodhpur", "Ludhiana", "Amritsar", "Mangalore", "Vijayawada", "Thane", "Nashik", "Kozhikode", "Durgapur",
"Dhanbad", "Noida", "Rajkot", "Meerut", "Tiruchirapalli", "Udaipur", "Siliguri", "Bilaspur", "Jabalpur", "Panipat"
];
?>


<!DOCTYPE html>
<html>
<head>
<title>Book Ticket</title>
<style> body {

margin: 0;
padding: 0;
background: url('https://akm-img-a-in.tosshub.com/indiatoday/images/story/202312/ayodhya-railway-station-280121546-16x9_0.jpg?VersionId=ZiTktxJK43TmzyKpMCXpdV65kWPxC9M2') no-repeat center center/cover;
font-family: Arial, sans-serif; color: white;
text-align: center;
}
h2 {
text-align: center; color: #ffd700;
}
form {
max-width: 500px; margin: 0 auto;
background-color: #222; padding: 30px;
border-radius: 15px;
box-shadow: 0 0 10px white;
}
label { display: block;
margin: 15px 0 5px;
}
select, input[type="date"], input[type="submit"] { width: 100%;
padding: 10px; border: none;
margin-bottom: 15px; border-radius: 5px;
}
.btns { display: flex;
justify-content: space-between;
}
.btns a, input[type="submit"] {
background: #cc3333; color: white;
text-decoration: none; padding: 10px 15px; border-radius: 8px; font-weight: bold;
}
.btns a:hover, input[type="submit"]:hover { background: #ff4444;
}
</style>
</head>
<body>


<h2>Railway Ticket Booking</h2>


<form method="POST" action="payment.php">
<label>From Station:</label>
<select name="from_station" required>
<option value="">Select Station</option>
<?php foreach ($stations as $station): ?>
<option value="<?= $station ?>"><?= $station ?></option>
<?php endforeach; ?>
</select>


<label>To Station:</label>
<select name="to_station" required>
<option value="">Select Station</option>
<?php foreach ($stations as $station): ?>
<option value="<?= $station ?>"><?= $station ?></option>
<?php endforeach; ?>
</select>


<label>Travel Date:</label>
<input type="date" name="travel_date" required min="<?= date('Y-m-d') ?>">


<label>Food Required:</label>
<select name="food" required>
<option value="Yes">Yes</option>
<option value="No">No</option>
</select>


<label for="num_seats">Number of Seats:</label>
<input type="number" name="num_seats" id="num_seats" min="1" value="1" required><br><br>



<label for="train_name">Select Train:</label>
<select name="train_name" required>
<option value="">Select Train</option>
<option value="Shatabdi Express">Shatabdi Express</option>
<option value="Rajdhani Express">Rajdhani Express</option>
<option value="Duronto Express">Duronto Express</option>
<!-- Add all 50+ trains here -->
</select>



<label>Class:</label>
<select name="class" required>
<option value="1st AC">1st AC</option>
<option value="2nd AC">2nd AC</option>
<option value="3rd AC">3rd AC</option>
<option value="Sleeper">Sleeper</option>
</select>





<input type="submit" value="Book Ticket">
</form>


</body>
</html>
