<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{


if(isset($_GET['delid']))
  {
    $eid=$_GET['delid'];
    $query=mysqli_query($con,"delete employeedetail,empexpireince,empeducation from employeedetail
left join empexpireince on empexpireince.EmpID=employeedetail.ID
left join empeducation on empeducation.EmpID=employeedetail.ID
where employeedetail.ID='$eid'");
    echo "<script>alert('Record Deleted successfully');</script>";
    echo "<script>window.location.href='allemployees.php'</script>";
  }
  ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <style>
    .button-container {
      display: flex;
      gap: 10px; /* Adjust the gap size as needed */
    }

    .blue-button {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 5px 10px;
      cursor: pointer;
      text-decoration: none;
      border-radius: 20px; /* Use a higher value for more oval shape */
    }

    .red-icon-button {
      background-color: transparent;
      color: red;
      border: none;
      padding: 5px;
      cursor: pointer;
      border-radius: 20%; /* Makes it round */
    }

    .red-icon-button:hover {
      color: darkred;
    }
  </style>

  <title>Employees Details</title>

  <!-- Custom fonts for this template-->
  
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
  <?php include_once('includes/sidebar.php')?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
         <?php include_once('includes/header.php')?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Employees Details</h1>

<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

 <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

<tr>
  <th>S no.</th>
  <th>Emp Code</th>
  <th>Emp First Name</th>
  <th>Emp Last Name</th>
  <th>Emp Email</th>
  <th>Emp Contact no</th>
  <th>Emp Joining Date</th>
  <th>Action</th>
  
</tr>

<?php
$ret=mysqli_query($con,"select * from employeedetail");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

<tr>
  <td><?php echo $cnt;?></td>
  <td><?php echo $row['EmpCode'];?></td>
  <td><?php echo $row['EmpFname'];?></td>
  <td><?php echo $row['EmpLName'];?></td>
  <td><?php echo $row['EmpEmail'];?></td>
  <td><?php echo $row['EmpContactNo'];?></td>
  <td><?php echo $row['EmpJoingdate'];?></td>
  <td class="button-container">
    <form method="GET" action="editempprofile.php">
      <input type="hidden" name="editid" value="<?php echo $row['ID'];?>">
      <button type="submit" class="blue-button">Edit Profile </button>
    </form>
    <form method="GET" action="editempeducation.php">
      <input type="hidden" name="editid" value="<?php echo $row['ID'];?>">
      <button type="submit" class="blue-button">Edit Education </button>
    </form>
    <form method="GET" action="editempexp.php">
      <input type="hidden" name="editid" value="<?php echo $row['ID'];?>">
      <button type="submit" class="blue-button">Edit Experience </button>
    </form>
    <form method="GET" action="allemployees.php" onsubmit="return confirm('Do you really want to delete?');">
      <input type="hidden" name="delid" value="<?php echo $row['ID'];?>">
      <button type="submit" class="red-icon-button">
        <i class="fas fa-trash-alt"></i>
      </button>
    </form>
  </td>
</tr>




<?php 
$cnt=$cnt+1;
}?>

</table>

</div>






        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
   <?php include_once('includes/footer.php');?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  
</body>

</html>
<?php }  ?>
