<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Client Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <label>Invoicing System Login</label>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Login At Here!</p>

      <form action="getUsersAccount.php" method="POST" onsubmit="return loginValidation()">
        <div class="form-group has-feedback">
        	<span class="fa fa-envelope form-control-feedback"></span>
          	<input type="text" name="usersName" id="usersName" class="form-control" placeholder="Username">
        </div>
        <div class="form-group has-feedback">
        	<span class="fa fa-lock form-control-feedback"></span>
          	<input type="password" name="usersPassword" id="usersPassword" class="form-control" placeholder="Password">
        </div>

        <br />
          <div class="text-center">
            <button type="submit" name="loginBtn" class="btn btn-block btn-primary">Login</button>
          </div>

          <br />
          <div class="login-box-msg" style="color:red;">
          	<p>If you want to register a account, Please go to <a href="https://www.veecotech.com.my">Veecotech</a> for more information</p>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>

	var usersName = document.getElementById('usersName').value;
	var usersPassword = document.getElementById('usersPassword').value;

	function loginValidation(){

		if (usersName = "") {

			alert("Please Enter Your Username!");

		}  

		if (usersPassword = ""){

			alert("Please enter your password!");
		}
	}

	$(function () {
	    $('input').iCheck({
	      checkboxClass: 'icheckbox_square-blue',
	      radioClass   : 'iradio_square-blue',
	      increaseArea : '20%' // optional
	    })
  	})
</script>
</body>
</html>

