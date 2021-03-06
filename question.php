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

    <title>Add Student - Automation in Scanning and Processing Answer Booklet using Radio Frequency Identification Tag</title>

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
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <img src="images/log.png" width="100" height="40" alt="rfid" >
                </a>                
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
                <ul class="nav navbar-nav">
                    
                    <div class = "pull-right">
                        <a href="viewresult.php">View Record</a> ||
                      <a href="question.php">Marks Update</a>
                      <a href="index.php">Home</a>
                    </div>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            	<h1 align="center">Add Marks</h1><br>
                
                <?php
					if(!isset($_SESSION['alogin']))
					{
						$_SESSION['invalidlogin']="true";
						header( 'Location: index.php' );
						exit();
					}
					
					if($_POST[submit]=='Add')
						{
							extract($_POST);
							
							mysql_query("insert into marks_table(USN,Name,Branch,Semester) values ('$usn','$name','$sem','$branch')",$cn) or die(mysql_error());

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
        				<form role="form" method="post">
            				<div class="col-lg-12">
                            
                				<div class="form-group">
                    				<label for="usn">USN</label>
                    				<div class="input-group">
                        				<input type="text" class="form-control" name="usn" id="usn" placeholder="USN" size="50"/>
                                    </div>
                				</div>
                                
                				<div class="form-group">
                  					<label for="name">Name</label>
                   					<div class="input-group">
                     			   		<input type="text" class="form-control" id="name" name="name" placeholder="Name" size="50"/>
                                    </div>
                				</div>
                				<div class="form-group">
                    				<label for="sem">Semester</label>
                    				<div class="input-group">
                        				<input type="text" class="form-control" id="sem" name="sem" placeholder="Semester" size="50"/>
                                    </div>
                				</div>
                				
                                <div class="form-group">
                    				<label for="branch">Branch</label>
                    				<div class="input-group">
                                    	<input type="text" class="form-control" id="branch" name="branch" placeholder="Branch" size="50"/>
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