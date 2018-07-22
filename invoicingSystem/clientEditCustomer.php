<?php

  session_start();

  include("connection.php");
  $getCustomerId = $_GET['editCustomer'];

  $customerQuery = "SELECT * FROM clientcustomer WHERE customerId = '$getCustomerId'";
  $customerRecord = mysqli_query($database, $customerQuery);
  $customerResult = mysqli_fetch_assoc($customerRecord);


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
  <title>Veecotech Client Invoice</title>
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
  <script src="jscript/clientMaintenance.js"></script>

</head>

  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#">
              <i class="fa fa-bars">
              </i>
            </a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home
            </a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact
            </a>
          </li>
        </ul>
        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fa fa-search">
                </i>
              </button>
            </div>
          </div>
        </form>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Messages Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="fa fa-comments-o">
              </i>
              <span class="badge badge-danger navbar-badge">3
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Brad Diesel
                      <span class="float-right text-sm text-danger">
                        <i class="fa fa-star">
                        </i>
                      </span>
                    </h3>
                    <p class="text-sm">Call me whenever you can...
                    </p>
                    <p class="text-sm text-muted">
                      <i class="fa fa-clock-o mr-1">
                      </i> 4 Hours Ago
                    </p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider">
              </div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      John Pierce
                      <span class="float-right text-sm text-muted">
                        <i class="fa fa-star">
                        </i>
                      </span>
                    </h3>
                    <p class="text-sm">I got your message bro
                    </p>
                    <p class="text-sm text-muted">
                      <i class="fa fa-clock-o mr-1">
                      </i> 4 Hours Ago
                    </p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider">
              </div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Nora Silvester
                      <span class="float-right text-sm text-warning">
                        <i class="fa fa-star">
                        </i>
                      </span>
                    </h3>
                    <p class="text-sm">The subject goes here
                    </p>
                    <p class="text-sm text-muted">
                      <i class="fa fa-clock-o mr-1">
                      </i> 4 Hours Ago
                    </p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider">
              </div>
              <a href="#" class="dropdown-item dropdown-footer">See All Messages
              </a>
            </div>
          </li>
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="fa fa-bell-o">
              </i>
              <span class="badge badge-warning navbar-badge">15
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-header">15 Notifications
              </span>
              <div class="dropdown-divider">
              </div>
              <a href="#" class="dropdown-item">
                <i class="fa fa-envelope mr-2">
                </i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins
                </span>
              </a>
              <div class="dropdown-divider">
              </div>
              <a href="#" class="dropdown-item">
                <i class="fa fa-users mr-2">
                </i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours
                </span>
              </a>
              <div class="dropdown-divider">
              </div>
              <a href="#" class="dropdown-item">
                <i class="fa fa-file mr-2">
                </i> 3 new reports
                <span class="float-right text-muted text-sm">2 days
                </span>
              </a>
              <div class="dropdown-divider">
              </div>
              <a href="#" class="dropdown-item dropdown-footer">See All Notifications
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
              <i
                 class="fa fa-th-large">
              </i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
          <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">C Invoicing System
          </span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">Alexander Pierce
              </a>
            </div>
          </div>
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="clientDashboard.php" class="nav-link">
                  <i class="nav-icon fa fa-th">
                  </i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="clientInvoice.php" class="nav-link">
                  <i class="nav-icon fa fa-th">
                  </i>
                  <p>
                    Invoice
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="clientQuatation.php" class="nav-link">
                  <p>
                    <i class="nav-icon fa fa-list-alt">
                    </i> Quatation
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="clientMaintenance.php" class="nav-link">
                  <i class="nav-icon fa fas fa-wrench">
                  </i>
                  <p>
                    Maintenance
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="clientSetting.php" class="nav-link">
                  <p>
                    <i class="nav-icon fa fas fa-wrench">
                    </i> Setting
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
                <h1 class="m-0 text-dark">Edit Customer
                </h1>
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
              <div class="col-lg-12">


                <form method="POST" action="updateData.php">
                  <br />
                  <label>Customer Name</label>
                  <input class="form-control"type="text" name="customerName" value="<?php echo $customerResult['customerName']?>">

                  <br />

                  <label>Customer Email</label>
                  <input class="form-control" type="text" name="customerEmail" value="<?php echo $customerResult['customerEmail']?>">

                  <br />

                  <label>Customer Contact</label>
                  <input class="form-control" type="text" name="customerContact" value="<?php echo $customerResult['customerContact']?>">

                  <br />

                  <label>Customer Address Line</label>
                  <input class="form-control" type="text" name="customerAddressLine" value="<?php echo $customerResult['customerAddressLine']?>">

                  <br />

                  <label>Customer City</label>
                  <input class="form-control" type="text" name="customerCity" value="<?php echo $customerResult['customerCity']?>">

                  <br />

                  <label>Customer State</label>
                  <input class="form-control" type="text" name="customerState" value="<?php echo $customerResult['customerState']?>">

                  <br />

                  <label>Customer Country</label>
                  <input class="form-control" type="text" name="customerCountry" value="<?php echo $customerResult['customerCountry']?>">
                  
                  <br />

                  <label>Customer Postal</label>
                  <input class="form-control" type="text" name="customerPostal" value="<?php echo $customerResult['customerPostal']?>">

                  <br />

                  <input type="hidden" name="getNewCustomer" value="<?php echo $customerResult['customerId']?>">
                  <button class="btn btn-success" type="submit" name="editCustomerButton">Edit</button>
                  <button class="btn btn-default" type="submit" name="editCustomerCancelBtn">Cancel</button>
                </form>

              </div>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  -->
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
  </body>
</html>
