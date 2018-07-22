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
        </ul>
      </nav>
      
      <!-- /.navbar -->
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">

          
          <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Invoicing System
          </span>
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

                              echo "<img src='uploads/profile".$currentUser.".jpg'  class='img-circle elevation-2'>";

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
                <h1 class="m-0 text-dark">Maintenance
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
              <!-- /.col-md-12 -->
              <div class="col-lg-12">

                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <a class="navbar-brand">Navigation</a>

                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav">
                        <li class="nav-item active">
                          <a class="nav-link" onclick="customerTable()">Customer</a>
                        </li>
                        <li class="nav-item active">
                          <a class="nav-link" onclick="productTable()">Product</a>
                        </li>
                    </div>
                </nav>


                <div id="customerDisplay" onload="customerTable()" style="display: block;">
                <br />
                <h5 class="m-0">Customer Maintenance List</h5>
                <br />

                <button name="createNewCustomerBtn" id="createNewCustomerBtn" data-toggle="modal" data-target="#createNewCustomer" class="btn btn-primary float-sm-right">Create New Customer
                </button>
                <br>
                <br>

                <table id="customerMaintenanceTable" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Name
                      </th>
                      <th>Email
                      </th>
                      <th>Contact
                      </th>
                      <th>Address
                      </th>
                      <th>Action
                      </th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    
                          $customerQuery = "SELECT * FROM clientcustomer WHERE clientId = ".$_SESSION["userId"]."";
                          $customerRecord = mysqli_query($database, $customerQuery);

                          if (mysqli_num_rows($customerRecord) > 0) {
                            while($customerResult = mysqli_fetch_assoc($customerRecord)){

                            echo "
                             <tr>
                             <td>".$customerResult["customerName"]."</td>
                             <td>".$customerResult["customerEmail"]."</td>
                             <td>".$customerResult["customerContact"]."</td>
                             <td>".$customerResult["customerAddressLine"], " ", $customerResult["customerPostal"], " ", $customerResult["customerCity"], " ", $customerResult["customerState"], " ", $customerResult["customerCountry"]."</td>
                             <td><a href='clientEditCustomer.php?editCustomer=".$customerResult['customerId']."'><button class='btn btn-warning'>Edit</button></a> 

                              <a href='deleteData.php?deleteCustomer=".$customerResult['customerId']."'><button class='btn btn-danger'>Delete</button></a></td>
                             </tr>";

                            }
                          }
                          
                          ?>
                  </tbody>
                </table>
                </div>
                
                <!--Product Table Goes At Here-->
                <div id="productDisplay" onload="productTable()" style="display: none;">
                  <br />
                  <h5 class="m-0">Product Maintenance List</h5>
                  <br />
                  <button name="createNewProductBtn" id="createNewProductBtn" data-toggle="modal" data-target="#createNewProduct" class="btn btn-primary float-sm-right">Create New Product</button>
                  <br />
                  <br />
                  <table id="productMaintenanceTable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Product Name</th>
                        <th>Product Quantity</th>
                        <th>Product Price</th>
                        <th>Product Description</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                        $productQuery = "SELECT * FROM clientproduct WHERE clientId =".$_SESSION['userId']."";
                        $productRecord = mysqli_query($database, $productQuery);

                        if (mysqli_num_rows($productRecord) > 0) {
                            while($productResult = mysqli_fetch_assoc($productRecord)){
                            
                              echo "
                             <tr>
                             <td>".$productResult["productName"]."</td>
                             <td>".$productResult["productQuantity"]."</td>
                             <td>".$productResult["productPrice"]."</td>
                             <td>".$productResult["productDescription"]."</td>
                             <td><a href='clientEditProduct.php?editProduct=".$productResult["productId"]."'><button class='btn btn-warning'>Edit</button></a>  
                             <a href = 'deleteData.php?deleteProduct=".$productResult["productId"]."'><button class='btn btn-danger'>Delete</button></a></td>
                             </tr>";
                            

                           }
                         }
                      ?>
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

      <!--Customer Pop Up Form-->
      <div id="createNewCustomer" class="modal fade">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4>Create Customer Here
              </h4>
              <button type="button" class="close" data-dismiss="modal">&times;
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="clientAddMaintenance.php" id="insert_form">
                <label>Name
                </label>
                <input type="text" name="customerName" id="customerName" class="form-control">
                <br />
                <label>Email
                </label>
                <input type="text" name="customerEmail" id="customerEmail" class="form-control">
                <br />
                <label>Contact
                </label>
                <input type="text" name="customerContact" id="customerContact" class="form-control">
                <br />
                <label>Address Line
                </label>
                <input type="text" name="customerAddress" id="customerAddress" class="form-control">
                <br />
                <label>City
                </label>
                <input type="text" name="customerCity" id="customerCity" class="form-control">
                <br />
                <label>Zip/Postal Code
                </label>
                <input type="text" name="customerPostal" id="customerPostal" class="form-control">
                <br />
                <label>State
                </label>
                <input type="text" name="customerState" id="customerState" class="form-control">
                <br />
                <label>Country
                </label>
                <input type="text" name="customerCountry" id="customerCountry" class="form-control">
                <br />
                <!-- Additional Field to Identify Variable -->
                <input id="formDataType" name="formDataType" type="hidden" value="newCustomerForm">
                <input type="submit" class="btn btn-success" name="customerBtn" id="customerBtn" value="Save">
              </form>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--Product Pop Up Form-->
      <div id="createNewProduct" class="modal fade">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4>Create Product Here
              </h4>
              <button type="button" class="close" data-dismiss="modal">&times;
              </button>
            </div>
            <div class="modal-body">
              <form id="insert_product">
                <label>Product Name
                </label>
                <input type="text" name="productName" id="productName" class="form-control">
                <br />
                <label>Product Price
                </label>
                <p>RM<input type="text" name="productPrice" id="productPrice" class="form-control"></p>
                <label>Quantity</label>
                <input class="form-control" type="text" name="productQuantity" id="productQuantity">
                <br />
                <label>Product Description
                </label>
                <textarea type="text" name="productDescription" id="productDescription" class="form-control"></textarea>
                <br />
                <!-- Additional Field to Identify Variable -->
                <input id="formDataType" name="formDataType" type="hidden" value="newProductForm">
                <input type="submit" class="btn btn-success" name="productBtn" id="productBtn" value="Save">
              </form>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
          <h5>Title
          </h5>
          <p>Sidebar content
          </p>
        </div>
      </aside>
      <!-- /.control-sidebar -->
      <!-- Main Footer -->
        <footer class="main-footer">
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="https://www.veecotech.com.my">Veecotech</a>.</strong> All rights reserved.
  </footer>

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
      
      <script type="text/javascript" language="javascript">

      //Jquery and ajax at here
      $(document).ready(function(){

        $('#customerMaintenanceTable').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
        });

        $('#productMaintenanceTable').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
        });

        $('#insert_form').on('submit', function(e){
          e.preventDefault();
          if($('#customerName').val() == "")  
          {  
           alert("Customer Name is required");  
          }  
          else if($('#customerEmail').val() == '')  
          {  
           alert("Customer Email is required");  
          }  
          else if($('#customerContact').val() == '')
          {  
           alert("Customer contact is required");  
          }
          else if($('#customerAddress').val() == '')
          {  
           alert("Customer contact is required");  
          }
          else if($('#customerCity').val() == '')
          {  
           alert("Customer city is required");  
          }
          else if($('#customerPostal').val() == '')
          {  
           alert("Customer postal is required");  
          }
          else if($('#customerState').val() == '')
          {  
           alert("Customer state is required");  
          }
          else if($('#customerCountry').val() == '')
          {  
           alert("Customer country is required");  
          }
          else{
              
              var name = $('#customerName').val();
              $.ajax({  
                type: 'POST',
                url:"clientAddMaintenance.php",  
                method:"POST",  
                data: $('#insert_form').serialize(),
                success:function(data){    
                 if (data == "db_success")
                 {
                  alert('Success: ' + name + '\'s data successfully updated');
                  $('#insert_form')[0].reset();  
                  $("#createNewCustomer .close").click();
                  $('#customerMaintenanceTable').load('clientMaintenance.php #customerMaintenanceTable');

                 }  
                 else
                  alert('Error: ' + data);    
                },
                error:function(data){
                  alert('Error: ' + data);
                }

          });
          } 

        }); 

        $('#insert_product').on('submit', function(e){
          e.preventDefault();
          if($('#productName').val() == "")  
          {  
           alert("Product Name is required");  
          }
          else if($('#productQuantity').val() == '') 
          {
            alert("Product Quantity is required");
          }
          else if($('#productPrice').val() == '')  
          {  
           alert("Product Price is required");  
          }  
          else if($('#productDescription').val() == '')
          {  
           alert("Product Description is required");  
          }
          else{
              var name = $('#productName').val();
              $.ajax({  
                type: 'POST',
                url:"clientAddMaintenance.php",  
                method:"POST",  
                data: $('#insert_product').serialize(),
                success:function(data){    
                 if (data == "db_success")
                 {
                  alert('Success: ' + name + '\'s data successfully updated');
                  $('#insert_product')[0].reset();  
                  $("#createNewProduct .close").click();
                  $('#productMaintenanceTable').load('clientMaintenance.php #productMaintenanceTable');
                 }  
                 else
                  alert('Error: ' + data);    
                },
                error:function(data){
                  alert('Error: ' + data);
                }
          });
          } 



        });   

      });
    </script>
  </body>
</html>
