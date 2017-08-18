<?php require_once('Connections/ziuq.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}
if(empty($_SESSION['MM_Username']))
    {
        // If they are not, redirect them to the login page.
        header("Location: adminlogin.php");
        
        // Remember that this die statement is absolutely critical.  Without it,
        // people can view your members-only content without logging in.
        die("Redirecting to adminlogin.php");
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

if ((isset($_POST['hiddenField'])) && ($_POST['hiddenField'] != "")) {
  $deleteSQL = sprintf("DELETE FROM `scores` WHERE user_id=%s",
                       GetSQLValueString($_POST['hiddenField'], "int"));

 mysql_select_db($database_ziuq, $ziuq);
  $Result1 = mysql_query($deleteSQL, $ziuq) or die(mysql_error());

  
}
if ((isset($_POST['submit2'])) && ($_POST['sumbit2'] != "")) {
  $clear = sprintf("TRUNCATE TABLE scores");

 mysql_select_db($database_ziuq, $ziuq);
  $Result1 = mysql_query($clear, $ziuq) or die(mysql_error());

  
}
mysql_select_db($database_ziuq, $ziuq);
$query_Recordset1 = "SELECT * FROM users u inner join scores s on u.id=s.user_id order by right_answer desc";
$Recordset1 = mysql_query($query_Recordset1, $ziuq) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!Doctypehtml><head>
<title>
Admin panel
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
        <a class="nav-link active" href="adminpanel.php">Result <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link  " href="addquestions.php">Add Qustions</a>
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
<form name="form1" method="post" action=""> 
  <h2>Score of <?php echo $totalRows_Recordset1 ?> candidates <button type="submit"  name="Submit2"  class="btn btn-success" id="Submit2" > <i class="fa fa-bolt "></i> Clear all</button></h2>
	
  <p></p>            
  <br>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>College</th>
		<th>Department</th>
        <th>Phone number</th>
		   <th>Email</th>
		<th>score</th>
		<th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php do { ?>
        <tr>
          <td><?php echo $row_Recordset1['name'];?></td>
          <td><?php echo $row_Recordset1['college'];?></td>
          <td><?php echo $row_Recordset1['dept'];?></td>
          <td><?php echo $row_Recordset1['pno'];?></td>
		   <td><?php echo $row_Recordset1['email'];?></td>
          <td><?php echo $row_Recordset1['right_answer'];?></td>
          
		  <td> 
		  
		  <button type="submit" class="btn btn-danger" name="Submit"><i class="fa fa-trash"></i> delete user</button>
		  <input name="hiddenField" type="hidden" id="hiddenField" value="<?php echo $row_Recordset1['user_id']; ?>"></form></td>
        </tr>
        <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
    </tbody>
  </table>
</div>

</body>
</html
><?php
mysql_free_result($Recordset1);
?>
</body>
</html>