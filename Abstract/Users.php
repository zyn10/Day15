<?php
include 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>HealthMart-SignUp</title>
    <link rel="stylesheet" href="theme.css">
</head>
<body>

<ul class="nav nav-tabs" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" data-bs-toggle="tab" href="#home" aria-selected="true" role="tab">Home</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" data-bs-toggle="tab" href="#profile" aria-selected="false" tabindex="-1" role="tab">Profile</a>
  </li>
 
</ul>
</div>





















<div class="container ">

<button class="btn btn-info my-3"> <a class="text-decoration-none"  href="Signup.php" class="text-light">
    Add User</a></button>
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">User ID</th>
      <th scope="col">User Role</th>
      <th scope="col">Name</th>
      <th scope="col">Dob</th>
      <th scope="col">Mobile</th>
      <th scope="col">Email</th>
      <th scope="col">UserName</th>
      <th scope="col">Password</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>


<?php
$sql="Select * from users";
$result=mysqli_query($con,$sql);
if($result)
{
    while($row=mysqli_fetch_assoc($result))
    {
    $id=$row['id'];
    $role=$row['role'];
    $name=$row['name'];
    $dob=$row['dob'];
    $mobile=$row['mobile'];
    $email=$row['email'];
    $username=$row['username'];
    $password=$row['password'];
    
    echo '
    <tr class="table-active">
    <th scope="row">'.$id.'</th>
    <td>'.$role.'</td>
    <td>'.$name.'</td>
    <td>'.$dob.'</td>
    <td>'.$mobile.'</td>
    <td>'.$email.'</td>
    <td>'.$username.'</td>
    <td>'.$password.'</td>
    <td>

    <button class="btn btn-success" text><a href="Updations.php?upid='.$id.'"" class="text-light text-decoration-none"  >Update</a></button>
    <button class="btn btn-danger" ><a  href="deleteuser.php?delid='.$id.'" class="text-light text-decoration-none">Delete</a></button>
 
  
</td>
  </tr>
    ';


    }
   
}

?>
<button class="btn btn-info my-3"> <a class="text-decoration-none" href="Admin.php" class="text-light">
    Back to Main Page</a></button>
  </tbody>
</table>

</div>




</body>
</html>