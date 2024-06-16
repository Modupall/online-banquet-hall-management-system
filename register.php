<?php
session_start();
$host="localhost";
$username = "root";  	
$password = "root";
$db="banquet";
if($_SERVER["REQUEST_METHOD"]=="POST")
{



$conn = new mysqli($host, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$mobile = $_POST['mobile'];
$stmt = $conn->prepare("INSERT INTO login (fullname, username, email, password, mobile) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssssi", $fullname, $username, $email, $password, $mobile);

// Execute the statement and check for errors
if ($stmt->execute()) {
    echo "Registration successful.";
	header("Location:login.php");
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and the connection
$stmt->close();
$conn->close();
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
            background-image: url('images/registerjpg.webp');
		}
		.container {
			width: 300px;
			background-color: #fff;
			padding: 20px;
			margin: 50px auto;
			box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
		}
		.container h1 {
			text-align: center;
			margin-bottom: 30px;
		}
		.input-group {
			margin-bottom: 20px;
		}
		.input-group label {
			display: block;
			margin-bottom: 5px;
		}
		.input-group input {
			width: 100%;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-sizing: border-box;
		}
		.input-group .error {
			color: red;
			font-size: 12px;
			margin-top: 5px;
		}
		.input-group input:focus {
			outline: none;
			box-shadow: 0px 0px 2px 1px #999;
		}
		.input-group input:focus + .error {
			display: none;
		}
		.input-group input:valid + .error {
			display: none;
		}
		.input-group input:invalid + .error {
			display: block;
		}
		.input-group input:invalid {
			box-shadow: 0px 0px 2px 1px #f00;
		}
		.input-group input:invalid:focus {
			box-shadow: 0px 0px 2px 1px #f00;
		}
		.btn-group {
			text-align: center;
		}
		.btn-group button {
			padding: 10px 20px;
			background-color: #5c3d86;
			color: #fff;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			transition: background-color 0.3s ease;
		}
		.btn-group button:hover {
			background-color: #4a2f68;
		}
        
	</style>
</head>
<body>
	<div class="container">
		<form id="form" action="#" method="post">
			<h1>Registration Form</h1>
            
			<div class="input-group">
				<label for="fullname">Full Name:</label>
				<input type="text" id="fullname" name="fullname" required>
				<div class="error"></div>
			</div>
			<div class="input-group">
				<label for="username">Username:</label>
				<input type="text" id="username" name="username" required>
				<div class="error"></div>
			</div>
			<div class="input-group">
				<label for="email">Email:</label>
				<input type="email" id="email" name="email" required>
				<div class="error"></div>
			</div>
			<div class="input-group">
				<label for="password">Password:</label>
				<input type="password" id="password" name="password" required>
				<div class="error"></div>
			</div>
			<div class="input-group">
				<label for="mobile">Mobile:</label>
				<input type="tel" id="mobile" name="mobile" required>
				<div class="error"></div>
			</div>
			<div class="btn-group">
				<button type="submit">Register</button>
			</div>
		</form>
	</div>
</body>
</html>