<?php
$host= "localhost"; 
$username = "root";  	
$password = "root";
$db="banquet";
session_start();
$data=mysqli_connect($host, $username, $password,$db);
if($data===false)
{
    die("connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST") 
{
    $username=$_POST["username"];
    $password=$_POST["password"];

    $sql="SELECT * FROM login WHERE username='".$username."' AND password='".$password."'";
    $result=mysqli_query($data,$sql);

    if ($result) {
        $row = mysqli_fetch_array($result);
        if ($row) {
            if($row["usertype"]=="user")
            {   
                $_SESSION["username"]=$username;
                $_SESSION['userid'] = $row['userid'];
                
                header("location:userhome.php");
            }
            else if($row["usertype"]=="admin")
            {
                $_SESSION["username"]=$username;
                $_SESSION['userid'] = $row['userid'];
                header("location:adminhome.php");
            }
        } else {
            echo "Incorrect Username or Password";
        }
    } else {
        echo "Query failed";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>final</title>
    <link rel="stylesheet" href="login.css" />
  </head>
  <body>
    <div class="login-form">
      <form action="#" method="POST">
        <div class="card-header">
          <h1>Sign in</h1>
          <p>New user ? <a href="register.php"> Create an account</a></p>
        </div>
        <div class="form-input">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" required />
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required />
        </div>
        <div class="actions">
        <button type="submit">Login</button>
        </div>
      </form>
    </div>
  </body>
</html>