<?php

session_start();
include ("../../config/database.php");
if(isset($_SESSION['id']) && isset($_SESSION['username'])){
$id = $_SESSION['id'];
$sid = $_SESSION['username'];
$sql_profile = "SELECT * FROM students WHERE sid = '$sid'";
$sql_profile_check = mysqli_query($conn, $sql_profile);
$sql_profile_check_result = mysqli_num_rows($sql_profile_check);
while($rows = mysqli_fetch_assoc($sql_profile_check)){
    $fname = $rows['fname'];
    $lname = $rows['lname'];
    $email = $rows['email'];
    $mobile = $rows['phone'];
    $address = $rows['address'];
    $fees = $rows['fee'];
    $status = $rows['status'];
    $center = $rows['center'];
    $course = $rows['course'];
    $batch = $rows['batch'];
    $class = $rows['class'];
    $mentor = $rows['mentor'];
    $timing = $rows['timing'];
    $date_of_joinig = $rows['dateofreg'];
    
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Student-UWS</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        a{
            text-decoration: none;
        }
        a:hover{
            text-decoration: none;
        }
    </style>
</head>
<body>
<h2 align="center" style="color: blue"><?php echo ucfirst($center) . ' (' . strtoupper($course) . ')' ?></h2>
<div class="header">

    <span style="font-size:30px;cursor:pointer" class="logo" onclick="openNav()">&#9776; Menu </span>

    <div class="header-right">
        <a href="profile.php">
            <?php echo $fname . " " . $lname . " (" . strtoupper($sid) . ")" ?></a>
    </div>
</div>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="index.php" class="logo"><span style="color:white;font-size:45px">UWS Academy</span></a>
    <a href="profile.php"><?php echo $fname . " " . $lname . " (" . strtoupper($sid) . ")" ?></a>
    <a href="index.php">Home</a>
    <a href="attendance.php">Attendance</a>
    <a href="timetable.php">TimeTable</a>
    <a href="password_update.php">Update Password</a>
    <a href="../../logout.php">Logout</a>
</div>
<div class="container">
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                <img src="images/default_pic.png" alt="stack photo" class="img">
            </div>
            <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                <div class="container" style="border-bottom:1px solid black">
                    <h2><?php echo $fname.' '.$lname.' ( Mentor:'.$mentor.')'; ?></h2>
                </div>
                <hr>
                <ul class="container details">
                    <li><p><span class="glyphicon glyphicon-ok-sign" style="width:50px;"></span><?php echo $sid; ?></p></li>
                    <li><p><span class="glyphicon glyphicon-earphone one" style="width:50px;"></span><?php echo $mobile; ?></p></li>
                    <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span><?php echo $email; ?></p></li>
                    <li><p><span class="glyphicon glyphicon-map-marker one" style="width:50px;"></span><?php echo ucfirst($center).'('.strtoupper($course).')' ?></p></li>
                    <li><p><span class="glyphicon glyphicon-tower" style="width:50px;"></span><?php echo $batch.' ('.strtoupper($timing).')'; ?></p></li>
                </ul>
            </div>
        </div>
    </div>
    
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }

        
    </script>
</body>
</html>
<?php } ?>