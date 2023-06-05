<?php
include 'connection.php';
$id=$_GET['upid'];
$sql="Select * from medicine where medid=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$id=$row['medid'];
$name=$row['name'];
$type=$row['type'];
$mdate=$row['mdate'];
$edate=$row['edate'];
$price=$row['price'];
$qty=$row['qty'];





if(isset($_POST['submit']))
{


    $medid=$_POST['medid'];
    $name=$_POST['medname'];
    $type=$_POST['type'];
    $mdate=$_POST['mdate'];
    $edate=$_POST['edate'];
    $price=$_POST['price'];
    $qty=$_POST['qty'];
    $companyid=$_POST['companyid'];



    $sql="update `medicine` set medid=$medid,name='$name',type='$type',mdate='$mdate',edate='$edate',price=$price,qty=$qty,companyid=$companyid    where medid=$id ";
    $result=mysqli_query($con,$sql);

    if($result)
    {
         echo "Data Updated Successfully";
        header('location:ShowMedicine.php');
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
    <title>HealthMart-AddMedicine</title>
    <link rel="stylesheet" href="theme.css">
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
   Add Medicines
  </h1>
</div>

<form method="post">

<div class="container">


<div class="form-group">
      <label class="form-label";">Medicine ID</label>
      <input type="number" class="form-control" name="medid" value=
     <?php
     echo $id;
     ?>>
    </div>


    <div class="form-group">
      <label class="form-label">Medicine Name </label>
      <input required type="text" class="form-control" name="medname" value=
     <?php
     echo $name;
     ?>>
    </div>


    <div class="form-group">
      <label class="form-label">Medicine Type</label>
      <select required name="type" class="form-select">
        <option>Tablet</option>
        <option>Cream</option>
        <option>Syprup</option>
        <option>Drops</option>
        <option>Inhalers</option>
        <option>Injections</option>
        <option>Powder</option>
      </select>
    </div>

    <div class="form-group">
      <label class="form-label">Manufacturing Date</label>
      <input  required type="date" class="form-control"  name="mdate">
    </div>


    <div class="form-group">
      <label class="form-label">Expiry Date</label>
      <input required type="date" class="form-control"  name="edate">
    </div>


    <div class="form-group">
      <label class="form-label">Price</label>
      <input required type="number" class="form-control"  name="price" value=
     <?php
     echo $price;
     ?>>
    </div>

    <div class="form-group">
      <label class="form-label">Quantity</label>
      <input required type="number" class="form-control"  name="qty" value=
     <?php
     echo $qty;
     ?>>
    </div>
    <div class="form-group">
      <label class="form-label">Company ID</label>
      <select required name="companyid" class="form-select">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10</option>
      </select>
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