<?php 
ob_start();
session_start();
require_once 'config.php'; 
if(!isset($_SESSION['logged_in'])){
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>Bugwar</title>
        <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link href="bootstrap4/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap4/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    
    
    
    <script src="js/jquery.min.js"></script>
    
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    
 </head>
 <body>

    <!-- Static navbar -->
		
	
	
	
<nav class="navbar navbar-toggleable-md navbar-inverse bg-primary">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#"><i class="fa fa-bug "></i>BUGwar</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        
      </li>
      <li class="nav-item">
        
      </li>
      <li class="nav-item">
        
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
	<ul class="nav navbar-nav">
	<li class="nav-item dropdown right">
						<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle" aria-haspopup="true" aria-expanded="false">
							Welcome 
							
						<?php if($_SESSION['logged_in']) { ?>
							<?php echo $_SESSION['name']; ?>
							<span class="caret"></span>
						</a>
						        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							
							
							 <a class="dropdown-item" href="logout.php">Logout</a> 
							
						</div>
						<?php } ?>
					</li>
					</ul>
      
      
	 <a href="logout.php" class="btn btn-danger" role="button"><i class="fa fa-sign-out"></i> logout</a>
    </form>
  </div>
</nav>
