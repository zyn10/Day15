<?php
include 'connection.php';
if(isset($_POST['username'])  && ($_POST['password']) )
{

    function validate($data)
    {
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    $username=validate($_POST['username']);
    $password=validate($_POST['password']);

$role="Admin";
$role2="Customer";
$game1="true";
$game2="true";
     $username=validate($_POST['username']);
    $password=validate($_POST['password']);
        $sql="Select * From users WHERE username='$username' AND password='$password' AND role='$role' ";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)===1)
        {

          session_start();
       $_SESSION['loggedin']=true;
       $_SESSION['username']=$username;
       
            header('location:success1.php');
        }
        else
        {
            $game1=false;
        }

        $sql="Select * From users WHERE username='$username' AND password='$password' AND role='$role2' ";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)===1)
        {
              
          header('location:success2.php');
        }
        else
        {
            $game2=false;
        }
        if($game1="false" && $game2=="false"){

            echo "Please Enter Valid Credentials";
        }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="signIn.css">
</head>
<body>


<div class="login-box">
<div class="container">
 <h3 class="text-center mt-2 " style="font-family: cursive;">
  <img src="logo.png" alt="" width="100" height="100"> Health Mart  <svg xmlns=" http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capsule" viewBox="0 0 16 16">
                                                <path d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429l4.243 4.242Z" />
                                            </svg>
  </h3>
</div>

  <h2>Login</h2>
  <?php if(isset($_GET['error']))
  {
    ?>
    <p class="error"> <?php  echo $_GET['error'] ?> </p>
 <?php } ?>
  <form method="POST"  autocomplete="off">
    <div class="user-box">
      <input type="text" name="username" required="" autocomplete="off">
      <label>Username</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" required=""  autocomplete="off">
      <label>Password</label>
    </div>


    <button class="btn btn-dark" type="submit">Login</button>
    
  
  </form>
</div>
</body>
</html>