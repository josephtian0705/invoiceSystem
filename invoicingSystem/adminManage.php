<?php

session_start();
include 'connection.php';

$currentAdmin = $_SESSION['adminId'];

if(!isset($currentAdmin)){

  header("location: adminlogin.php");

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
            <a href="index3.html" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
               style="opacity: .8">
            <span class="brand-text font-weight-light">C Invoicing System</span>
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
                        <h1 class="m-0 text-dark">Manage Client</h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item active">Manage Client</li>
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

                        <!--
                        <button id="createClientButton" data-toggle="modal" data-target="#clientModalForm" class="btn btn-primary float-sm-right">Create New Client</button>
                      -->

                        <a href="createClientPage.php"><button id="createClientButton" class="btn btn-primary float-sm-right">Create New Client</button></a>
                        <br>
                        <br>

                        <table id="clientTable" class="table table-bordered table-hover">
                           <thead>
                              <tr>
                                 <th>Company Name</th>
                                 <th>Username</th>
                                 <th>Email</th>
                                 <th>Password</th>
                                 <th>Contact</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>

                              
                                 <?php
                                 $companyQuery = "SELECT * FROM adminmanageclient";
                                 $database = mysqli_connect($servername, $username, $password, $dbname);
                                 $companyRecord = mysqli_query($database, $companyQuery);

                                 if(mysqli_num_rows($companyRecord) > 0) {
                                  while($companyResult = mysqli_fetch_assoc($companyRecord)){
                                  
                                    echo '
                                    <tr>
                                    <td>'.$companyResult["companyName"].'</td>
                                    <td>'.$companyResult["companyUsername"].'</td>
                                    <td>'.$companyResult["companyEmail"].'</td>
                                    <td>'.$companyResult["companyPassword"].'</td>
                                    <td>'.$companyResult["companyContact"].'</td>
                                    <td><a href="adminEditClient.php?editClient='.$companyResult["clientId"].'"><button class="btn btn-warning">Edit</button></a> 
                                    <a href="deleteData.php?deleteClient='.$companyResult['clientId'].'"><button class="btn btn-danger">Delete</button></td></a>
                                    </tr>';

                                       }
                                    }

                                   ?>

                                   


                           </tbody>
                        </table>
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

        

        <!--Create new client pop Up Form-->
         <div id="clientModalForm" class="modal fade">
             <div class="modal-dialog modal-lg">
              <div class="modal-content">
               <div class="modal-header">
                <h4>Create Client Here</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body">
                <form method="post" id="company_insert_form" onsubmit="return comValidation()">
                 <label>Company Name</label>
                  <input type="text" name="companyName" id="companyName" class="form-control">
                 <br />
                 <label>Company Email</label>
                  <input type="text" name="companyEmail" id="companyEmail" class="form-control">
                 <br />
                 <label>Company Contact</label>
                  <input type="text" name="companyContact" id="companyContact" class="form-control">
                 <br />
                 <label>Company Username</label>
                  <input type="text" name="companyUsername" id="companyUsername" class="form-control">
                  <span id="usersAvailability"></span>
                 <br />
                 <label>Company Password</label>
                  <input type="password" name="companyPassword" id="companyPassword" class="form-control">
                 <br />   
                 <input type="submit" class="btn btn-success" name="createClientBtn" id="createClientBtn" value="Save">         
               </form>
               <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Close</button>
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
            <strong>Copyright &copy; 2018 <a href="https://www.veecotech.com.my/">Veecotech</a>.</strong> All rights reserved.
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


      <!--Script start at here-->
      <script type="text/javascript" language="javascript">
        $(document).ready(function(){

        $('#clientTable').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
        });

        $('#company_insert_form').on('submit', function(e){
          e.preventDefault();

          if($('#companyName').val() == "")  
          {  
           alert("Customer Name is required");  
          }  
          else if($('#companyEmail').val() == '')  
          {  
           alert("Customer Email is required");  
          }  
          else if($('#companyContact').val() == '')
          {  
           alert("Customer contact is required");  
          }
          else if($('#companyUsername').val() == '')
          {  
           alert("Customer username is required");  
          }
          else if($('#companyPassword').val() == '')
          {  
           alert("Customer password is required");  
          }

          else{

              var name = $('#customerName').val();
              $.ajax({  
                type: 'POST',
                url:"adminAddClient.php",  
                method:"POST",  
                data: $('#company_insert_form').serialize(),
                success:function(data){    
                 if (data == "db_success")
                 {
                  alert('Success: ' + name + '\'s data successfully updated');
                  $('#insert_form')[0].reset();  
                  $("#createNewCustomer .close").click();

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