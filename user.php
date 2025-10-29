<?php
session_start();



if (!isset($_SESSION['valid'])) {
    header("Location: login.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User details</title>
  <link rel="stylesheet" href="css/user.css">
</head>
<body>
<?php
    if(isset($_POST['submit'])){
      header("Location:change.php");
    }else{

    }
    
    ?>

  <div class="container">
    <form action="" method="POST">
      <div class="img">
      <img src="<?php echo isset($_SESSION['img']) ? $_SESSION['img'] : 'icons/profile.jpg'; ?>" alt="
      profile" />
      </div>
      

      <div class="info">
        <div class="label">
        <label>Name</label>
        <input type="text" id="name" value="<?php echo $_SESSION['name']; ?>" readonly>
        </div>

        <div class="label">
        <label>Email</label>
        <input type="email" id="email" value="<?php echo $_SESSION['valid']; ?>"  readonly>
        </div>


        <div class="label">
        <label>Contact</label>
        <input type="tel" id="contact" value="<?php echo $_SESSION['contact']; ?>"  readonly>
        </div>

        <div class="label">
        <label>Username</label>
        <input type="text" id="username" value="<?php echo $_SESSION['username']; ?>" readonly>
        </div>

        <div class="label">
        <label>Password</label>
        <input type="password" id="password" value="<?php echo $_SESSION['pass']; ?>" readonly>
      </div>
    </div>

    <div class="button">
      <input type="submit"  class="submit" name="submit" value="Edit">
      <a href="after.php"><button type="button" class="submit">Back</button></a>
      

  
      <button type="button" onclick="confirmDelete()" class="delete">Delete Account</button>
</div>

<script>
function confirmDelete() {
  let confirmAction = confirm("Are you sure you want to delete your account?");
  
  if (confirmAction) {
    window.location.href = 'delacc.php';
  } else {
    alert("Account not deleted.");
  }
}
</script>


   

    </form>
    </div>
  


        

  

</body>
</html>



