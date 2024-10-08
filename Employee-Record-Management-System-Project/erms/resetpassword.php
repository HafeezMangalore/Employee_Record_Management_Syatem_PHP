<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(strlen($_SESSION['empid']==0))
{
header('location:forgetpassword.php');
} else {
if(isset($_POST['submit']))
  {
    $email=$_SESSION['email'];
    $empid=$_SESSION['empid'];
    $password=$_POST['newpassword'];
    $query=mysqli_query($con,"update employeedetail set EmpPassword='$password'  where  EmpEmail='$email' && EmpCode='$empid' ");
   if($query)
   {
echo "<script>alert('Password successfully changed');</script>";
session_destroy();
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

  <title>ERMS Employee Reset</title>

  <!-- Custom fonts for this template-->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
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
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
        
              <div class="col-lg-9">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                  </div>
                  <p style="font-size:16px; color:red" align="center"> <?php if($msg){ echo $msg; } ?> </p>
                  <form class="user" name="changepassword" method="post" onsubmit="return checkpass();">
                    <div class="form-group">
                      <input type="Password" class="form-control form-control-user" id="newpassword" name="newpassword" value="" required="true" placeholder="Enter Your New Password" required="true" >
                    </div>
                    <div class="form-group">
                      <input type="Password" class="form-control form-control-user" id="confirmpassword" name="confirmpassword" value="" required="true" placeholder="Confirm Your Password" required="true">
                    </div>
                    <p> <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="Reset"></p>
                    <hr>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="loginerms.php">Already have an account? Login!</a>
                  </div>
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

<?php } ?>