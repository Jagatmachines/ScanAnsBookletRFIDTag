<?php
  session_start();
  include("session.php");
  error_reporting(1);
  require("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Marks Obtained View - Automation in Scanning and Processing Answer Booklet using Radio Frequency Identification Tag</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
    <link href="font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="css/semantic.min.css"/>

    <!-- Custom CSS -->
    <link href="css/logo-nav.css" rel="stylesheet">

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
              <h1 align="center">Student Marks Records</h1><br>
                
              <?php
                if(!isset($_SESSION['alogin']))
                {
                  $_SESSION['invalidlogin']="true";
                  header( 'Location: index.php' );
                  exit();
                }
              ?>

              <div>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <!--th>Exam Year</th-->
                      <th>S. No</th>                      
                      <th>USN</th>
                      <th>Student Name</th>
                      <th>Semester</th>
                      <th>Subject</th>
                      <th>Subject Code</th>
                      <th>Marks Obtained</th>
                      <th>RFID Tag ID</th>
                   </tr>
                 </thead>
        
                 <tbody>

                  <?php
                    $sql = "select A.USN, A.Name, A.Semester, B.Subject, B.subcode, C.Marks, C.Tag_id from student_detail A, subject B, rfidtag C where A.USN = C.USN AND B.subcode = C.subcode";

                    $result = mysql_query($sql, $cn) or die(mysql_error());

                    $i = 0;

                    while ($row = mysql_fetch_array($result)) {
                      # code...
                      echo '<tr>';
                      echo '<td>'. ++$i. '</td>';
                      echo '<td>'. $row['USN'] . '</td>';
                      echo '<td>'. $row['Name'] . '</td>';
                      echo '<td>'. $row['Semester'] . '</td>';
                      echo '<td>'. $row['Subject'] . '</td>';
                      echo '<td>'. $row['subcode'] . '</td>';
                      echo '<td>'. $row['Marks'] . '</td>';
                      echo '<td>'. $row['Tag_id'] . '</td>';
                      echo '<tr>';
                    }

                     mysql_close($cn); 
                  ?>
                 </tbody>
                </table>
              </div>

              <input type="button" name="printg" id="printg" class="btn btn-warning btn-block btn-lg" value="Print page" onclick="window.print()">

            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>

</html>
