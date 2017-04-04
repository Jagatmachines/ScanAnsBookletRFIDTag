<?php
session_start();
include("session.php");
error_reporting(1);
require("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="JGT Online Quiz">
    <meta name="author" content="Sahitya Nepal">

    <title>Sign Up Student - Automation in Scanning and Processing Answer Booklet using Radio Frequency Identification Tag</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
    <link href="font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="css/logo-nav.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
   

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            	<h1 align="center">Sign Up Student</h1><br>
                
                <?php
					/*if(!isset($_SESSION['alogin']))
					{
						$_SESSION['invalidlogin']="true";
						header( 'Location: index.php' );
						exit();
					}*/
					
					if($_POST[submit]=='Add')
						{
							extract($_POST);
							
							mysql_query("insert into student_detail(USN,Name,Branch,Semester) values ('$usn','$name','$branch','$sem')",$cn) or die(mysql_error());

							mysql_query("insert into login(loginid, pass, role) values ('$usn', '$inputPassword', 'student')", $cn) or die(mysql_error());

							echo "<div class='col-md-12'>
                					<div class='alert alert-success'>
                    					<strong><span class='glyphicon glyphicon-ok'></span> Success!!!The student details are added</strong>
                					</div>   
            					</div>";

							unset($_POST);
						}
				?>
                
                
        		<!-- Registration form - START -->
				<div class="container">
    				<div class="row">
        				<form role="form" data-toggle="validator" method="post">
            				<div class="col-lg-12">
                            
                				<div class="form-group">
                    				<label for="usn" class="control-label">USN</label>
                    				<div class="input-group">
                        				<input type="text" class="form-control control-label" name="usn" id="usn" pattern="[A-Z0-9]*" minlength="10" maxlength="10" placeholder="USN" data-error="Invalid Format of USN!" size="50"/>
                        				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                				</div>
                                
                				<div class="form-group">
                  					<label for="name" class="control-label">Name</label>
                   					<div class="input-group">
                     			   		<input type="text" class="form-control control-label" maxlength="50" id="name" name="name" data-error="Invalid Format!!! Name can be of only alphabets" placeholder="Name" size="50"/>
                     			   		<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                				</div>
                				<div class="form-group">
                    				<label for="sem" class="control-label">Semester</label>
                    				<div class="input-group">
                        				<input type="text" class="form-control control-label" id="sem" maxlength="1" pattern="[1-9]" name="sem" placeholder="Semester" size="50"/>
                                    </div>
                				</div>
                				
                                <div class="form-group">
                    				<label for="branch" class="control-label">Branch</label>
                    				<div class="input-group">
                                    	<input type="text" class="form-control control-label" id="branch" maxlength="3" pattern="[A-Z]*" name="branch" placeholder="Branch" size="50"/>
                                    </div>
                				</div>

                				<div class="form-group">
    								<label for="inputPassword" class="control-label">Password</label>
    								<div class="form-inline row">
      									<div class="form-group col-sm-6">
        									<input type="password" data-minlength="6" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password" required>
        									<div class="help-block">Minimum of 6 characters</div>
      									</div>
										<div class="form-group col-sm-6">
											<input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm" required>
											<div class="help-block with-errors"></div>
										</div>
									</div>
								</div>

                        		<input type="submit" name="submit" id="submit" value="Add" class="btn btn-info pull-right"/>
            				</div>
        				</form>
   					 </div>
				</div>
<!-- Registration form - END -->
                
                
                
            </div>
        </div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>