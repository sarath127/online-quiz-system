<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_ziuq = "localhost";
$database_ziuq = "bugwar";
$username_ziuq = "root";
$password_ziuq = "apple";
$ziuq = mysql_pconnect($hostname_ziuq, $username_ziuq, $password_ziuq) or trigger_error(mysql_error(),E_USER_ERROR); 
?>