<?php
ob_start();
session_start();
require_once 'config.php'; 
?>
<?php 
	if(!empty($_POST)){
		try {
			$user_obj = new Cl_User();
			$data = $user_obj->registration( $_POST );
			if($data){
				$_SESSION['success'] = USER_REGISTRATION_SUCCESS;
				header('Location: index.php');exit;
			}
		} catch (Exception $e) {
			$_SESSION['error'] = $e->getMessage();
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>Welcome to BUGwar</title>
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link href="bootstrap4/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap4/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

   
    <script src="js/jquery.min.js"></script>
    
    <script src="js/bootstrap.min.js"></script>
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
        <a class="nav-link" href="index.php">Login <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="Register.php">Register</a>
      </li>
     
    
  </div>
</nav>
<br>
<br>
<br>
	<div class="container">
		
		
			<?php require_once 'templates/message.php';?>
			
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-horizontal" role="form" id="register-form">
              <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Register New User</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="name">Name</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                        
							   <input name="name" id="name" type="text" class="form-control" placeholder="John Doe" required autofocus>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <!-- Put name validation error messages here -->
                        </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="email">E-Mail Address</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                        
							   
							   <input name="email" id="email" type="email" class="form-control" placeholder="you@example.com" required autofocus >
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <!-- Put e-mail validation error messages here -->
                        </span>
                </div>
            </div>
        </div>
        <div class="row">
           <div class="col-md-3 field-label-responsive">
                <label for="password">College</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem">
                            <i class="fa fa-building"></i>
                        </div>
                        
							   <input name="college" id="college" type="text" class="form-control" placeholder="College" required>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="password">Phone number</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem">
                            <i class="fa fa-phone"></i>
                        </div>
                        
							   <input name="pno" id="pno" type="text" class="form-control" placeholder="Phone number" required>
                    </div>
                </div>
            </div>
        </div>
		<div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="password">Department</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem">
                            <i class="fa fa-shield"></i>
                        </div>
                        <select class="form-control" id="dept" name="dept">
                           <option>IT</option>
						   <option>CSE</option>
						   <option>ECE</option>
						   <option>EEE</option>
						   <option>EIE</option>
						   <option>MECH</option>
						   <option>AUTO</option>
						   <option>PROD</option>
						   <option>OTHER</option>
                             </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success"><i class="fa fa-user-plus"></i> Register</button>
				
				
				<a href="index.php" class="btn btn-primary" role="button"><i class="fa fa-sign-in"></i> Sign in</a>
            </div>
        </div>
				
				</form>
	</div>
	<!-- /container -->

	
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/register.js"></script>
  </body>
</html>
<?php unset($_SESSION['success'] ); unset($_SESSION['error']);  ?>    