<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="css/style3.css">
</head>
<body>
    <div class="container2">
        <div class="box2 form-box2">

        <?php

         include("php/config.php");
         include('smtp/PHPMailerAutoload.php');
         function sendmail_verify($name, $email, $ranvar) {
     
            $mail = new PHPMailer(); 
            $mail->IsSMTP(); 
            $mail->SMTPAuth = true; 
            $mail->SMTPSecure = 'tls'; 
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 587; 
            $mail->IsHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Username = "mangaanime2234@gmail.com";
            $mail->Password = "riel zulh nvsf gpla";
            $mail->SetFrom("mangaanime2234@gmail.com");
            $mail->Subject = 'Email verification from Manga+';
            $email_template = "
             <h2>You have Registered with Manga+ </h2>
             <h5>Verify your email address to Register with the token given below</h5>
             <h5>Your token is  $ranvar</h5>
           <h5>Enter this token number to Register</h5>
         ";
            $mail->Body = $email_template;
            $mail->AddAddress($email);
            $mail->SMTPOptions=array('ssl'=>array(
                'verify_peer'=>false,
                'verify_peer_name'=>false,
                'allow_self_signed'=>false
            ));
            if(!$mail->Send()){
                
                    echo "<div class='message'>
                             <p>Registration Failed! </p>
                       </div><br>";
                    echo "<a href='signup.php.php'><button class='but'>Register Again</button>";
                
        
            }else{
                echo "<div class='message'>
                      <p>Please verify your Email address to register. </p>
                </div><br>";
             echo "<a href='verify.php'><button class='but'>Verify</button>";
            }
         }

         if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $contact = $_POST['contact'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $ranvar = bin2hex(random_bytes(3));


       


        $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");
        if(mysqli_num_rows($verify_query) !=0){
            echo "<div class='message'>
                         <p>This email is used , Try again with another please!</p>
                   </div><br>";
            echo "<a href='javascript:self.history.back()'><button class='but'>Go Back</button>";
        }
        else{
            sendmail_verify($name,$email,$ranvar);
            $query = mysqli_query($con,"INSERT INTO verify(Name,Contact,Username,Password,Email, Verify) VALUES ('$name','$contact','$username','$password','$email', '$ranvar')");
           
             
            
                

        
            
            
         }
         }else{ 
        
           
     ?>
            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field2 input2">
                    <label for="name" class="name">Name</label>
                    <input type="text" name="name" id="name" required>
                </div>

                <div class="field2 input2">
                    <label for="email" class="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>

                <div class="field2 input2">
                    <label for="contact" class="contact">Contact</label>
                    <input type="number" name="contact" id="contact" required>
                </div>
                <div class="field2 input2">
                    <label for="username" class="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>

                <div class="field2 input2">
                    <label for="password" class="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="field2">
                    <input type="submit" name="submit" class="btn" value="Register" required>
                </div>

                <div class="links2">
                    Already a member?  <a href="login.php">Sign In</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div> 
</body>
</html>