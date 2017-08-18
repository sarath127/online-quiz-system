
<?php 
ob_start();
session_start();
require_once 'config.php'; 
if(!isset($_SESSION['logged_in'])){
	header('Location: index.php');
}
?>


<?php
$user_name = "root";
$password = "apple";
$database = "bugwar";
$server = "localhost";
$db_handle = mysql_connect($server, $user_name, $password);
$db_found = mysql_select_db($database, $db_handle);
	if ($db_found) {
$result =mysql_query("SELECT * FROM  scores where user_id = ".$_SESSION['id']." ");
if ($result &&  mysql_num_rows($result)>0)

    {
       header('Location: error.php');exit;
    }
else
    {
       header('Location: start-quiz.php');exit;
    }
	}
	
	
	?>