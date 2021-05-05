<?php
//****************************************************
// Production Database
//******************************************************/

$serverName = "query12\\cascadeweb"; //serverName\instanceName
$connectionInfo = array("Database" => "Bookvoucher", "UID" => "bookvoucherp", "PWD" => "5Rca4*wdSW-6bA");
$dbName = "book_voucher";

//****************************************************
// Test Database
//******************************************************/

//$serverName = "query12\\cascadeweb"; //serverName\instanceName
//$connectionInfo = array("Database" => "bookvouchertest", "UID" => "vouchert", "PWD" => "ZRqZhc?qdg098?");
//$dbName = "book_voucher_test";

$connSQL = sqlsrv_connect($serverName, $connectionInfo);

if ($connSQL) {
    //echo "Connection established.<br />";
} else {
    echo "Connection could not be established.<br />";
    die(print_r(sqlsrv_errors(), true));
}


//$Query_user = "SELECT * FROM accounts where username = '" . $_SESSION['bannerid'] . "'";
//Production table
//$Query_user = "SELECT * FROM book_voucher.accounts";

// test db table
/*$Query_user = "SELECT * FROM $dbName.accounts";

$Query_user = "Update $dbName.accounts Set balance = 650 where username = '940323760'";
   

$stmt = sqlsrv_query($connSQL,$Query_user, array(), array("Scrollable" => SQLSRV_CURSOR_KEYSET));

if($stmt == false){

    echo "Error to retrieve info!! <br/>";
    die(print_r(sqlsrv_errors(),TRUE));
}else {
    echo "Table updated";
}



   /* while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {

        print "<pre>";
        print_r($row);
        print "</pre>";
        //var_dump($row);
    }*/

  /*  $totalRows = sqlsrv_num_rows( $stmt );
    echo "Total:" .$totalRows; */

/*
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    echo $row['username'] . ", " . $row['balance'] . "<br />";
}*/

//sqlsrv_free_stmt($stmt);



?>