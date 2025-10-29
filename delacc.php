<?php
session_start();
include('php/config.php');
    $userId = $_SESSION['id']; 

   
    $query = "DELETE FROM users WHERE Id = '$userId'";

   
    if (mysqli_query($con, $query)) {
       
        session_destroy();
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting account: " . mysqli_error($con);
    }

?>
