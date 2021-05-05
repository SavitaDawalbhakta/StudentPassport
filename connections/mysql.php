<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
//$database_BookVoucher = "book_voucher"; Production DB
//****************************************************
// Test Database book_voucher_test.
//****************************************************
$hostname_BookVoucher = "wssumysql.wssu.edu";
$database_BookVoucher = "book_voucher_test";
$username_BookVoucher = "voucher_user";
$password_BookVoucher = "@cc3ptTh1$";
$BookVoucher = mysqli_connect($hostname_BookVoucher, $username_BookVoucher, $password_BookVoucher) or trigger_error(mysql_error(),E_USER_ERROR);

//*************************************************************** 
// Production Database
//***************************************************************

// Production DB
//$database_BookVoucher = 'book_voucher';
//$username_BookVoucher = 'voucher_user';
//$password_BookVoucher = '@cc3ptTh1$';
//$hostname_BookVoucher  = 'wssumysql.wssu.edu';
//$BookVoucher = mysqli_connect($hostname_BookVoucher, $username_BookVoucher, $password_BookVoucher) or trigger_error(mysql_error(),E_USER_ERROR);

?>