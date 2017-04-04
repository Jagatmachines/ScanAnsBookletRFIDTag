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

    <title>Search by USN - Automation in Scanning and Processing Answer Booklet using Radio Frequency Identification Tag</title>

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
    <?php
        include("nav.php");  
    ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            	<h1 align="center">Search Student By USN</h1><br>
                
                <?php
					if(!isset($_SESSION['alogin']))
					{
						$_SESSION['invalidlogin']="true";
						header( 'Location: index.php' );
						exit();
					}
					
					if($_POST[submit]=='Search')
						{
							extract($_POST);
							
							$result =  mysql_query("select A.USN, A.Name, A.Semester, B.Subject, B.subcode, C.Marks, C.Tag_id from student_detail A, subject B, rfidtag C where A.USN = C.USN AND B.subcode = C.subcode AND A.USN = '$usn'",$cn) or die(mysql_error());

                            $row = mysql_fetch_array($result);

							echo "<div class='col-md-12'>
                					<div class='alert alert-success'>
                    					<strong><span class='glyphicon glyphicon-ok'></span> Success!!!The student details are ready</strong>
                					</div>   
            					</div>";

							unset($_POST);
						}
				?>
                
                
        		<!-- Registration form - START -->
				<div class="container">
    				<div class="row">
                        <div class="col-lg-12">

                        <form role="form" method="post">
                            <div class="col-lg-12">
                            
                                <div class="form-group">
                                    <label for="usn">USN</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="usn" id="usn" size="50" />
                                    </div>
                                </div>

                                <input type="submit" name="submit" id="submit" value="Search" class="btn btn-info pull-right"/>

                        </form>
                            
                                <div class="form-group">
                                    <label for="usn1">USN</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="usn1" id="usn1" size="50" readonly value=<?php echo $row['USN'] ?> />
                                    </div>
                                </div>
                                
                				<div class="form-group">
                  					<label for="name">Name</label>
                   					<div class="input-group">
                     			   		<input type="text" class="form-control" id="name" name="name" size="50" readonly value=<?php echo $row['Name'] ?>/>
                                    </div>
                				</div>
                				<div class="form-group">
                    				<label for="sem">Semester</label>
                    				<div class="input-group">
                        				<input type="text" class="form-control" id="sem" name="sem" placeholder="Semester" size="50" readonly value=<?php echo $row['Semester'] ?> />
                                    </div>
                				</div>
                				
                                <div class="form-group">
                    				<label for="subj">Subject Name</label>
                    				<div class="input-group">
                                    	<input type="text" class="form-control" id="subj" name="branch" size="50" readonly value=<?php echo $row['Subject'] ?> />
                                    </div>
                				</div>

                                <div class="form-group">
                                    <label for="subcd">Subject Code</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="subcd" name="subcd" size="50" readonly value=<?php echo $row['subcode'] ?> />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="marks">Marks Obtained</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="marks" name="marks" size="50" readonly value=<?php echo $row['Marks'] ?> />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tagid">RFID Tag ID</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="tagid" name="tagid" size="50" readonly value=<?php echo $row['Tag_id'] ?> />
                                    </div>
                                </div>

                        		
            				</div>

                        
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