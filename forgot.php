<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/style3.css">
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php
              include("php/config.php");
              if(isset($_POST['submit'])){
                
                $email = mysqli_real_escape_string($con, $_POST['email']);
                
                

                
                $result = mysqli_query($con,"SELECT * FROM users WHERE Email='$email'") or die("Select Error");
                $row = mysqli_fetch_assoc($result);


                if(is_array($row) && !empty($row)) {
                   
                
                    

                    $_SESSION['valid']= $row['Email'];
                    header("Location: passchange.php");
                    exit;
                } else {
                    echo "<div class='message2'>
                        <p>Email does not exist! Register to Login</p>
                        </div><br>";
                    echo "<a href='signup.php'><button class='but'>Go Back</button></a>";
                }
              } else {
            ?>
            <header>Forgot Password</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email" class="email">Enter your Email</label>
                    <input type="email" name="email" id="email" placeholder="Email" required>
              </div>
              

                

                <div class="field">
                    <input type="submit" name="submit" class="btn" value="Enter">
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>
