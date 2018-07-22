<?php

session_start();

?>


<!DOCTYPE html>
<!--
   This is a starter template page. Use this page to start your new project from
   scratch. This page gets rid of all links and provides the needed markup only.
   -->
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Customer Quatation</title>
  <!-- Tell the browser to be responsive to screen width -->
  <!-- Font Awesome -->  <meta name="viewport" content="width=device-width, initial-scale=1">
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
            <a href="index3.html" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
               style="opacity: .8">
            <span class="brand-text font-weight-light">Invoicing System</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
               <!-- Sidebar user panel (optional) -->
               <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                  <div class="image">
                     <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                  </div>
                  <div class="info">
                     <a href="#" class="d-block">Admin</a>
                  </div>
               </div>
               <!-- Sidebar Menu -->
               <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                     <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                     <li class="nav-item">
                        <a href="adminDashboard.php" class="nav-link">
                           <i class="nav-icon fa fa-th"></i>
                           <p>
                              Dashboard
                           </p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="adminManage.php" class="nav-link">
                           <i class="nav-icon fa fa-th"></i>
                           <p>
                              Manage
                           </p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="logout.php" class="nav-link">
                           <p>
                              <i class="nav-icon fa fa-list-alt"></i>
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
                        <h1 class="m-0 text-dark">Create New Company Account</h1>
                     </div>
                     <!-- /.col -->
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
                        <h5 class="m-0">Create new company account at here!</h5>
                        <br>



					     <form method="post" id="company_insert_form" action="adminAddClient.php" onsubmit="return comValidation()">

                     <?php
                        if(isset($_GET['companyName'])){

                           $companyName = $_GET['companyName'];

                           echo '<label>Company Name</label>
                           <input type="text" name="companyName" id="companyName" class="form-control" value="'.$companyName.'">
                           <br />';
                        } else {

                           echo '<label>Company Name</label>
                           <input type="text" name="companyName" id="companyName" class="form-control">
                           <br />';

                        }

                        if(isset($_GET['companyUsername'])){

                           $companyUsername = $_GET['companyUsername'];

                           echo '<label>Company Usernmae</label>
                           <input type="text" name="companyUsername" id="companyUsername" class="form-control" value="'.$companyUsername.'">
                           <br />';

                        } else {

                           echo '<label>Company Username</label>
                           <input type="text" name="companyUsername" id="companyUsername" class="form-control">
                           <br />';

                        }

                     ?>
					
					     <label>Company Email</label>
					      <input type="text" name="companyEmail" id="companyEmail" class="form-control">
					     <br />
                    <?php
                    if(isset($_GET['companyContact'])){

                           $companyContact = $_GET['companyContact'];

                           echo '<label>Company Contact</label>
                           <input type="text" name="companyContact" id="companyContact" class="form-control" value="'.$companyContact.'">
                           <br />';

                        } else {

                           echo '<label>Company Contact</label>
                           <input type="text" name="companyContact" id="companyContact" class="form-control">
                           <br />';

                        }
                        ?>
					     <label>Company Password</label>
					      <input type="password" name="companyPassword" id="companyPassword" class="form-control">
					     <br />   
					     <button type="submit" class="btn btn-success" name="createClientBtn" id="createClientBtn">Save</button>         
					     </form>

                    <br />

                    <?php

                     //Display error message
                     if(!isset($_GET['signup'])){
                        exit();
                     }
                     else {

                        $signupCheck = $_GET['signup'];
                        if($signupCheck == "empty"){

                           echo "<p style='color: red;'>You did not fill in all field!</p>";
                           exit();

                        } else if($signupCheck == "email"){

                           echo "<p style='color: red;'>You used invalid email!</p>";
                           exit();
                        }
                     }
                    ?>

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

         <br />

       
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
      <!-- ./wrapper -->
      <!-- REQUIRED SCRIPTS -->
      <!-- jQuery -->
      <script src="plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap 4 -->
      <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- DataTables -->
      <script src="plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="plugins/datatables/dataTables.bootstrap4.min.js"></script>
      <!-- SlimScroll -->
      <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
      <!-- FastClick -->
      <script src="plugins/fastclick/fastclick.js"></script>
      <!-- AdminLTE App -->
      <script src="dist/js/adminlte.min.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="dist/js/demo.js"></script>
   </body>
</html>
