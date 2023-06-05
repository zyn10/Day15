<?php
include 'connection.php';
if(isset($_GET['delid']))
{
    $id=$_GET['delid'];

    $sql="delete from `users` where id =$id";
    $result=mysqli_query($con,$sql);

    if($result)
    {
         echo "Data Deleted Successfully";

        header('location:Users.php');
    }
    else{
        die(mysqli_error($con));
    }
}
?>
