<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
    <link rel="stylesheet" href="css/style3.css">
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php
              include("php/config.php");
              if(isset($_POST['submit'])){
                
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $verify = mysqli_real_escape_string($con, $_POST['verify']); 

                
                $result = mysqli_query($con,"SELECT * FROM verify WHERE Email='$email' AND Verify='$verify'") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)) {
                

                    $_SESSION['pass'] = $row['Password'];
                    $_SESSION['valid'] = $row['Email'];
                    $_SESSION['name'] = $row['Name'];
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['contact'] = $row['Contact'];
                    $_SESSION['id'] = $row['Id'];

                    $name= $_SESSION['name'];
                    $email=$_SESSION['valid'];
                    $username=$_SESSION['username'];
                    $password=$_SESSION['pass'];
                    $contact=$_SESSION['contact'];

                    $query_run = mysqli_query($con,"INSERT INTO users(Name,Email,Contact,Username,Password,Verify) VALUES('$name','$email','$contact','$username','$password','$verify')") or die("Error occured");
                    echo "<script type='text/javascript'>
                      alert('Verified Successfully');
                      window.location.href = 'login.php'; 
                      </script>";
                    
                   
                    

                    
                    
                    exit;
                } else {
                    echo "<div class='message2'>
                        <p>WRONG Email address or Token verification, Please try again! </p>
                        </div><br>";
                    echo "<a href='verify.php'><button class='but'>Go Back</button></a>";
                }
              } else {
            ?>
            <header>Verify to login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email" class="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>

                <div class="field input">
                    <label for="verify" class="verify">Verification Token</label>
                    <input type="text" name="verify" id="verify" required>
                </div>

                <div class="field">
                    <input type="submit" name="submit" class="btn" value="Verify">
                </div>

                <div class="links">
                    Don't have an account? <a href="signup.php">Sign Up</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>
