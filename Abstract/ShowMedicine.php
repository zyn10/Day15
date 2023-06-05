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

<button class="btn btn-info my-3"> <a class="text-decoration-none" href="AddCompany.php" class="text-light">
    Add Company Details</a></button>
    <table class="table table-hover">
  <thead>
    <tr class="table-dark">

      <th scope="col">ID</th>
      <th scope="col">Medicine</th>
      <th scope="col">type</th>
      <th scope="col">Manufacturing Date</th>
      <th scope="col">Expiry Date</th>
      <th scope="col">Price</th>
      <th scope="col">Qty</th>
      <th scope="col">Company</th>
      <th scope="col">Operations</th>

    </tr>
  </thead>
  <tbody>


<?php
$sql="SELECT medicine.medid,medicine.name,medicine.type,medicine.mdate,medicine.edate,medicine.price,medicine.qty,company.cname
FROM medicine
INNER JOIN company
ON medicine.companyid=company.companyid;";
$result=mysqli_query($con,$sql);
if($result)
{
    while($row=mysqli_fetch_assoc($result))
    {
    $id=$row['medid'];
    $name=$row['name'];
    $type=$row['type'];
    $mdate=$row['mdate'];
    $edate=$row['edate'];
    $price=$row['price'];
    $qty=$row['qty'];
    $cname=$row['cname'];
  
    echo '
    <tr class=" table-light table-active">
    <th scope="row">'.$id.'</th>
    <td>'.$name.'</td>
    <td>'.$type.'</td>
    <td>'.$mdate.'</td>
    <td>'.$edate.'</td>
    <td>'.$price.'</td>
    <td>'.$qty.'</td>
    <td>'.$cname.'</td>
 
    <td>

    <button class="btn btn-primary btn-sm " text><a href="updatemedicine.php?upid='.$id.'"" class="text-light text-decoration-none  ">Update</a></button>
    <button class="btn btn-dark btn-sm mt-1" ><a  href="deletemedicine.php?delid='.$id.'" class="text-light text-decoration-none ">Delete</a></button>
 
  
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