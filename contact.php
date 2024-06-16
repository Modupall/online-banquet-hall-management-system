<?php
$host = "localhost";
$username = "root";
$password = "root";
$db = "banquet";

$conn = new mysqli($host, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
  
    $sql = "INSERT INTO contact (name, email, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);


    $stmt->bind_param("sss", $name, $email, $message);
    if ($stmt->execute()) {
        echo "Message sent successfully.";
        header("Location:userhome.php");
    } else {
        echo "Error: " . $stmt->error;
    }

  
    $stmt->close();
}


$conn->close();
?>
























<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        /* Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

        /* Variables */
        :root {
            --primary-color: #007bff;
            --secondary-color: #0056b3;
            --background-color: antiquewhite;
            --text-color: #333;
            --border-color: #ccc;
        }

        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body */
        body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
            
		}

        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
            padding: 2rem;
        }

        /* Container */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 2rem;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        /* Title */
        h1 {
            text-align: center;
            margin-bottom: 2rem;
            color: var(--primary-color);
        }

        /* Form */
        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        /* Form Label */
        label {
            font-weight: 500;
            margin-bottom: 0.5rem;
            display: block;
        }

        /* Form Input */
        input, textarea {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid var(--border-color);
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        /* Form Button */
        button {
            background-color: var(--primary-color);
            color: #fff;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: var(--secondary-color);
        }
        header {
    background-color:rgb(218, 69, 131);
    color: #fff;
    padding: 20px;
    text-align: center;
  }

        nav ul {
    list-style-type: none;
    padding: 0;
  }
  
  nav ul li {
    display: inline;
    margin-right: 20px;
  }
  
  nav ul li a {
    color: #fff;
    text-decoration: none;
  }
  footer {
    background-color:rgb(218, 69, 131);
    color: #fff;
    padding: 10px;
    text-align: center;
  }
    </style>
</head>
<body>
<header>
   <center> 
   <h4>
    <nav>
      <ul>
        <li><a href="about.php">About Us</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        <li><a href="services.php">Services</a></li>
        <li><a href="mybookings.php">My Bookings</a></li>
      </ul>
    </nav>
    <div class="logout">
    <a href="logout.php" style="color: white; text-decoration: none; background-color:rgb(218, 69, 131); padding: 5px 10px; border-radius: 5px;">Logout</a>
  </div>
</h4>
</center>
  </header>
    <div class="container">
        <h1>Contact Us</h1>
        <p>If you have any questions or concerns, please don't hesitate to contact us. We'll get back to you as soon as possible.</p>
        <form action="#" method="POST">
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <br>
            <div>
                <button type="submit">Send Message</button>
            </div>
        </form>
    </div>
    <footer>
    <h3>Banquet Hall Management System</h3>
    <p>Bangalore</p>
  </footer>
</body>
</html>
