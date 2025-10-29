<?php
session_start();
include("php/config.php");
error_reporting(0);

if(isset($_POST['submit'])) {
    $filename = $_FILES["uploadfile"]["name"]; 
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "images/" . $filename;

   
    if (!empty($filename)) {
        move_uploaded_file($tempname, $folder);
        $_SESSION['img'] = $folder;
    } else {
        $folder = $_SESSION['img'];
    }

   
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $emaill = $_SESSION['valid'];

  
    $query = "UPDATE users SET user_img = '$folder', Name = '$name', Email = '$email', Contact = '$contact', Username = '$username', Password = '$password' WHERE Email = '$emaill'";
    $final = mysqli_query($con, $query);
    
    if ($final) {
        $ok = mysqli_query($con, "SELECT * FROM users WHERE Email = '$email'");
        $row = mysqli_fetch_assoc($ok);

        
        $_SESSION['pass'] = $row['Password'];
        $_SESSION['valid'] = $row['Email'];
        $_SESSION['name'] = $row['Name'];
        $_SESSION['username'] = $row['Username'];
        $_SESSION['contact'] = $row['Contact'];
        $_SESSION['img'] = $row['user_img']; 
        header("Location: user.php");
        exit();
    } else {
        echo "Could not update";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change details</title>
  <link rel="stylesheet" href="css/user.css">
</head>
<body>


  <div class="container">
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="img">
      <img src="icons/profile.jpg">
      <input type="file" name="uploadfile" >
      </div>
      

      <div class="info">
        <div class="label">
        <label>Name</label>
        <input type="text" id="name" name="name" value="<?php echo $_SESSION['name']; ?>" required>
        </div>

        <div class="label">
        <label>Email</label>
        <input type="email" id="email" name="email" value="<?php echo $_SESSION['valid']; ?>" required >
        </div>


        <div class="label">
        <label>Contact</label>
        <input type="tel" id="contact" name="contact"  value="<?php echo $_SESSION['contact']; ?>" required>
        </div>

        <div class="label">
        <label>Username</label>
        <input type="text" id="username" name="username" value="<?php echo $_SESSION['username']; ?>" required>
        </div>

        <div class="label">
        <label>Password</label>
        <input type="text" id="password" name="password" value="<?php echo $_SESSION['pass']; ?>" required>
      </div>
    </div>

    <div class="button2">
      <input type="submit"  class="submit" name="submit" value="Save">
      
    </div>

    

    </form>
    </div>
  


        

  

</body>
</html>