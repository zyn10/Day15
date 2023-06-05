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

      <center><h1>Medicine List</h1>  </center>
    <table class="table table-hover mt-5">
  <thead>
    <tr class="table-dark">

     
      <th scope="col">Medicine</th>
      <th scope="col">type</th>

      <th scope="col">Price</th>
 

      <th scope="col">Purchase</th>

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

    <td>'.$name.'</td>
    <td>'.$type.'</td>
    <td>'.$price.'</td>

 
    <td>











	

    <button class="btn btn-primary btn-sm " text><a href="Addtocart.php?id='.$id.'"" class="text-light text-decoration-none  ">Add to cart</a></button>

 
  
</td>
  </tr>
    ';
    


    }
   
}

?>


  </tbody>
</table>

</div>




</body>
</html>