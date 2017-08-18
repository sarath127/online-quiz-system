
<?php 
ob_start();
session_start();
require_once 'config.php'; 
if(!isset($_SESSION['logged_in'])){
	header('Location: index.php');
}
?>
<html>
<head>
<title> Cant take test again </title> 
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
  <a class="navbar-brand" href="index.php"><i class="fa fa-bug "></i>BUGwar</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
       <li class="nav-item ">
        <a class="nav-link " href=""> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href=""></a>
      </li>
	   <li class="nav-item ">
        <a class="nav-link active" href=""> <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
	  
      
	 <a href="logout.php" class="btn btn-danger" role="button"><i class="fa fa-sign-out"></i> Logout</a>
    </form>
  </div>
</nav>
<div class="container">
<br>
<br>
<br>
<br>
<br>
<center><h1>  <?php echo $_SESSION['name']; ?>  you have already taken the test</h1></center>
<center><h1>Please logout</center>
<br>
<center><a href="logout.php"><button class="btn btn-danger btn-lg" type="submit"> <i class="fa fa-bug "></i> logout </button></a></center>
</div>
</body>