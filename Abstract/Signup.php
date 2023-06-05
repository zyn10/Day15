<?php
include 'connection.php';
if(isset($_POST['submit']))
{
  $role=$_POST['userRole'];
  $name=$_POST['name'];
  $dob=$_POST['dob'];
  $mobile=$_POST['mobile'];
   $email=$_POST['email'];
   $username=$_POST['userName'];
  $password=$_POST['password'];
    $sql="insert into `users` (role,name,dob,mobile,email,username,password)
    values('$role','$name','$dob','$mobile','$email','$username','$password')";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        echo "Data insert Successfully";
         header('location:success.php');
    }
    else{
        die(mysqli_error($con));
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>HealthMart-SignUp</title>
    <link rel="stylesheet" href="theme.css">
</head>
<body>
<div class="container">
 <h1 class="text-center mt-2 " style="font-family: cursive;">
  <img src="logo.png" alt="" width="200" height="200"> PMS  <svg xmlns=" http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capsule" viewBox="0 0 16 16">
                                                <path d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429l4.243 4.242Z" />
                                            </svg>
  </h1>
</div>
<div class="container border border-4 rounded">
  <h1 class="text-center">
   Add User
  </h1>
</div>

<form method="post">
<div class="container">
   <div class="form-group">
      <label class="form-label mt-4">UserRole</label>
      <select required name="userRole" class="form-select">
        <option>Admin</option>
        <option>Customer</option>
      </select>
    </div>
    <div class="form-group">
      <label  class="form-label mt-1">Name</label>
      <input type="text" class="form-control" placeholder="Enter Name" name="name" required>
    </div>


    <div class="form-group">
      <label class="form-label mt-1">Dob</label>
      <input type="date" class="form-control" name="dob" required>
    </div>


    <div class="form-group">
      <label class="form-label mt-1">Mobile</label>
      <input type="text" class="form-control" placeholder="Enter Mobile" name="mobile" required>
    </div>


    <div class="form-group">
      <label  class="form-label mt-1">Email</label>
      <input type="email" class="form-control" placeholder="Enter Email" name="email" required>
    </div>

    <div class="form-group">
      <label class="form-label mt-1">UserName</label>
      <input type="text" class="form-control" placeholder="Enter UserName" name="userName" required>
    </div>
    <div class="form-group">
      <label class="form-label mt-1">Password</label>
      <input type="password" class="form-control" placeholder="Enter Password" name="password" required>
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