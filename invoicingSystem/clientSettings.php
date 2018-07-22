<?php

session_start();

include("connection.php");

$currentUser = $_SESSION['userId'];

if(!isset($currentUser)){

  header("location: clientlogin.php");

}
else{
//to take company name
$username = "SELECT companyName FROM adminmanageclient WHERE clientId = '$currentUser'";
$usernameQuery = mysqli_query($database, $username);
$usernameFetch = mysqli_fetch_assoc($usernameQuery);


$clientQuery = "SELECT * FROM adminmanageclient WHERE clientId = '$currentUser'";
$clientRecord = mysqli_query($database, $clientQuery);
$clientResult = mysqli_fetch_assoc($clientRecord);
}

?>


<!DOCTYPE html>
<!--
   This is a starter template page. Use this page to start your new project from
   scratch. This page gets rid of all links and provides the needed markup only.
   -->
<html lang="en">
   <head>
   <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>VAdmin Manage</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script type="text/javascript" src="jscript/script.js"></script>
   </head>
   <body class="hold-transition sidebar-mini">
      <div class="wrapper">
         <!-- Navbar -->
         <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
               </li>
            </ul>
         </nav>
         <!-- /.navbar -->
         <!-- Main Sidebar Container -->
         <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="clientDashboard.php" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
               style="opacity: .8">
            <span class="brand-text font-weight-light">Invoicing System</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
               <!-- Sidebar user panel (optional) -->
               <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                  <div class="image">
                    <?php

                      $imageSql = "SELECT * FROM images WHERE clientId = $currentUser";
                      $imageResult = mysqli_query($database, $imageSql);

                      if(mysqli_num_rows($imageResult) > 0){
                        while($imageRow = mysqli_fetch_assoc($imageResult)){
                          echo "<div>";
                            if($imageRow['uploadStatus'] == 1){

                              echo "<img src='uploads/profile".$currentUser.".jpg?'".mt_rand()."' class='img-circle elevation-2'>";

                            } else {

                              echo "<img src='uploads/profiledefault.jpg' class='img-circle elevation-2'>";
                            }

                          echo "</div>";

                        }

                      }
                  ?>
                    <!--
                     <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                   -->
                  </div>
                  <div class="info">
                     <p style="color: white; "><?php echo $usernameFetch['companyName'];?></p>
                  </div>
               </div>
               <!-- Sidebar Menu -->
               <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="clientDashboard.php" class="nav-link">
        
                
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="clientInvoice.php" class="nav-link">
      
                  <p>
                    Invoice
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="clientQuatation.php" class="nav-link">
                  <p>            
                     Quatation
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="clientMaintenance.php" class="nav-link">
                
                  
                  <p>
                    Maintenance
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="clientSettings.php" class="nav-link">
                  <p>
                     Setting
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="logout.php" class="nav-link">
                  <p>
                     Log Out
                  </p>
                </a>
              </li>
            </ul>
               </nav>
               <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
         </aside>
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Settings</h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item active">Update your detail below</li>
                        </ol>
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->
               </div>
               <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
               <div class="container-fluid">
                  <div class="row">
                     <!-- /.col-md-12 -->
                     <div class="col-lg-12">
                        <br>
                        <h5 class="m-0">Client List</h5>
                        <br>
                        
                        <form method="POST" action="updateData.php" enctype="multipart/form-data">
                        <label>Upload Profile Picture</label>
                        <br />
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <br />

                       <label>Company Name</label>
                        <input type="text" name="companyName" id="companyName" class="form-control" value="<?php echo $clientResult['companyName']?>">
                       <br />
                       <label>Company Email</label>
                        <input type="text" name="companyEmail" id="companyEmail" class="form-control" readonly value="<?php echo $clientResult['companyEmail']?>">
                       <br />
                       <label>Company Contact</label>
                        <input type="text" name="companyContact" id="companyContact" class="form-control" value="<?php echo $clientResult['companyContact']?>">
                       <br />
                       <label>Company Username</label>
                        <input type="text" name="companyUsername" id="companyUsername" class="form-control" readonly value="<?php echo $clientResult['companyUsername']?>">
                       <br />
                       <label>Company Password</label>
                        <input type="password" name="companyPassword" id="companyPassword" class="form-control" value="<?php echo $clientResult['companyPassword']?>">
                       <br />

                       <input type="hidden" name="clientSettingsGetId" value="<?php echo $clientResult['clientId']?>">   
                       <button type="submit" class="btn btn-success" name="clientSettingBtn" id="clientSettingBtn">Edit</button>
                       <button type="submit" class="btn btn-default" name="clientSettingCancelBtn">Cancel</button>      
                       </form>
                          
                          <br />
                          <br />
                     </div>
                     <!-- /.col-md-6 -->
                  </div>
                  <!-- /.row -->
               </div>
               <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->


         <!-- Control Sidebar -->
         <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
               <h5>Title</h5>
               <p>Sidebar content</p>
            </div>
         </aside>
         <!-- /.control-sidebar -->
         <!-- Main Footer -->
           <footer class="main-footer">
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="https://www.veecotech.com.my">Veecotech</a>.</strong> All rights reserved.
  </footer>
      </div>
         </body>
</html>
      <!-- ./wrapper -->
      <!-- REQUIRED SCRIPTS -->

      <!-- jQuery -->
      <script src="plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap 4 -->
      <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- DataTables -->
      <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
      <!-- SlimScroll -->
      <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
      <!-- FastClick -->
      <script src="plugins/fastclick/fastclick.js"></script>
      <!-- AdminLTE App -->
      <script src="dist/js/adminlte.min.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="dist/js/demo.js"></script>
