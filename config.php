<?php

require_once 'messages.php';


define( 'BASE_PATH', 'http://localhost/php-quiz/');
define( 'DB_HOST', 'localhost' );
define( 'DB_USERNAME', 'root');
define( 'DB_PASSWORD', 'apple');
define( 'DB_NAME', 'bugwar');

function __autoload($class)
{
	$parts = explode('_', $class);
	$path = implode(DIRECTORY_SEPARATOR,$parts);
	require_once $path . '.php';
}
