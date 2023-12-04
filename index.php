<?php
include("config/database.php");
$successful = "false";
session_start();
$error = "";
if(isset($_POST['login'])){
	$error = "none";
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	 $password = mysqli_real_escape_string($conn, $_POST['password']);
    if(empty($username) || empty($password)){
		sleep(1);
        $error = "Username Or password is empty";
    }
    else{
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck < 1){
			sleep(1);
          $error = "User does not exist";
        }else{
            if($row = mysqli_fetch_assoc($result)){
                if(!($password == $row['password'])){
					sleep(1);
                    $error = "Password is incorrect";
                }else if($password == $row['password']){
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['username'] = $row['username'];

						$successful = "done";
						$error = "none";
						sleep(7);
						if($row['type']=="sadmin"){
                            header("Location: modules/sadmin/");
                            exit(0);
						}
						if($row['type']=="admin"){
							header("Location: modules/admin/");
                            exit(0);
						}
						if($row['type']=="teacher"){
							header("Location: modules/teacher/");
                            exit(0);
						}
						if($row['type']=="student"){
							header("Location: modules/student/");
                            exit(0);
						}
						if($row['type']=="parent"){
						    header("Location: modules/parent/");
                            exit(0);
                        }
                }
            }
        }
    }
}
if(isset($_SESSION['id'])){
    $username1 = $_SESSION['username'];
    $sql = "SELECT * FROM users WHERE username = '$username1'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if($row['type']=="sadmin"){
        header("Location: modules/sadmin/");
        exit(0);
    }
    if($row['type']=="admin"){
        header("Location: modules/admin/");
        exit(0);
    }
    if($row['type']=="teacher"){
        header("Location: modules/teacher/");
        exit(0);
    }
    if($row['type']=="student"){
        header("Location: modules/student/");
        exit(0);
    }
    
}else{
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>UWS Academy</title>


        <link rel='stylesheet prefetch'
              href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>

        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/ss.css">

    </head>
	
	 <body>

	
	
    
    
    <br><br><br><br>
     <img src="images/cover1.jpeg" class="slide" width="1000" height="560" />
     

    

    
    <?php if ($successful == "false") {
        ?>
		<div align="center">
        <div class='login'>
		
            <div class='login_title'>
			
                <span>Login to your account</span><br>
                <span style="color:red"><?php echo $error; ?></span>
		
            </div>
			
            <div class='login_fields'>
                <form action="index.php" method="post">
                    <div class='login_fields__user'>
                        <div class='icon'>
                            <img src='images/user_icon_copy.png'>
                        </div>
                        <input placeholder='EID/SID' type='text' name="username">
                        <div class='validation'>
                            <img src='images/tick.png'>
                        </div>
                        </input>
                    </div>
                    <div class='login_fields__password'>
                        <div class='icon'>
                            <img src='images/lock_icon_copy.png'>
                        </div>
                        <input placeholder='Password' type='password' name="password">
                        <div class='validation'>
                            <img src='images/tick.png'>
                        </div>
                    </div>
                    <div class='login_fields__submit'>
                        <input type='submit' value='Log In' name="login">
                        
                    </div>
                </form>
				
            </div>
                
        </div>
    <?php } ?>
    
	
	</p>
    
    


    </body>

    </html>

<?php } ?>
