<?php
$con=new mysqli('localhost','root','','healthmart');
if(!$con)
{
    die(mysqli_error($con));
}
?>