
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>IRCTC - Indian Railway Catering and Tourism Corporation</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
* { margin: 0;
padding: 0;
box-sizing: border-box;
font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}


body {
background: url('https://images2.alphacoders.com/439/439978.jpg') no-repeat center center fixed;
background-size: cover; color: #fff;
min-height: 100vh; display: flex;
flex-direction: column; align-items: center; justify-content: center; position: relative;
overflow: hidden;
}


body::before { content: ''; position: absolute; top: 0;
left: 0;
width: 100%;
height: 100%;
background-color: rgba(0, 0, 0, 0.5);
z-index: 0;
}


.logo-container { text-align: center;
margin-bottom: 1.5rem; position: relative;
z-index: 1;
}


.logo { height: 80px; width: auto;
margin-bottom: 1rem;
filter: drop-shadow(0 0 8px rgba(255, 255, 255, 0.7)); animation: fadeIn 1s ease;
}


h1 {
font-size: 2.2rem; text-align: center;
margin-bottom: 1rem; position: relative; color: #fff;
text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); animation: fadeInDown 0.8s ease;
}


.container { display: flex;
flex-direction: column; align-items: center; position: relative;
z-index: 1;
width: 100%;
max-width: 450px; padding: 0 20px;
}


.btn-group { display: flex;
flex-direction: column; width: 100%;
gap: 1rem;
}


button {
padding: 14px 25px; font-size: 1.1rem;
border: none; cursor: pointer; border-radius: 6px; font-weight: 600;
transition: all 0.3s ease;
box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2); position: relative;
overflow: hidden; z-index: 1;
width: 100%; display: flex;
align-items: center; justify-content: center; gap: 10px;
}


button::after { content: ''; position: absolute; top: 0;
left: 0;
width: 100%;
height: 100%;
background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.2), transparent); transform: translateX(-100%);
transition: transform 0.6s ease; z-index: -1;
}


button:hover::after {
transform: translateX(100%);
}


button:hover {
transform: translateY(-3px);
box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
}


button:active { transform: translateY(0);
}


.login-btn {
background-color: #28a745; color: white;
animation: fadeIn 0.8s ease 0.2s forwards; opacity: 0;
}


.register-btn {
background-color: #007bff; color: white;
animation: fadeIn 0.8s ease 0.4s forwards; opacity: 0;
}


.admin-btn {
background-color: #dc3545; color: white;
animation: fadeIn 0.8s ease 0.6s forwards;
opacity: 0;
}


.tagline {
font-size: 1.1rem; margin-bottom: 1.8rem; text-align: center;
animation: fadeIn 1s ease 0.8s forwards; opacity: 0;
position: relative; z-index: 1;
text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);
font-weight: 500;
}


@keyframes fadeIn {
from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); }
}


@keyframes fadeInDown { from {
opacity: 0;
transform: translateY(-20px);
}
to { opacity: 1;
transform: translateY(0);
}
}
/* Responsive design */ @media (max-width: 768px) {
.logo { height: 70px;
}


h1 {
font-size: 1.8rem;
}


button {
padding: 12px 20px; font-size: 1rem;
}


.tagline {
font-size: 1rem;
margin-bottom: 1.5rem;
}
}
</style>
</head>
<body>
<div class="logo-container">
<img src="https://1000logos.net/wp-content/uploads/2022/02/IRCTC-logo.png" alt="IRCTC Logo" class="logo" onerror="this.src='https://upload.wikimedia.org/wikipedia/en/thumb/3/3f/IRCTC_Logo.svg/1 200px-IRCTC_Logo.svg.png'">
<h1>Indian Railway Reservation </h1>
<p class="tagline">Lifeline of the Nation</p>
</div>


<div class="container">
<div class="btn-group">
<button class="login-btn" onclick="window.location.href='login.php'">
<i class="fas fa-sign-in-alt"></i> Passenger Login
</button>
<button class="register-btn" onclick="window.location.href='register.php'">
<i class="fas fa-user-plus"></i> New Registration
</button>
<button class="admin-btn" onclick="window.location.href='admin_login.php'">
<i class="fas fa-lock"></i> Admin Login
</button>
</div>
</div>
</body>
</html>
