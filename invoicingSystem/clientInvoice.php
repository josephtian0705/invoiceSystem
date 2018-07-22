<?php
  // session_start();
  // include(location:"../php/connection.php")
   include("connection.php");

   session_start();

   $currentUser = $_SESSION['userId'];
   $username = "SELECT companyName FROM adminmanageclient WHERE clientId = '$currentUser'";
  $usernameQuery = mysqli_query($database, $username);
  $usernameFetch = mysqli_fetch_assoc($usernameQuery);

if(!isset($currentUser)){

  header("location: clientlogin.php");

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
  <script src="jscript/script.js"></script>
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
                        <?php

                      $imageSql = "SELECT * FROM images WHERE clientId = $currentUser";
                      $imageResult = mysqli_query($database, $imageSql);

                      if(mysqli_num_rows($imageResult) > 0){
                        while($imageRow = mysqli_fetch_assoc($imageResult)){
                          echo "<div>";
                            if($imageRow['uploadStatus'] == 1){

                              echo "<img src='uploads/profile".$currentUser.".jpg?'".mt_rand()."'  class='img-circle elevation-2'>";

                            } else {

                              echo "<img src='uploads/profiledefault.jpg' class='img-circle elevation-2'>";
                            }

                          echo "</div>";

                        }

                      }
                  ?>
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
                        <h1 class="m-0 text-dark">Invoice</h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Invoice</li>
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
                     <div class="col-md-12">
                        <br>
                        <h4 class="m-0"><strong>Customer Invoice List</strong></h4>
                        <br>
                        <ul class="nav nav-pills">
                           <li class="nav-item">
                              <a class="nav-link" href=""></a>
                           </li>
                        </ul>

                        <!-- invoice table navigation-->
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand">Invoice Table Detail</a>

                          <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                              <li class="nav-item active">
                                <a class="nav-link" onclick="tableAll()">All</a>
                              </li>
                              <li class="nav-item active">
                                <a class="nav-link" onclick="tableDraft()">Draft</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" onclick="tablePaid()">Paid</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" onclick="tableOverdue()">Overdue</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link disabled" onclick="tablePartial()">Partial</a>
                              </li>
                            </ul>
                          </div>

                        </nav>

                        <br>

                        <button name="createNewInvoiceBtn" id="createNewInvoiceBtn" data-toggle="modal" data-target="#createInvoiceModal" class="btn btn-primary float-sm-right">Create New Invoice</button>
                        <br>
                        <br>

                        <!--PHP will put at here afterward to display data from database-->
                        <div id="allTable" onload="tableAll()" style="display: block;">
                        <table id="invoiceTable" class="table table-bordered table-hover">
                           <thead>
                              <tr>
                                 <th>Status</th>
                                 <th>Date</th>
                                 <th>Invoice Number</th>
                                 <th>Customer Name</th>
                                 <th>Amount</th>
                                 <th>Total Amount</th>
                                 <th>Balance</th>
                                 <th>Edit/Delete</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>Paid</td>
                                 <td>2/5/2018</td>
                                 <td>14589</td>
                                 <td>Manami Yamada</td>
                                 <td>RM4587</td>
                                 <td>1000</td>
                                 <td>100</td>
                                 <td>
                                    <div class="dropdown">
                                       <button class="btn btn-default dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown">Action</button>
                                       <ul class="dropdown-menu" >
                                          <li><a href="">View</a></li>
                                          <li><a href="">Edit</a></li>
                                          <li><a href="">Print</a></li>
                                          <li><a href="">Duplicate</a></li>
                                          <li><a href="">Export PDF</a></li>
                                          <li><a href="">Delete</a></li>
                                       </ul>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Overdue</td>
                                 <td>5/7/2018</td>
                                 <td>48799</td>
                                 <td>Chuks Agu</td>
                                 <td>RM5698</td>
                                 <td>1000</td>
                                 <td>100</td>
                                 <td>
                                    <div class="dropdown">
                                       <button class="btn btn-default dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown">Action</button>
                                       <ul class="dropdown-menu" >
                                          <li><a href="">View</a></li>
                                          <li><a href="">Edit</a></li>
                                          <li><a href="">Print</a></li>
                                          <li><a href="">Duplicate</a></li>
                                          <li><a href="">Export PDF</a></li>
                                          <li><a href="">Delete</a></li>
                                       </ul>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Partial</td>
                                 <td>12/5/2018</td>
                                 <td>xd569</td>
                                 <td>Stephen Gill</td>
                                 <td>RM5000</td>
                                 <td>1000</td>
                                 <td>100</td>
                                 <td>
                                    <div class="dropdown">
                                       <button class="btn btn-default dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown">Action</button>
                                       <ul class="dropdown-menu" >
                                          <li><a href="">View</a></li>
                                          <li><a href="">Edit</a></li>
                                          <li><a href="">Print</a></li>
                                          <li><a href="">Duplicate</a></li>
                                          <li><a href="">Export PDF</a></li>
                                          <li><a href="">Delete</a></li>
                                       </ul>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Draft</td>
                                 <td>8/2/2018</td>
                                 <td>1g56hj</td>
                                 <td>Natasha Luzinda</td>
                                 <td>RM2541</td>
                                 <td>1000</td>
                                 <td>100</td>
                                 <td>
                                    <div class="dropdown">
                                       <button class="btn btn-default dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown">Action</button>
                                       <ul class="dropdown-menu" >
                                          <li><a href="">View</a></li>
                                          <li><a href="">Edit</a></li>
                                          <li><a href="">Print</a></li>
                                          <li><a href="">Duplicate</a></li>
                                          <li><a href="">Export PDF</a></li>
                                          <li><a href="">Delete</a></li>
                                       </ul>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Draft</td>
                                 <td>9/5/2018</td>
                                 <td>78we5</td>
                                 <td>Pebbi Lim</td>
                                 <td>RM2045</td>
                                 <td>1000</td>
                                 <td>100</td>
                                 <td>
                                    <div class="dropdown">
                                       <button class="btn btn-default dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown">Action</button>
                                       <ul class="dropdown-menu" >
                                          <li><a href="">View</a></li>
                                          <li><a href="">Edit</a></li>
                                          <li><a href="">Print</a></li>
                                          <li><a href="">Duplicate</a></li>
                                          <li><a href="">Export PDF</a></li>
                                          <li><a href="">Delete</a></li>
                                       </ul>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        </div>

                        <!--Display Draft Table-->
                        <div id="draftTable" style="display: none">
                           <table class="table table-bordered table-hover">
                           <thead>
                              <tr>
                                 <th>Status</th>
                                 <th>Date</th>
                                 <th>Quatation Number</th>
                                 <th>Customer Name</th>
                                 <th>Amount</th>
                                 <th>Total Amount</th>
                                 <th>Balance</th>
                                 <th>Edit/Delete</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>Draft</td>
                                 <td>8/2/2018</td>
                                 <td>1g56hj</td>
                                 <td>Natasha Luzinda</td>
                                 <td>RM2541</td>
                                 <td>1000</td>
                                 <td>100</td>
                                 <td>
                                    <div class="dropdown">
                                       <button class="btn btn-default dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown">Action</button>
                                       <ul class="dropdown-menu" >
                                          <li><a href="">View</a></li>
                                          <li><a href="">Edit</a></li>
                                          <li><a href="">Print</a></li>
                                          <li><a href="">Duplicate</a></li>
                                          <li><a href="">Export PDF</a></li>
                                          <li><a href="">Delete</a></li>
                                       </ul>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Draft</td>
                                 <td>9/5/2018</td>
                                 <td>78we5</td>
                                 <td>Pebbi Lim</td>
                                 <td>RM2045</td>
                                 <td>1000</td>
                                 <td>100</td>
                                 <td>
                                    <div class="dropdown">
                                       <button class="btn btn-default dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown">Action</button>
                                       <ul class="dropdown-menu" >
                                          <li><a href="">View</a></li>
                                          <li><a href="">Edit</a></li>
                                          <li><a href="">Print</a></li>
                                          <li><a href="">Duplicate</a></li>
                                          <li><a href="">Export PDF</a></li>
                                          <li><a href="">Delete</a></li>
                                       </ul>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        </div>

                        <div id="paidTable" style="display: none">
                        <!--Display Paid Table-->
                           <table class="table table-bordered table-hover">
                           <thead>
                              <tr>
                                 <th>Status</th>
                                 <th>Date</th>
                                 <th>Quatation Number</th>
                                 <th>Customer Name</th>
                                 <th>Amount</th>
                                 <th>Total Amount</th>
                                 <th>Balance</th>
                                 <th>Edit/Delete</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>Paid</td>
                                 <td>2/5/2018</td>
                                 <td>14589</td>
                                 <td>Manami Yamada</td>
                                 <td>RM4587</td>
                                 <td>1000</td>
                                 <td>100</td>
                                 <td>
                                    <div class="dropdown">
                                       <button class="btn btn-default dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown">Action</button>
                                       <ul class="dropdown-menu" >
                                          <li><a href="">View</a></li>
                                          <li><a href="">Edit</a></li>
                                          <li><a href="">Print</a></li>
                                          <li><a href="">Duplicate</a></li>
                                          <li><a href="">Export PDF</a></li>
                                          <li><a href="">Delete</a></li>
                                       </ul>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        </div>

                        <div id="overdueTable" style="display: none">
                        <!--Display Overdue Table-->
                        <table id="overdueTable" class="table table-bordered table-hover">
                           <thead>
                              <tr>
                                 <th>Status</th>
                                 <th>Date</th>
                                 <th>Quatation Number</th>
                                 <th>Customer Name</th>
                                 <th>Amount</th>
                                 <th>Total Amount</th>
                                 <th>Balance</th>
                                 <th>Edit/Delete</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>Overdue</td>
                                 <td>5/7/2018</td>
                                 <td>48799</td>
                                 <td>Chuks Agu</td>
                                 <td>RM5698</td>
                                 <td>1000</td>
                                 <td>100</td>
                                 <td>
                                    <div class="dropdown">
                                       <button class="btn btn-default dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown">Action</button>
                                       <ul class="dropdown-menu" >
                                          <li><a href="">View</a></li>
                                          <li><a href="">Edit</a></li>
                                          <li><a href="">Print</a></li>
                                          <li><a href="">Duplicate</a></li>
                                          <li><a href="">Export PDF</a></li>
                                          <li><a href="">Delete</a></li>
                                       </ul>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        </div>

                        <!--Display Partial Table-->
                        <div id="partialTable" style="display: none">
                         <table class="table table-bordered table-hover">
                           <thead>
                              <tr>
                                 <th>Status</th>
                                 <th>Date</th>
                                 <th>Quatation Number</th>
                                 <th>Customer Name</th>
                                 <th>Amount</th>
                                 <th>Total Amount</th>
                                 <th>Balance</th>
                                 <th>Edit/Delete</th>
                              </tr>
                           </thead>
                           <tbody>
                             
                              <tr>
                                 <td>Partial</td>
                                 <td>12/5/2018</td>
                                 <td>xd569</td>
                                 <td>Stephen Gill</td>
                                 <td>RM5000</td>
                                 <td>1000</td>
                                 <td>100</td>
                                 <td>
                                    <div class="dropdown">
                                       <button class="btn btn-default dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown">Action</button>
                                       <ul class="dropdown-menu" >
                                          <li><a href="">View</a></li>
                                          <li><a href="">Edit</a></li>
                                          <li><a href="">Print</a></li>
                                          <li><a href="">Duplicate</a></li>
                                          <li><a href="">Export PDF</a></li>
                                          <li><a href="">Delete</a></li>
                                       </ul>
                                    </div>
                                 </td>
                              </tr>
                              
                           </tbody>
                        </table>
                     </div>

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
         



         <div id="createInvoiceModal" class="modal fade">
             <div class="modal-dialog modal-lg">
              <div class="modal-content">
               <div class="modal-header">
                <h4>Create Invoice Here</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body">
                <form method="post" id="insert_form">
                 <label>Invoice Number</label>
                 <input type="text" name="invoiceNo" id="invoiceNo" class="form-control">
                 <br />
                 <label>Company Name</label>
                  <input type="text" name="companyName" id="companyName" class="form-control">
                 <br />
                 <label>Email</label>
                  <input type="text" name="email" id="email" class="form-control">
                 <br />
                 <label>Purchase Order</label>
                  <input type="text" name="purchaseOrder" id="purchaseOrder" class="form-control">
                 <br />
                 <label>Invoice Date</label>
                  <input type="date" name="companyName" id="companyName" class="form-control">
                 <br />
                 <label>Payment Due</label>
                  <input type="date" name="paymentDue" id="paymentDue" class="form-control">
                 <br />
                 <label>Address</label>
                  <textarea class="form-control" id="address" name="address"></textarea>
                 <br />
                 <button type="button" class="btn btn-success" data-dismiss="modal">Save</button             
               </form>
               <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
              </div>
             </div>
            </div>
         </div>

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
      </body>
      

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

      <!--Script language start at here-->
      <script type="text/javascript" language="javascript">
         
         $(document).ready(function(){
         
             $("#invoiceTable").DataTable({
               "paging": true,
               "lengthChange": true,
               "searching": true,
               "ordering": true,
               "info": true,
               "autoWidth": true
             });

         });




         
      </script>

</html>