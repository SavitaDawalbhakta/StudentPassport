<?php 
// CSRF Protection class

require_once 'csrfclass.php';
use steveclifton\phpcsrftokens\Csrf;

// include core.php which has database connection strings and session set up
require_once('includes/core.php');

?>

<?php

header('X-Content-Type-Options: nosniff');

//require_once('createTerm.php');

?>

<?php

// CSRF Protection code
if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
	
	$_SESSION['myMessage'] = "Valid Form Request";
	
	// Token varification for CSRF Attack
	
	$myToken = Csrf::getInputToken('index');
	 if(!Csrf::verifyToken('index', $myToken)){
		die('Invalid CSRF token Post');
	}
	 else{
		$_SESSION['myMessage'] = "Valid Form Request";
	 }


	 if(isset($_GET['message']) === "UserFailedAuthentication"){
		$myToken = Csrf::getInputToken('index');
	   if(!Csrf::verifyToken('index',$myToken)){
		   die('Invalid CSRF token Get Request');
	   }
	} 

	 // Another method to take care of CSRF attack
	 // If Headers of originated Server and Targeted Server are same

	 if (array_key_exists('HTTP_ORIGIN', $_SERVER)) {
		$origin = $_SERVER['HTTP_ORIGIN'];
	}
	else if (array_key_exists('HTTP_REFERER', $_SERVER)) {
		$origin = 'http://' .$_SERVER['SERVER_NAME'];
	} else {
		$origin = $_SERVER['REMOTE_ADDR'];
	}

	$allowOrigin = $_SERVER['HTTP_HOST'];
	//echo "HTTP_HOST " . $allowOrigin . "<br/>";

if ($origin !== null && isOriginAllowed($origin, $allowOrigin)) {
	$_SESSION['myMessage'] = "Valid Form Request updated";
    //echo "Valid request.." . "<br/>";
} else {
    exit("CSRF protection in POST request: detected invalid Origin header: " . $origin);

} 


} else{

	$myMessage = "Please Login..";
	$_SESSION['myMessage'] = $myMessage;
	
}


?>






<?php

// define variables and set to empty values
$bannerIDErr = $emailErr = $genderErr = $websiteErr = "";
$bannerID  = $email = $gender = $comment = $website = "";

		
// if WT_insert is clicked then access the Oracle database and authenticate the user and start the session and redirect to start.php
// else error messages UserFailed Authentication and redirect to index.php

if(isset($_POST['WT_Insert'])){

	 

	 if (empty($_POST["BannerID"])) {
		$bannerIDErr = "Banner ID is required";
	 }else {
		$bannerID = $_POST["BannerID"];

	 
		$_SESSION['bannerid'] = $bannerID;

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
			 $numrows = oci_fetch_all($query_StudentDetails, $res);
	 
			 if($numrows > 0 ){
	 
				 $_SESSION['FirstName'] =str_replace("'", "", $row_StudentDetails['FIRST_NAME']);
				 $_SESSION['LastName'] = str_replace("'", "", $row_StudentDetails['LAST_NAME'] );
				 $_SESSION['FullName'] = $_SESSION['FirstName']." ".$_SESSION['LastName'];
	 
				 header('Location: studentinfo.php');
			 
		 } 
		 
		 else {
			 header('Location: index.php?message=UserFailedAuthentication');
		 }



	 }
/*
	 function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	 }

*/
	 //$_SESSION['bannerid'] = $_POST['BannerID'];	


		
	
		
		
        
        //$numrows = oci_fetch_all($query_StudentDetails, $res);

        //echo $_SESSION['FullName'];

        //echo $numrows;
}


?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>WSSU: Book Voucher</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
				integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<link href="css/themes.css" rel="stylesheet" type="text/css" />

		<link href="css/login.css" rel="stylesheet" type="text/css" />

		<style>
         .error {color: #FF0000;}
      </style>
</head>

<body>

<div class="container">
	<div class="row">
	
		<div class="col-4"
		style="padding-top:150px;padding-right:10px; padding-left:10px; border-right: 1px solid #999;">
                <a href="index.php"><img src="images/wssu-logo.png" class="img-fluid" width="500" height="107"
                        border="0" /></a>
		</div> <!-- col-4 end -->
		<div class="col-8" style="padding-top:20px;padding-right:40px;padding-left:40px;">	
		<h4>General Information</h4>
               
                <!--<?php echo $_SESSION['myMessage']; ?>-->
                <p class="lead">Student Passport Info.</p>
               <div class="jumbotron">
			   		<form id="form1" class="form-group" name="form1" method="post" action="index.php" AUTOCOMPLETE="OFF">
					   <?php echo Csrf::getInputToken('index') ?>
					   <div class="form-group row">
                            <label for="BannerID" class="col-sm-2 col-form-label font-weight-bold">Banner ID:</label>
                            <div class="col-sm-10">
                                <input name="BannerID" class="form-control" type="text" id="BannerID" maxlength="9"
                                    placeholder="Please Enter your BannerID" />
									<span class = "col-sm-10 text-danger font-weight-bold text-justify"><?php echo $bannerIDErr;?></span>
                            </div>
							
                  			
             

                        </div>
                       

						<?php 
	if (isset($_GET['message']) && strip_tags($_GET['message']) == "UserFailedAuthentication") { ?>
					   <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10 text-danger font-weight-bold text-justify">
                                Entered Banner ID is not available ! Please try again.
                            </div>
                        </div>
                        <?php } ?>
										
                        <br />

						<div class="col-sm-12">
                            <center>
                                <input type="submit" class="btn btn-outline-danger" name="WT_Insert" id="WT_Insert" 
                                    value="Submit" /></center>
                        </div>


					</form>
			   </div> <!-- Jumbotron ends here -->
		
			   <blockquote class="blockquote mb-0">
                        <h4>Support Information</h4>
                        <footer class="blockquote-footer">
                            <p>Contact Info. </p>
                        </footer>
                    <blockquote>	
		</div> <!-- col-8 end -->
	
	</div> <!-- Main row end -->

</div> <!-- Container end -->


</body>

<!-- Responsive structure ended -->

</html>