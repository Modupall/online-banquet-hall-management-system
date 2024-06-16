<?php
session_start();
if(!isset( $_SESSION['username'] ) || !isset( $_SESSION['userid'] ))
{
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Banquet Hall Management System</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <h1>WELCOME</h1><h2><?php echo $_SESSION["username"] ?></h2>
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

  </header>
<div  class="container">
    <div class="image">
    <img src="images/home.webp" alt="hall image">
</div>
<div class="text">
    <h1>Your Celebration our Venue</h1>
</div>
</div>

  <footer>
    <h3>Banquet Hall Management System</h3>
    <p>Bangalore</p>
  </footer>

  <script src="script.js"></script>
</body>
</html>