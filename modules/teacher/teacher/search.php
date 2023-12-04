<?php

session_start();
if(isset($_SESSION['id']) && isset($_SESSION['username'])){
    include("../../../config/database.php");
    $id = $_SESSION['id'];
    $eid = $_SESSION['username'];
    $sql = "SELECT * FROM teachers WHERE eid = '$eid'";
    $result = mysqli_query($conn, $sql);
    $resultcheck = mysqli_num_rows($result);
    if($row = mysqli_fetch_assoc($result)){
        $fname= ucfirst($row['fname']);
        $lname = ucfirst($row['lname']);
        $center = $row['center'];
        $course = $row['course'];
        $status = $row['status'];
        $subject = $row['subject'];
    }
    if($status == 'yes' || $status == 'Yes') {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Teacher-UWS</title>
            <link rel="stylesheet" type="text/css" href="css/style.css">
        </head>
        <body>
        <h2 align="center" style="color: blue"><?php echo ucfirst($center) . ' (' . strtoupper($course) . ')' ?></h2>
        <div class="header">

            <span style="font-size:30px;cursor:pointer" class="logo" onclick="openNav()">&#9776; Menu </span>

            <div class="header-right">
                <a href="profile.php">
                    <?php echo $fname . " " . $lname . " (" . strtoupper($eid) . ")" ?></a>
            </div>
        </div>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="index.php" class="logo"><span style="color:white;font-size:45px">UWS Academy</span></a>
            <a href="profile.php"><?php echo $fname . " " . $lname . " (" . strtoupper($eid) . ")" ?></a>
            <a href="index.php">Home</a>
            <a href="attendance.php">Attendance</a>
            <a href="search.php">Search Student Information</a>
            <a href="markattendance.php">Mark Attendance</a>
            <a href="timetable.php">TimeTable</a>
            <a href="update_password.php">Update Password</a>
            <a href="../../../logout.php">Logout</a>
        </div>

        <div align="center">
            <form method="get">

                <input type="text" name="search" placeholder="Enter Student id (SID)" required>
                <input type="submit">

            </form>
        </div>

        <?php
        if(isset($_GET['search'])){
            $searchid = mysqli_real_escape_string($conn,$_GET['search']);

            $sql_search = "SELECT * FROM students WHERE sid = '$searchid' AND center = '$center'";
            $sql_search_result = mysqli_query($conn,$sql_search);
            $sql_search_result_check = mysqli_num_rows($sql_search_result);
            if($rowss = mysqli_fetch_assoc($sql_search_result)){
                $fname_student = $rowss['fname'];
                $lname_student = $rowss['lname'];
                $email_student = $rowss['email'];
                $phone_student = $rowss['phone'];
                $course_student = $rowss['course'];
                $batch_student = $rowss['batch'];
                $mentor_student = $rowss['mentor'];
            }else{
                $fname_student = "not found";
                $lname_student = "not found";
                $email_student = "not found";
                $phone_student = "not found";
                $course_student = "not found";
                $batch_student = "not found";
                $mentor_student = "not Found";
            }
        }

        ?>
        <?php if(isset($searchid)){ ?>
        <div align="center">
            <table>
                <tr>
                    <th>Sid:</th>
                    <td><?php echo $searchid; ?></td>
                </tr>
                <tr>
                    <th>Name:</th>
                    <td><?php echo $fname_student.' '.$lname_student; ?></td>
                </tr>
                <tr>
                    <th>Batch(Course):</th>
                    <td><?php echo $batch_student.' ('.$course_student.')'; ?></td>
                </tr><tr>
                    <th>Mentor:</th>
                    <td><?php echo $mentor_student; ?></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><?php echo $email_student; ?></td>
                </tr>
                <tr>
                    <th>Phone:</th>
                    <td><?php echo $phone_student; ?></td>
                </tr>
                
            </table>


        </div>
            


            <?php } ?>
        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
        </script>
        <style>
            input[type=text]{
                width: 15%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                margin-top: 6px;
                margin-bottom: 16px;
                resize: vertical;
            }

            input[type=submit] {
                background-color: #4CAF50;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
            }

            input[type=submit]:hover {
                background-color: #45a049;
            }

        </style>

        </body>
        </html>
        <?php
    }else{
        ?>
        <h1>Your account is deactivated by admin due to some reasons. kindly contact Admin for further.</h1>
        <?php
    }
}else{
    header("Location: ../../index.php");
}

?>