<?php

// Connects to the PROD8 (i.e. database)
$conn = oci_connect('WSSU', '2wsxcft6', '(DESCRIPTION=(TRANSPORT_CONNECT_TIMEOUT=3)(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=wssuprod-wdc.uncecs.edu)(PORT=15215)(SEND_BUF_SIZE=10485760)(RECV_BUF_SIZE=10485760))(ADDRESS=(PROTOCOL=TCP)(HOST=wssuprod-mcnc.uncecs.edu)(PORT=15215)(SEND_BUF_SIZE=10485760)(RECV_BUF_SIZE=10485760)))(SDU=65535)(CONNECT_DATA=(UR=A)(SERVICE_NAME=WSSUPROD_PRMY.wssu.edu)))');


// Connects to the Test DB (i.e. database)
//$conn = oci_connect('WSSU', 'wssu1946', '(DESCRIPTION=(TRANSPORT_CONNECT_TIMEOUT=3)(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=wssutest-mcnc.uncecs.edu)(PORT=15215)(SEND_BUF_SIZE=10485760)(RECV_BUF_SIZE=10485760))(ADDRESS=(PROTOCOL=TCP)(HOST=wssutest-mcnc.uncecs.edu)(PORT=15215)(SEND_BUF_SIZE=10485760)(RECV_BUF_SIZE=10485760)))(SDU=65535)(CONNECT_DATA=(UR=A)(SERVICE_NAME=WSSUTEST_PRMY.wssu.edu)))');

if (!$conn) {
    $e = oci_error();	
    //trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
else
{
    echo "success";
   // $sql_StudentDetails = "SELECT * FROM TVRAUTH fetch first 5 rows only";

   //$sql_StudentDetails = "SELECT * FROM BANINST1.AT_AR_BALANCE_BY_ENTITY fetch first 5 rows only";


   //$sql_StudentDetails = "SELECT * FROM tbraccd fetch first 5 rows only";

   //$sql_StudentDetails = "SELECT * FROM TAISMGR.TVRAUTH fetch first 5 rows only";

   //$sql_StudentDetails = "SELECT * FROM wssu.wssu_validation fetch first 5 rows only";

   //$sql_StudentDetails = "SELECT * FROM GENERAL.GOREMAL A fetch first 5 rows only";
   
  // $sql_StudentDetails = "SELECT * FROM BANINST1.AT_AR_BALANCE_BY_ENTITY  where pidm_key between 274000 and 275000 order by 1 fetch first 100 rows only "; //WHERE BANINST1.AT_AR_BALANCE_BY_ENTITY.ID = '940274184' ";

   $sql_StudentDetails = $sql_StudentAvailableBalance = "SELECT WSSU.bzgkccrd.f_get_min_payment('274553', '202120') AS BALANCE FROM DUAL 
   
   union all
   SELECT WSSU.bzgkccrd.f_get_min_payment('274554', '202120') AS BALANCE FROM DUAL

   union all
   SELECT WSSU.bzgkccrd.f_get_min_payment('1762333', '202120') AS BALANCE FROM DUAL
   
   union all
   SELECT WSSU.bzgkccrd.f_get_min_payment('274735', '202120') AS BALANCE FROM DUAL
   
   union all
   SELECT WSSU.bzgkccrd.f_get_min_payment('50735', '202120') AS BALANCE FROM DUAL
   
   union all
   SELECT WSSU.bzgkccrd.f_get_min_payment('50736', '202120') AS BALANCE FROM DUAL
   
   
   
   ";
   



    //$sql_StudentDetails = "SELECT * FROM tbraccd fetch first 5 rows only";


  // $sql_StudentDetails = "select tbraccd_detail_code, tbraccd_term_code, tbraccd_pidm, to_char(nvl(sum(tbraccd_amount), 0),'999999.99') AS DEDUCT from tbraccd group by tbraccd_detail_code, tbraccd_term_code, tbraccd_pidm";


  //  $sql_StudentDetails = "SELECT TABLE_NAME FROM all_tables ";
    
    
    $query_StudentDetails = oci_parse($conn, $sql_StudentDetails);
    //OCIBindByName($query_StudentDetails,":BANNERID",$_SESSION['bannerid']);
    
    //OCIBindByName($query_StudentDetails,":BANNERID",$_SESSION['940266947']) ;
    
    
    //$StudentDetails = oci_execute($query_StudentDetails);
    //$row_StudentDetails = oci_fetch_array($query_StudentDetails, OCI_ASSOC);
    
    oci_execute($query_StudentDetails);
    oci_fetch_all($query_StudentDetails, $res);
    echo "<pre>\n";
    
    print_r($res);
    echo "</pre>\n";
    
    

}



/* WSSUTEST =
  (DESCRIPTION =
    (TRANSPORT_CONNECT_TIMEOUT = 3)
    (ADDRESS_LIST =
      (ADDRESS = (PROTOCOL = TCP)(HOST = wssutest-wdc.uncecs.edu)(PORT = 15215)(SEND_BUF_SIZE = 10485760)(RECV_BUF_SIZE = 10485760))
      (ADDRESS = (PROTOCOL = TCP)(HOST = wssutest-mcnc.uncecs.edu)(PORT = 15215)(SEND_BUF_SIZE = 10485760)(RECV_BUF_SIZE = 10485760))
    )
    (SDU = 65535)
    (CONNECT_DATA =
      (UR = A)
      (SERVICE_NAME = WSSUTEST_PRMY.wssu.edu)
    )
  )

  */
?>