<?php
session_start();
include("php/config.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="css/style3.css">
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php
              if(isset($_POST['submit'])){

                $email = $_SESSION['valid']; 

                $confirm = mysqli_real_escape_string($con, $_POST['confirm']);
                $password = mysqli_real_escape_string($con, $_POST['password']);

                if($confirm !== $password){
                    echo "<div class='message2'>
                    <p>Password DOES NOT MATCH with the Confirmed Password! Please try again. </p>
                    </div><br>";
                    echo "<a href='passchange.php'><button class='but'>Go Back</button></a>";

                } else {

                    $result = mysqli_query($con, "UPDATE users SET Password='$confirm' WHERE Email='$email'") or die("Update Error");

                    if($result) {
                        echo "<div class='message2'>
                        <p>Password Changed Successfully! Login with the new password. </p>
                        </div><br>";
                        echo "<a href='login.php'><button class='but'>OK</button></a>";
                    } else {
                        echo "<div class='message2'>
                            <p>Error in updating! </p>
                            </div><br>";
                        echo "<a href='passchange.php'><button class='but'>Go Back</button></a>";
                    } 
                }
            } else {
            ?>
            <header>Change Password</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="password" class="password">New Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="field input">
                    <label for="confirm" class="password"> Confirm Password</label>
                    <input type="password" name="confirm" id="confirm" required>
                </div>

                <div class="field">
                    <input type="submit" name="submit" class="btn" value="Change Password">
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>
