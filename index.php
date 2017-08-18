<?php 
ob_start();
session_start();
require_once 'config.php'; 
?>
<script>
$(document).ready(function()
 { 
    function sigin()
    {
       document.referralForm.action = <?php echo $_SERVER['PHP_SELF']; ?>
       document.referralForm.submit();          
       return true;
    }

    function check()
    {
       document.referralForm.action = "raf-submitted.php";
       document.referralForm.submit();          
       return true;
    }
  });
  </script>

<?php 
	if( !empty( $_POST )){
		try {
			$user_obj = new Cl_User();
			$data = $user_obj->login( $_POST );
			if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
			$_SESSION['success'] = 'You are logged in successfully';}
				
else {
				header('Location: test.php');exit;	
				}
		} catch (Exception $e) {
			$error = $e->getMessage();
			$_SESSION['error'] = $error;
		}
	}
	//print_r($_SESSION);
	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
		header('Location: test.php');exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>login</title>

    <!-- Stylesheets -->
	<link href="bootstrap4/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap4/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
</head>
  <body>
  <nav class="navbar navbar-toggleable-md navbar-inverse bg-primary">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#"><i class="fa fa-bug "></i>BUGwar</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link active" href="index.php">Login <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="register.php">Register</a>
      </li>
     
    
  </div>
</nav>
<br>
<br>

	<div class="container">
		<?php require_once 'templates/ads.php';?>
		
			<?php require_once 'templates/message.php';?>
			

			<form id="login-form" method="post" class="form-horizontal" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				 
				<div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
				<br>
				<br>
                    <h2> Login</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group ">
                        <label class="sr-only" for="email">E-Mail Address</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                            <input name="email" id="email" type="email" class="form-control" placeholder="Email address" required autofocus> 
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="sr-only" for="password">Passkey</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                            <input name="password" id="password" type="password" class="form-control" placeholder="Pass key" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                        <!-- Put password error message here -->    
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6" style="padding-top: .35rem">
                    <div class="form-check mb-2 mr-sm-2 mb-sm-0">
                        <label class="form-check-label">
                            
                                              </label>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top: 1rem">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Login</button>
                    
					<a href="register.php" class="btn btn-success" role="button"><i class="fa fa-user-plus"></i> Register</a>
					
                </div>
            </div>
				 
			</form>
			
			
		
	</div>
	<!-- /container -->
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/login.js"></script>
  </body>
</html>
<?php ob_end_flush(); ?>
<?php unset($_SESSION['success'] ); unset($_SESSION['error']);  ?>    