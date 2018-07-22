<?php

session_start();
include("connection.php");

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
                        <a href="clientSetting.php" class="nav-link">
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
                        <h1 class="m-0 text-dark">Quatation</h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Quatation</li>
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
                        <h5 class="m-0">Customer Quatation List</h5>
                        <br>

                        <div class="row">
                           <div class="col-md-6">

                              <form id="addQuatationForm">
                              <label>Customer Detail:</label>
                              <br />

                              <label>Customer Name</label>
                              <select class="form-control" type="text" name="customerName" id="customerName">
                                 <option>Select Customer Name</option>
                                 <option></option>
                              </select>

                              <label>Date Start</label>
                              <input class="form-control "type="date" name="customerStartDate" id="customerStartDate">

                              <label>Date End</label>
                              <input class="form-control "type="date" name="customerDateEnd" id="customerEndDate">
                           </div>

                           <div class="col-md-6">

                              <label>Bill To:</label>
                              <br />

                              <label>Address Line</label>
                              <input class="form-control "type="text" name="customerAddressLine" id="customerAddressLine">

                              <label>City</label>
                              <input class="form-control "type="text" name="customerCountry" id="customerCountry">

                              <label>Postal</label>
                              <input class="form-control "type="text" name="customerPostal" id="customerPostal" >

                              <label>State</label>
                              <input class="form-control" type="text" name="customerState" id="customerState">

                              <label>Country</label>
                              <input class="form-control" type="text" name="customerCountry" id="customerCountry">
                           </div>

                        </div>

                        <br />
                        <br />

                        <label>Product List</label>
                        <table class="table table-striped table-bordered" id="create_quatation">
                           <thead>
                              <tr>
                                 <th>Product</th>
                                 <th>Description</th>
                                 <th>Quantity</th>
                                 <th>Price</th>
                                 <th>Amount</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                        
                           <tbody>
                              <?php

                              
                              $selectProductName = "SELECT * FROM clientproduct WHERE clientid = ".$currentUser." ";

                              $productRecord = mysqli_query($database, $selectProductName);

                              

                              if(mysqli_num_rows($productRecord ) > 0){
                              ?>
                                 
                                 <tr>
                                 <td>
                                 <select class="form-control" name="quatationProduct" id="quatationProduct">
                                    <option>
                                       Select Product
                                    </option>
                                    <?php
                                    while($productResult = mysqli_fetch_assoc($productRecord)){
                                       ?>
                                    <option>
                                    <?php echo $productResult['productName']?>
                                    </option>
                                    <?php
                                    }
                                    ?>

                                 </select>
                                 </td>
                                 <td>
                                    <input class="form-control" type="text" name="productDescription" id="productDescription">
                                 </td>
                                 <td>
                                    <input class="form-control" type="text" name="productQuantity" id="productQuntity">
                                 </td>
                                 <td>
                                   <input class="form-control" type="text" name="productPrice" id="productPrice">
                                 </td>
                                 <td>
                                    <input class="form-control" type="text" name="productAmount" id="productAmount" readonly>
                                 </td>
                                 <td>
                                    <button class="btn btn-default">Add</button>
                                 </td>
                              </tr>

                           <?php
                              }
                           ?>
                           </tbody>
                        </table>

                        <div class="float-sm-right">
                           <label>Total:</label>
                           <input class="form-control" type="text" name="quatationTotal" readonly>
                           <br />
                           <button class="btn btn-success" type="submit" name="addQuatationRowBtn">Add Quatation</button>
                           <a href="clientQuatation.php"><button class="btn btn-default" type="button">Cancel</button></a>
                           <br />
                           <br />
                        </div>

                        </form>


                        <script type="text/javascript">
                           
                           $(document).read(function(){

                              var quatationProduct = $('#quatationProduct').text();
                              var productDescription = $('#productDescription').text();
                              var productQuantity = $('#productQuantity').text();
                              var productPrice = $('#productPrice').text();

                              count = 1;

                              $(document).on('click', '#addQuatationRowBtn', function(){
                                 count = count + 1;


                              });
                           });
                        </script>


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
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
               Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2018 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
         </footer>
      </div>
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

      <!--Script start at here-->
      <script type="text/javascript" language="javascript">
         $(document).ready(function () {
         
             $('#create_new_quatation').DataTable({
               "paging": true,
               "lengthChange": true,
               "searching": true,
               "ordering": true,
               "info": true,
               "autoWidth": true
             });


              $('#addQuatationForm').on('submit',function(e){

                  e.preventDefault();

                  if(('#customerName').val() = ""){

                     alert("Customer name is require");

                  } else 

                  if(('#customerStartDate').val() = ""){

                     alert("Start date is require")；
                  }

                  else

                     if(('#customerEndDate').val() = ""){

                        alert("End date is require");
                     }
              });
                  
         
      </script>
   </body>
</html>