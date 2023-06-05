<?php
include 'connection.php';
$id=$_GET['upid'];
$sql="Select * from users where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$userrole=$row['role'];
$name=$row['name'];
$dob=$row['dob'];
$mobile=$row['mobile'];
$email=$row['email'];
$username=$row['username'];
$password=$row['password'];
if(isset($_POST['submit']))
{
$userrole=$_POST['userRole'];
$name=$_POST['name'];
$dob=$_POST['dob'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$username=$_POST['userName'];
$password=$_POST['password'];

    $sql="update `users` set id=$id,role='$userrole',name='$name',dob='$dob',mobile='$mobile',email='$email',username='$username',password='$password'   where id=$id ";
    $result=mysqli_query($con,$sql);

    if($result)
    {
         echo "Data Updated Successfully";
        header('location:Users.php');
    }
    else{
        die(mysqli_error($con));
    }
}
?>







<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="theme.css">
    <title>Update Users</title>
  </head>
  <body>
  <div class="container">
 <h1 class="text-center mt-2 " style="font-family: cursive;">
  <img src="logo.png" alt="" width="200" height="200"> Health Mart  <svg xmlns=" http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capsule" viewBox="0 0 16 16">
                                                <path d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429l4.243 4.242Z" />
                                            </svg>
  </h1>
</div>
<div class="container border border-4 rounded">
  <h1 class="text-center">
  Update Users
  </h1>
</div>

<form method="post">
<div class="container">

<div class="form-group">
      <label class="form-label mt-4">Current Role</label>
      <label class="form-label mt-4">value=
     <?php
     echo $userrole;
     ?></label>

    </div>
    <div class="form-group">
      <label class="form-label mt-4">UserRole</label>
      <select required name="userRole"  class="form-select">
        <option>Admin</option>
        <option>Customer</option>
      </select>
    </div>
    <div class="form-group">
      <label  class="form-label mt-1">Name</label>
      <input required type="text" class="form-control" placeholder="Enter Name" name="name"  value=
     <?php
     echo $name;
     ?>>
    </div>


    <div class="form-group">
      <label class="form-label mt-1">Dob</label>
      <input required type="date" class="form-control" name="dob" value=
     <?php
     echo $dob;
     ?>>
    </div>


    <div class="form-group">
      <label class="form-label mt-1">Mobile</label>
      <input required type="text" class="form-control" placeholder="Enter Mobile" name="mobile" value=
     <?php
     echo $mobile;
     ?>>
    </div>


    <div class="form-group">
      <label  class="form-label mt-1">Email</label>
      <input required type="email" class="form-control" placeholder="Enter Email" name="email" value=
     <?php
     echo $email;
     ?>>
    </div>

    <div class="form-group">
      <label class="form-label mt-1">UserName</label>
      <input required type="text" class="form-control" placeholder="Enter UserName" name="userName" value=
     <?php
     echo $username;
     ?>>
    </div>
    <div class="form-group">
      <label class="form-label mt-1">Password</label>
      <input required type="text" class="form-control" placeholder="Enter Password" name="password" value=
     <?php
     echo $password;
     ?>>
    </div>
     <br>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    <div class="mt-4">

    </div>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>