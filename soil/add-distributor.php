<?php
session_start();
error_reporting(0);
include('include/dbconnection.php');
if (!strlen($_SESSION['sturecmsaid']==0)) {
  header('location:logout.php');
  } else{
   if(isset($_POST['submit']))
  {
 $name=$_POST['name'];
 $email=$_POST['email'];
 $address=$_POST['address'];

$sql="insert into distributor(name,email,address)values(:name,:email,:address)";
$query=$dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->execute();
$LastInsertId=$dbh->lastInsertId();
if ($LastInsertId>0) {
 echo '<script>alert("Distributor has been added.")</script>';
 echo "<script>window.location.href ='add-distributor.php'</script>";
}
else
 {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
 }
}}
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Add Distributor</title>
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="vendors/select2/select2.min.css">
    <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css" />
    
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
      <?php include_once('include/sidebar.php');?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Add Distributor</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Add Distributor</h4>
                   
                    <form class="forms-sample" method="post">
                      
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" name="name" value="" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Email</label>
                        <input type="text" name="email" value="" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputNmae1">Address</label>
                        <textarea name="address" class="form-control" required='true'></textarea>
                      </div>
                      
                      <button type="submit" class="btn btn-primary mr-2" name="submit">Add</button>
                     
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    
  </body>
</html><?php ?>