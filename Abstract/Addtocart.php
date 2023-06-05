<?php
include 'connection.php';
$id=$_GET['id'];
$sql="Select * from medicine where medid=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

$name=$row['name'];
$type=$row['type'];

$price=$row['price'];

$pic=base64_encode( $row['pic']);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>HealthMart-AddMedicine</title>
    <link rel="stylesheet" href="theme.css">
</head>
<body>
<div class="container">
 <h1 class="text-center mt-2 " style="font-family: cursive;">
 Health Mart
  </h1>
</div>
<div class="container">
  <h4 class="text-center">
Medicine Details
  </h4>
</div>

<form method="post" action="checkout.php">


<div class="container">
<div class="form-group">
     
     <br>
    <button type="submit" class="btn btn-info mx-5" name="submit">Checkout</button>
  
</form>
  <section class="" style="max-width: 23rem;">
      
    <div class="card testimonial-card mt-2 mb-3">
      <div class="card-up aqua-gradient"></div>
      <div class="avatar mx-auto white">
      <?php

echo' <img src="data:image;base64,'.$pic.'" class="rounded-circle img-fluid"  >';
?>

      </div>
      <div class="card-body text-center">
        <h4 class="card-title font-weight-bold"><?php
                    echo $name;
                    ?></h4>
        <hr>
        <h6><i class="fas fa-quote-left"></i> Type: <?php
                    echo $type;
                    ?></h6>
                    
                    <h6><i class="fas fa-quote-left"></i> Price: <?php
                    echo $price;
                    ?></h6>

      </div>
    </div>
    
    
  </section>
  
</div>




</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>