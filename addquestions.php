<?php require_once('Connections/ziuq.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "adminlogin.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
  $insertSQL = sprintf("INSERT INTO questions (question_name, answer1, answer2, answer3, answer4, answer, category_id) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['question'], "text"),
                       GetSQLValueString($_POST['option1'], "text"),
                       GetSQLValueString($_POST['option2'], "text"),
                       GetSQLValueString($_POST['option3'], "text"),
                       GetSQLValueString($_POST['option4'], "text"),
                       GetSQLValueString($_POST['answer'], "text"),
                       GetSQLValueString($_POST['batch'], "int"));

  mysql_select_db($database_ziuq, $ziuq);
  $Result1 = mysql_query($insertSQL, $ziuq) or die(mysql_error());

  $insertGoTo = "addquestions.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!Doctypehtml><head>
<title>
Add questions
</title>

	<link href="bootstrap4/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap4/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

</head>




<nav class="navbar navbar-toggleable-md navbar-inverse bg-primary">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="index.php"><i class="fa fa-bug "></i>BUGwar</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
       <li class="nav-item ">
        <a class="nav-link " href="adminpanel.php">Result <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active " href="addquestions.php">Add Qustions</a>
      </li>
	   <li class="nav-item ">
        <a class="nav-link " href="manage.php">Admin management <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
	  
      
	 <a href="<?php echo $logoutAction ?>" class="btn btn-danger" role="button"><i class="fa fa-sign-out"></i> Logout</a>
    </form>
  </div>
</nav>


<br>
<br>
<div class="container">
  <form action="<?php echo $editFormAction; ?>" method="POST" name="form">
  
  
  <div class="form-group">
  <label for="q">Question</label>
  <textarea class="form-control" rows="5" id="question" name="question"></textarea>
</div>
  <div class="form-group">
    <label for="option1">Option 1</label>
    <input type="text" class="form-control" id="o1" name="option1" required>
  </div>
  <div class="form-group">
    <label for="option2">Option 2</label>
    <input type="text" class="form-control" id="o2" name="option2" required>
  </div>
  <div class="form-group">
    <label for="option3">Option 3</label>
     <input type="text" class="form-control" id="o3" name="option3" required>
	 </div>
	 <div class="form-group">
    <label for="option4">Option 4</label>
     <input type="text" class="form-control" id="o4" name="option4" required>
	 </div>
	<div class="form-group">
    <label for="batch">Answer</label>
     <select class="form-control" id="answer" name="answer">

  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
   <option value="3">4</option>
  
</select>
  </div>
	 <div class="form-group">
    <label for="batch">batch</label>
     <select class="form-control" id="batch" name="batch">

  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  
</select>
  </div>
	 <center><input type="submit" class="btn btn-success"  name="submit" id="submit"></center>
	 <input type="hidden" name="MM_insert" value="form" />
  </form>
</div>
</body>
</html>
</body>
</html>