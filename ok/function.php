<?php
session_start();

require('../php/config.php');

$post_id = $_POST['post_id'];
$user_id = $_SESSION['id'];
$status = $_POST['status'];


$check = mysqli_query($con, "SELECT * FROM likes WHERE post_id=$post_id AND user_id=$user_id");
if (mysqli_num_rows($check) > 0) {
    
    $existing_status = mysqli_fetch_assoc($check)['status'];
    if ($existing_status == $status) {
      
        mysqli_query($con, "DELETE FROM likes WHERE post_id=$post_id AND user_id=$user_id");
        echo "delete$status";
    } else {
       
        mysqli_query($con, "UPDATE likes SET status='$status' WHERE post_id=$post_id AND user_id=$user_id");
        echo "change$status";
    }
} else {
   
    mysqli_query($con, "INSERT INTO likes (post_id, user_id, status) VALUES ($post_id, $user_id, '$status')");
    echo "new$status";
}
?>





