<?php 
// CSRF Protection class

require_once 'csrfclass.php';
use steveclifton\phpcsrftokens\Csrf;

// include core.php which has database connection strings and session set up
require_once('includes/core.php');

?> 
<?php

		
// if WT_insert is clicked then access the Oracle database and authenticate the user and start the session and redirect to start.php
// else error messages UserFailed Authentication and redirect to index.php

if(isset($_POST['WT_Insert'])){

    $_SESSION['bannerid'] = $_POST['BannerID'];	

   // echo $_SESSION['bannerid'];



    // sql querry to get the student details
		$sql_StudentDetails = "SELECT * FROM BANINST1.AT_AR_BALANCE_BY_ENTITY WHERE BANINST1.AT_AR_BALANCE_BY_ENTITY.ID = :BANNERID";
		// parsing the querry with the connection string
		$query_StudentDetails = oci_parse($conn, $sql_StudentDetails);
		// bind the parameter BANNERID
		OCIBindByName($query_StudentDetails,":BANNERID",$_SESSION['bannerid']);
		// execute the query and generating result
		$StudentDetails = oci_execute($query_StudentDetails);
		// $row_StudentDetails contains an associative array having key value pairs
		$row_StudentDetails = oci_fetch_array($query_StudentDetails, OCI_ASSOC);

		oci_execute($query_StudentDetails);
		oci_fetch_all($query_StudentDetails, $res);
	
		
		$_SESSION['FirstName'] =str_replace("'", "", $row_StudentDetails['FIRST_NAME']);
		$_SESSION['LastName'] = str_replace("'", "", $row_StudentDetails['LAST_NAME'] );
		$_SESSION['FullName'] = $_SESSION['FirstName']." ".$_SESSION['LastName'];
		
        //echo $_SESSION['FullName'];
}


?>

   


    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Info</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
				integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<link href="css/themes.css" rel="stylesheet" type="text/css" />

		<link href="css/login.css" rel="stylesheet" type="text/css" />
    </head>
    <body>

    <div class="container">

            <div class="row">
            
                    <div class="col-4"
                        style="padding-top:150px;padding-right:10px; padding-left:10px; border-right: 1px solid #999;">
                                <a href="index.php"><img src="images/wssu-logo.png" class="img-fluid" width="500" height="107"
                                        border="0" /></a>
                        </div> <!-- col-4 end -->

                        <div class="col-8">
                        
                        <h4>General Information - Student Passport</h4>
               
                            
                            <p class="lead">ONE-STOP SERVICE CENTER PERSONALIZED INFORMATION </p>
                            <div class="jumbotron">

                            <h6><u>General Information</u></h6>

                                    <div class="row font-weight-bold ">

                                                <div class="col-sm-3">  

                                                    <p class="text-right">Name:</p>

                                                </div>

                                                <div class="col-sm-3">
                                                    <?php echo sprintf($_SESSION['FullName']); ?>
                                                </div>



                                                <div class="col-sm-3">  

                                                        <p class="text-right">Banner ID:</p>

                                                        </div>

                                                        <div class="col-sm-3">
                                                        <?php echo sprintf($_SESSION['bannerid']); ?>
                                                        </div>

                                    </div> <!-- row 1 ends -->

                                

                            </div> <!-- Jumbotron ends -->

                            <div class="jumbotron">

<h6><u>ADMISSIONS and STUDENT HEALTH (ONLY APPLICABLE TO NEW STUDENTS)</u></h6>

        <div class="row font-weight-bold ">

                    <div class="col-sm-3">  

                        <p class="text-right">Name:</p>

                    </div>

                    <div class="col-sm-3">
                        <?php echo sprintf($_SESSION['FullName']); ?>
                    </div>



                    <div class="col-sm-3">  

                            <p class="text-right">Banner ID:</p>

                            </div>

                            <div class="col-sm-3">
                            <?php echo sprintf($_SESSION['bannerid']); ?>
                            </div>

        </div> <!-- row 1 ends -->

    

</div> <!-- Jumbotron ends -->



                                        
                        </div>
                    
            
            </div>
    
    
    
    </div>
      
    </body>
    </html>