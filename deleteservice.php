
<?php
$connection = mysqli_connect("localhost","root","root");
$db = mysqli_select_db($connection, 'banquet');

if(isset($_POST['deletedata']))
{
    $serviceid = $_POST['delete_id'];

    $query = "DELETE FROM services WHERE serviceid='$serviceid'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location:manageservices.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

?>
