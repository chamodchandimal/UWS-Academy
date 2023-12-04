<?php


session_start();
if(isset($_SESSION['id']) && isset($_SESSION['username'])){
include("../../config/database.php");
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
}
if($status == 'yes' || $status == 'Yes') {
if(isset($_GET['res'])) {
    if ($_GET['res'] == 'success') {
        echo '<script>alert("Successfully done")</script>';
    }
    if ($_GET['res'] == 'fail') {
        echo '<script>alert("Failed Try Again")</script>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin-UWS</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        .linking{
            background-color: #ddffff;
            padding: 7px;
            text-decoration: none;
        }
        .linking:hover{
            background-color: blue;
            color: white;
        }

                input,button,select{
                    padding: 5px;
                    border: 2px solid blue;
                    border-radius: 10px;
                    margin: 2px;
                }
                input[type=submit],button{
                    width: 200px;
                }
                input:hover{
                    background-color: lightblue;
                }
                    input[type=submit]:hover{
                    background-color: green;
                        color: white;
                }

    </style>
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
    <a href="student.php">Student</a>
    <a href="studentattendance.php">Student Attendance</a>
    <a href="teachers.php">Teachers</a>
    <a href="teachersattendance.php">Teachers Attendance</a>
    <a href="add.php">Add TimeTable/batch</a>
    <a href="update_password.php">Update Password</a>
    <a href="../../logout.php">Logout</a>
</div>
<div align="center" style="background-color: aquamarine;padding: 10px">
    <a href="student.php?addstudent=true" class="linking">Add Student</a>
    <a href="student.php?updatestudent=true" class="linking">Update Student</a>
</div>

<?php if(isset($_GET['addstudent']) OR isset($_GET['batch'])) { ?>
    <div align="center">
        <h4>Select Batch(in which you want to add student)</h4>
        <form method="get" action="student.php">
            Batch: <select name="batch">
                     <option value="none">Select Batch</option>
                <?php
                $sql_get_batch = "SELECT * FROM batches WHERE center='$center' AND course='$course'";
                $sql_get_batch_query = mysqli_query($conn, $sql_get_batch);
                while ($rom = mysqli_fetch_assoc($sql_get_batch_query)) { ?>
                    <option value="<?php echo $rom['batch'] ?>"><?php echo $rom['batch'] ?></option>
                <?php }
                ?></select>
            <input type="submit" name="submit">
        </form>

    </div>
    <?php if (isset($_GET['submit'])) {
        if ($_GET['batch'] != 'none') {
            $batch_get = mysqli_real_escape_string($conn, $_GET['batch']);
            $get_mentorandtiming = "SELECT * FROM batches WHERE batch='$batch_get' AND course='$course' AND center='$center'";
            $get_mentorandtiming_check = mysqli_query($conn, $get_mentorandtiming);
            $get = mysqli_fetch_assoc($get_mentorandtiming_check);
            $get_mentor = $get['mentor'];
            $get_timing = $get['timings'];

            $sql = "SELECT sid FROM students ORDER BY id DESC LIMIT 1";
            $sql_q = mysqli_query($conn, $sql);
            $ro = mysqli_fetch_assoc($sql_q);
            $sid = $ro['sid'];
            
            function increment($sid)
            {
                return ++$sid[1];
            }

            $sid = preg_replace_callback("|(\d+)|", "increment", $sid);
            
            ?>
            <div align="center">
                <h3>Add Student</h3>
                <form method="post">
                    <b>SID:</b> <input type="text" name="sid" value="<?php echo $sid; ?>" disabled>
                    <b>Fname:</b> <input type="text" name="fname" placeholder="First Name">
                    &nbsp;&nbsp;<b>Lname:</b> <input type="text" name="lname" placeholder="Last Name">
                    <br><b>Email:</b> <input type="email" name="email" placeholder="Email">
                    &nbsp;&nbsp;<b>Mobile:</b> <input type="text" name="mobile" placeholder="Mobile"><br>
                    <b>Address:</b> <input type="text" name="address" placeholder="Address">
                    <b>Date Of Reg:</b> <input type="date" name="dateofreg">
                    <b>Batch Mentor</b><input type="text" name="batchmentor" value="<?php echo $get_mentor ?>" disabled>
                    <hr width="80%">
                    <br><b>Fees:</b> <input type="text" name="fees" placeholder="Total Fees">
                    <br><b>Course:</b> <input type="text" name="course" value="<?php echo ucfirst($course); ?>"
                                              disabled>
                    &nbsp;&nbsp;<b>Batch:</b> <input type="text" name="batch" value="<?php echo ucfirst($batch_get); ?>"
                                                     disabled>
                    &nbsp;&nbsp;<b>Center:</b> <input type="text" name="center" value="<?php echo ucfirst($center); ?>"
                                                      disabled>
                    <br><b>Class:</b> <input type="text" name="class" placeholder="Class">
                    <hr width="80%">
                    <br><br><input type="submit" name="add">
                </form>
            </div>
            <?php
            if (isset($_POST['add'])) {
                $st_fname = $_POST['fname'];
                $st_lname = $_POST['lname'];
                $st_email = $_POST['email'];
                $st_mobile = $_POST['mobile'];
                $st_address = $_POST['address'];
                $st_fee = $_POST['fees'];
                $st_dateofreg = $_POST['dateofreg'];
                $st_class = $_POST['class'];
                
                $sql_get_insert = "INSERT INTO students(sid, fname, lname, email, phone, address, fee,  status, course, batch, class, center, mentor, timing, dateofreg,  dateofleft) VALUES ('$sid','$st_fname','$st_lname','$st_email','$st_mobile','$st_address','$st_fee','yes','$course','$batch_get','$st_class','$center','$get_mentor','$get_timing','$st_dateofreg','0000-00-00')";
                $sql_get_insert_quary = mysqli_query($conn, $sql_get_insert);
                $insert_into_users = "INSERT INTO users (username, password, type) VALUES ('$sid','$sid','student')";
				$insert_into_users_check = mysqli_query($conn,$insert_into_users);
                 if ($sql_get_insert_quary AND $insert_into_users_check) {
                    echo '<script>location.href="student.php?res=success"</script>';
                } else {
                    echo '<script>location.href="student.php?res=fail"</script>';
                }
                

            }
        }else{
            echo '<script>alert("Please Select batch")</script>';
        }
    }
}
if(isset($_GET['updatestudent']) OR isset($_GET['studentid'])){?>
    <div align="center">
        <form method="get">
            Student Id (SID): <input type="text" name="studentid" placeholder="Enter Student Id">
            <input type="submit" name="update">
        </form>
    </div>

<?php
if(isset($_GET['studentid'])){
    $get_studentid = mysqli_real_escape_string($conn,$_GET['studentid']);

$sql_query_search = "SELECT * FROM students WHERE sid='$get_studentid' AND center='$center' AND course='$course'";
$sql_query_search_result = mysqli_query($conn,$sql_query_search);
$sql_query_search_result_check = mysqli_num_rows($sql_query_search_result);
if($sql_query_search_result_check>0)
{
$rowss = mysqli_fetch_assoc($sql_query_search_result);

?>
    <div align="center">
        <h3>Update Details - <span style="color: blue"><?php echo $get_studentid?></span></h3>
        <form method="post">
            <b>SID:</b> <input type="text" name="sid" value="<?php echo $rowss['sid'];?>" disabled>
            <b>Fname:</b> <input type="text" name="fname" value="<?php echo $rowss['fname'];?>">
            &nbsp;&nbsp;<b>Lname:</b> <input type="text" name="lname" value="<?php echo $rowss['lname']; ?>">
            <br><b>Email:</b> <input type="email" name="email" value="<?php echo $rowss['email']; ?>">
            &nbsp;&nbsp;<b>Mobile:</b> <input type="text" name="mobile" value="<?php echo $rowss['phone']; ?>"><br>
            <b>Address:</b> <input type="text" name="address" value="<?php echo $rowss['address']; ?>">
            <br><b>Fees:</b> <input type="text" name="fees" value="<?php echo $rowss['fee']; ?>" disabled>
            <br><b>Course:</b> <input type="text" name="course" value="<?php echo $rowss['course']?>" disabled>
            &nbsp;&nbsp;<b>Batch:</b> <input type="text" name="batch" value="<?php echo $rowss['batch']?>" disabled>
            &nbsp;&nbsp;<b>Center:</b> <input type="text" name="center" value="<?php echo $rowss['center'];?>" disabled>
            <br><b>Class:</b> <input type="text" name="class" value="<?php echo $rowss['class']?>">
            <br><br><input type="submit" name="update">
        </form>
        <br><a href="student.php?res=fail"><button>Cancel</button></a>

    </div>

<?php
if(isset($_POST['update'])){
    $st_fname = $_POST['fname'];
    $st_lname = $_POST['lname'];
    $st_email = $_POST['email'];
    $st_mobile = $_POST['mobile'];
    $st_address = $_POST['address'];
    $st_class = $_POST['class'];
    
    $sql_q_update = "UPDATE students SET fname='$st_fname',lname='$st_lname',email='$st_email',phone='$st_mobile',address='$st_address',class='$st_class' WHERE sid='$get_studentid' AND center='$center' AND course='$course'";
    $sql_q_update_query = mysqli_query($conn, $sql_q_update);
    if($sql_q_update_query){
        echo '<script>location.href="student.php?res=success"</script>';
    }else{
        echo '<script>location.href="student.php?res=fail"</script>';
    }

}

}
}
}?>

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