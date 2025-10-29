<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style3.css">
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php
              include("php/config.php");
              if(isset($_POST['submit'])){
                
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $password =mysqli_real_escape_string($con, $_POST['password']);
                

                
                $result = mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND Password='$password'") or die("Select Error");
                $row = mysqli_fetch_assoc($result);


                if(is_array($row) && !empty($row)) {
                    $_SESSION['pass'] = $row['Password'];
                    $_SESSION['valid'] = $row['Email'];
                    $_SESSION['name'] = $row['Name'];
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['contact'] = $row['Contact'];
                    $_SESSION['id'] = $row['Id'];
                    $_SESSION['loggedin'] = true;
                    $_SESSION['img'] = $row['user_img'];
                
                    

                    
                    header("Location: after.php");
                    exit;
                } else {
                    echo "<div class='message2'>
                        <p>WRONG Username Password or Token, Please try again! </p>
                        </div><br>";
                    echo "<a href='login.php'><button class='but'>Go Back</button></a>";
                }
              } else {
            ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email" class="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>

                <div class="field input">
                    <label for="password" class="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
              

                

                <div class="field">
                    <input type="submit" name="submit" class="btn" value="Login">
                </div>

                <div class="links">
                    Don't have an account? <a href="signup.php">Sign Up</a><br>
                    <a href="forgot.php" style="margin-left: 260px; color:white;">Forgot Password</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>
