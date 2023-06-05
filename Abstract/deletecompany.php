<?php
include 'connection.php';
if(isset($_GET['delid']))
{
    $id=$_GET['delid'];

    $sql="delete from `company` where companyid =$id";
    $result=mysqli_query($con,$sql);

    if($result)
    {
         echo "Data Deleted Successfully";

        header('location:ShowCompany.php');
    }
    else{
        die(mysqli_error($con));
    }
}
?>
