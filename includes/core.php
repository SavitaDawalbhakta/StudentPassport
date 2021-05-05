<?php 


// Authentication and Session management
require_once('includes/session_management.php');

header('X-Content-Type-Options: nosniff');

// Database connection to Oracle , mySql

require_once('connections/oracle.php');
//require_once('connections/mysql.php');
require_once('connections/sql.php');


//Get Term
/*mysqli_select_db($BookVoucher, $database_BookVoucher);
$query_rsuser = "SELECT term FROM terms";
$rsuser = mysqli_query($BookVoucher, $query_rsuser) or die(mysqli_error());
$row_rsuser = mysqli_fetch_assoc($rsuser);
$totalRows_rsuser = mysqli_num_rows($rsuser);*/

$query_rsuser = "SELECT term FROM $dbName.terms";
$rsuser = sqlsrv_query($connSQL, $query_rsuser, array(), array("Scrollable" => SQLSRV_CURSOR_KEYSET)) ;
if( $rsuser === false) {
	die( print_r( sqlsrv_errors(), true) );
  }

$row_rsuser = sqlsrv_fetch_array( $rsuser, SQLSRV_FETCH_ASSOC);
$totalRows_rsuser = sqlsrv_num_rows($rsuser);

//$termcode = '202020';

if($totalRows_rsuser > 0){
	$termcode = $row_rsuser['term'];
	//echo $termcode ."<br/>";
}


//$termcode = '202030';

?>