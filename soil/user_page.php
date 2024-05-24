<?php
include('include/dbconnection.php');
error_reporting(0);
session_start();
if (!strlen($_SESSION['sturecmsaid']==0)) {
  header('location:login_form.php');
  } else{
   
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="vendors/chartist/chartist.min.css">
    <link rel="stylesheet" href="css/style.css">   
    <link rel="stylesheet" href="css1/style.css">   
</head>
<body>
    <div class="container-scroller">
     

      <div class="container-fluid page-body-wrapper">
        <?php include_once('include/side_user.php');?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                  <div class="row">
                      <div class="col-md-12"> 
                      <div class="d-sm-flex align-items-baseline report-summary-header">
                      </div>
                    </div>
                  </div>    
                    <div class="row report-inner-cards-wrapper">
                      <div class=" col-md -6 col-xl report-inner-card">
                        <div class="inner-card-text">
                           <?php 
                        $sql1 ="SELECT * from  soil_type";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalsoil=$query1->rowCount();
?>
                          <span class="report-title">Total Soil Types</span>
                          <h4><?php echo htmlentities($totalsoil);?></h4>
                          <a href="view-soil.php"><span class="report-count"> View Soil</span></a>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <?php 
                        $sql2 ="SELECT * from  distributor";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$totdis=$query2->rowCount();
?>
                          <span class="report-title">Total Distributors</span>
                          <h4><?php echo htmlentities($totdis);?></h4>
                          <a href="view-dis.php"><span class="report-count"> View Distributors</span></a>
                        </div>
                      </div>
                    
                    </div>
                  </div>
                </div>
              </div>
            </div>         
          </div>
         
        </div>
      </div>
    </div>
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="vendors/select2/select2.min.js"></script>
    <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <script src="js/typeahead.js"></script>
    <script src="js/select2.js"></script>
  </body>
</html><?php }  ?>