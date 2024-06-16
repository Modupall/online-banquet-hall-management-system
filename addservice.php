<?php

$connection = mysqli_connect("localhost","root","root");
$db = mysqli_select_db($connection, 'banquet');

if(isset($_POST['insertdata']))
{
    $servicename = $_POST['servicename'];
    $servicedes = $_POST['servicedes'];
   
    $serviceprice = $_POST['serviceprice'];

    $query = "INSERT INTO services (`servicename`,`servicedes`,`serviceprice`) VALUES ('$servicename','$servicedes','$serviceprice')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: manageservices.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>