<?php
session_start();
include('php/config.php');


       
         include('smtp/PHPMailerAutoload.php');
         function sendmail_verify($message, $email, $user_id, $name) {
     
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
            $mail->Subject = 'Your Suggestion for Manga+';
            $email_template = "
            <h4>Dear $name</h4>
             <h4>Thank you for sharing your suggestion with us.</h4>
             <h4> We truly appreciate your input and will look into it further as we continue to improve our platform.</h4>
             <h4>Your feedback is valuable to us, and we're always striving to enhance the experience for our users. If you have any other thoughts or suggestions, please don't hesitate to reach out.</h4>
             <h4>Best Regards,</h4>
           <h4>Mangatech</h4>
         ";
            $mail->Body = $email_template;
            $mail->AddAddress($email);
            $mail->SMTPOptions=array('ssl'=>array(
                'verify_peer'=>false,
                'verify_peer_name'=>false,
                'allow_self_signed'=>false
            ));
            if(!$mail->Send()){
                
                echo "<script type='text/javascript'>
        alert('Your Suggestion was NOT able to Send. Please try again.');
        window.location.href = 'after.php'; 
        </script>";
        
            }else{
                echo "<script type='text/javascript'>
                alert('Your Suggestion is successfully submitted! Thank you.');
                window.location.href = 'after.php'; 
                </script>";
                }}

if(isset($_POST['submit'])){
    $email= $_SESSION['valid'];
    $user_id= $_SESSION['id'];
    $message= mysqli_real_escape_string($con, $_POST['message']);
    $name= $_SESSION['name'];

    $result=mysqli_query($con,"INSERT INTO suggestion(user_id,sugg,email) VALUES('$user_id','$message','$email')");
    if($result){
        sendmail_verify($message,$email,$user_id,$name);
       
    }else{
        echo "<script type='text/javascript'>
        alert('Your Suggestion was NOT able to submit. Please try again.');
        window.location.href = 'after.php'; 
        </script>";

    }

}



?>