<?php
$connection = mysqli_connect("localhost","root","root");
$db = mysqli_select_db($connection, 'banquet');

    if(isset($_POST['updatedata']))
    {   
        $serviceid = $_POST['update_id'];
        
        $servicename = $_POST['servicename'];
    $servicedes = $_POST['servicedes'];
   
    $serviceprice = $_POST['serviceprice'];

        $query = "UPDATE services SET servicename='$servicename', servicedes='$servicedes', serviceprice=' $serviceprice' WHERE serviceid='$serviceid'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:manageservices.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
