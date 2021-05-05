<?php 
// CSRF Protection class

require_once 'csrfclass.php';
use steveclifton\phpcsrftokens\Csrf;

// include core.php which has database connection strings and session set up
require_once('includes/core.php');

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

        </div> <!-- row 2 ends -->

    

</div> <!-- Jumbotron 2 ends -->

<div>

<p><input name="logout" type="button" id="logout" class="btn btn-outline-danger"  value="Go Back" onclick="window.location='index.php';"/>
                              </p>
</div>

                                        
                        </div>
                    
            
            </div>
    
    
    
    </div>
      
    </body>
    </html>