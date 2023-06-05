<?php
include 'connection.php';

if(isset($_POST['submit']))
{

    $cname=$_POST['cname'];
    $email=$_POST['email'];
    $contract=$_POST['contract'];
    $mobile=$_POST['mobile'];
    $address=$_POST['address'];
    $country=$_POST['country'];
    $rank=$_POST['rank'];
    $linkedin=$_POST['linkedin'];

    $sql="insert into `company` (cname,email,contractdate,mobile,address,country,rank,linkedin)
    values('$cname','$email','$contract','$mobile','$address','$country','$rank','$linkedin')";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        echo "Data insert Successfully";
        header('location:ShowCompany.php');
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
   Add Company
  </h1>
</div>

<form method="post">
<div class="container">
 
<div class="form-group">
      <label class="form-label mt-4">Company Name</label>
      <select required name="cname" class="form-select">
        <option>Pfizer Inc</option>
        <option>Novartis AG</option>
        <option>Merck & Co Inc</option>
        <option>Sanofi</option>
        <option>zendelics</option>
        <option>Prosato</option>
        <option>Otvox</option>
        <option>provaxil</option>
        <option>Novatro</option>
        <option>UrMed</option>
      </select>
    </div>

    <div class="form-group">
      <label class="form-label mt-1">Email</label>
      <input type="email" class="form-control" name="email" required>
    </div>


    <div class="form-group">
      <label class="form-label mt-1">Contract Date</label>
      <input type="date" class="form-control"  name="contract" required>
    </div>


    <div class="form-group">
      <label  class="form-label mt-1">Phone Number</label>
      <input type="text" class="form-control" placeholder="Enter Phone Number" name="mobile" required>
    </div>

    <div class="form-group">
      <label class="form-label mt-1">Address</label>
      <input type="text" class="form-control" placeholder="Enter Address" name="address" required>
    </div>
    <div class="form-group">
      <label class="form-label mt-1">Country</label>
      <input type="text" class="form-control" placeholder="Enter Country" name="country" required>
    </div>

  
    <div class="form-group">
      <label class="form-label mt-4">Rank</label>
      <select required name="rank" class="form-select">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
    </div>


    <div class="form-group">
      <label class="form-label mt-1">LinkedIn</label>
      <input type="text" class="form-control" placeholder="Enter LinkedIn" name="linkedin" required>
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