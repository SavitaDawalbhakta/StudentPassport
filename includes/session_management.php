<?php 
session_start([
    //'cookie_lifetime' => 86400,
   // 'read_and_close'  => true,
    'cookie_httponly' => true,
    'cookie_samesite' => 'Strict'
]);
session_regenerate_id();

/* Prevent XSS input */
$_GET   = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
/* I prefer not to use $_REQUEST...but for those who do: */
$_REQUEST = (array)$_POST + (array)$_GET + (array)$_REQUEST;
/*
$cookiValue = md5(uniqid(rand(), true));
setcookie('CSRFToken', $cookiValue, [
    'expires' => time() + 86400,
    'path' => '/',
    'domain' => '',
    'secure' => false,
    'httponly' => true,
    'samesite' => 'Strict',
]);*/
//header("Set-Cookie: session_name() = ''; time() - 42000; httpOnly; Secure; SameSite = Strict");
require_once('functions.php');
//echo session_name();

$file = $_SERVER["SCRIPT_NAME"];
$break = explode('/', $file);
$pfile = $break[count($break) - 1];

// Verify Post[token] with the Session[token]
/*
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	echo 'something!!!!!';
	echo $_POST['_token'] ."<br/>";
		echo $_SESSION['_token'] ."<br/>";
	//die('Valid CSRF code');

	 if (!isset($_POST['_token']) || ($_POST['_token'] !== $_SESSION['_token']) )     {
		
		die('Invalid CSRF token');

	 }

}
 
	// Generate Token
	$_SESSION['_token'] = bin2hex(openssl_random_pseudo_bytes(16));*/

/*if ($pfile != 'index.php') {
	
	if(!(isset($_SESSION['bannerid'])) || ($_SESSION['bannerid']) == ''){
		header('Location: index.php?message=logbackin');
	}
	
}*/ 
?>