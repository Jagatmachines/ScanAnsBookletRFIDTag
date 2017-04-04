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
                        
                        $sql =  mysql_query("select USN, Name, Branch from student_detail WHERE USN = '$usn'",$cn) or die(mysql_error());

                        $row = mysql_fetch_array($sql);

                        echo "<div class='col-md-12'>
                                <div class='alert alert-success'>
                                    <strong><span class='glyphicon glyphicon-ok'></span> Success!!!The student semester details are ready</strong>
                                </div>   
                            </div>";

                        
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
                                        <input type="text" class="form-control" id="name" name="name" size="50" readonly value=<?php echo $row['Name'] ?> />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="branch">Branch</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="branch" name="branch" size="50" readonly value=<?php echo $row['Branch'] ?> />
                                    </div>
                                </div>
                                <div>
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                            <!--th>Exam Year</th-->
                                                <th>S. No</th>                      
                                                <th>Subject</th>
                                                <th>Subject Code</th>
                                                <th>Marks Obtained</th>
                                            </tr>
                                        </thead>
                            
                                        <tbody>
                                            <?php

                                            $sql =  mysql_query("select A.USN, A.Name, A.Branch, B.SubCode, C.Subject, B.MarkObtain from student_detail A, marks_table B, subject C where A.USN = B.USN AND B.SubCode = C.Subcode AND A.USN = '$usn' ORDER BY SUBCODE ASC",$cn) or die(mysql_error());

                                            $i = 0;

                                            while ($row = mysql_fetch_array($sql)) {
                                              # code...
                                              echo '<tr>';
                                              echo '<td>'. ++$i. '</td>';
                                              echo '<td>'. $row['Subject'] . '</td>';
                                              echo '<td>'. $row['SubCode'] . '</td>';
                                              echo '<td>'. $row['MarkObtain'] . '</td>';
                                              echo '<tr>';
                                            }

                                             mysql_close($cn); 

                                             unset($_POST);
                                            ?>
                                        </tbody>
                                    </table>
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