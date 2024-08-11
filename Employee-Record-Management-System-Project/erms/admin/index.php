<?php
session_start();
include('includes/dbconnection.php');

$msg = ""; // Define $msg variable

if(isset($_POST['login'])) {
    $uname=$_POST['username'];
    $Password=$_POST['Password'];
    $query=mysqli_query($con,"select ID from tbladmin where  AdminuserName='$uname' && Password='$Password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['aid']=$ret['ID'];
      header('location:welcome.php');
    }
    else{
      $msg = "Invalid Details";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Employee Record management System in php and mysql">
  <meta name="author" content="Sarita Pandey">

  <title>ERMS Admin Login</title>

  <!-- Custom fonts for this template-->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <style>
    /* Add custom styles here */

    @media (min-width: 768px) {
      .bg-login-image {
        background-size: cover;
        background-position: center;
        height: 100vh;
      }

      .bg-gradient-primary {
        background: linear-gradient(180deg, #4e73df 10%, #224abe 100%);
      }

      /* Adjust white box size */
      .card-body {
        padding: 2rem;
      }
    }
  </style>

</head>

<body class="bg-gradient-primary">

  <div class="container">
    <h3 align="center" style="color: black; padding-top: 2%">Employee Record Management System</h3>

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-10">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
              <div class="col-lg-9">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Admin Login</h1>
                  </div>
                  <p style="font-size:16px; color:red" align="center"><?php if($msg) { echo $msg; } ?></p>
                  <form class="user" method="post" action="">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="emailHelp" required="true" placeholder="Enter username ...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="Password" name="Password" placeholder="Password" required="true">
                    </div>
                    <p><input type="submit" class="btn btn-primary btn-user btn-block btn-sm" name="login" value="Login"></p>
                    <hr>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

</body>

</html>
