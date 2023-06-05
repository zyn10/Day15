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
  <li class="nav-item" role="presentation">
    <a class="nav-link disabled" href="#" aria-selected="false" tabindex="-1" role="tab">Disabled</a>
  </li>
</ul>
</div>





















<div class="container ">

<button class="btn btn-info my-3"> <a class="text-decoration-none"  href="AddCompany.php" class="text-light">
    Add Company Details</a></button>
    <table class="table table-hover">
  <thead>
    <tr class="table-dark">
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Contract</th>
      <th scope="col">Mobile</th>
      <th scope="col">Address</th>
      <th scope="col">country</th>
      <th scope="col">rank</th>
      <th scope="col">LinkedIn</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>


<?php
$sql="Select * from company";
$result=mysqli_query($con,$sql);
if($result)
{
    while($row=mysqli_fetch_assoc($result))
    {
    $id=$row['companyid'];
    $cname=$row['cname'];
    $email=$row['email'];
    $contractdate=$row['contractdate'];
    $mobile=$row['mobile'];
    $address=$row['address'];
    $country=$row['country'];
    $rank=$row['rank'];
    $linkedin=$row['linkedin'];
    
    echo '
    <tr class="table-active table-primary">
    <th scope="row">'.$id.'</th>
    <td>'.$cname.'</td>
    <td>'.$email.'</td>
    <td>'.$contractdate.'</td>
    <td>'.$mobile.'</td>
    <td>'.$address.'</td>
    <td>'.$country.'</td>
    <td>'.$rank.'</td>
    <td>'.$linkedin.'</td>
    <td>

    <button class="btn btn-primary btn-sm " text><a href="updatecompany.php?upid='.$id.'"" class="text-light text-decoration-none  ">Update</a></button>
    <button class="btn btn-success btn-sm mt-1" ><a  href="deletecompany.php?delid='.$id.'" class="text-light text-decoration-none ">Delete</a></button>
 
  
</td>
  </tr>
    ';


    }
   
}

?>
<button class="btn btn-dark my-3"> <a class="text-decoration-none" href="Admin.php" class="text-light">
    Back to Main Page</a></button>
  </tbody>
</table>

</div>




</body>
</html>