<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style2.css">
    <title>Berser</title>
    
</head>
<body>
    <nav class="navbar background2">
        <div class="logo"><img src="../icons/logo.jpg" alt="logo"><p class="name"><span class="namem">m</span>anga<span class="plus">+</span></p></div>

        
            <ul class="nav-list">
            
            
                <li><a href="../after.php">Home</a></li>
                <li>/</li>
                <li><a href="../after.php#popular">Popular</a></li>
                <li>/</li>
                <li><a href="./berserk.php">Berserk</a></li>

                
       
        
        </ul>
    </nav>

    <section class="background2 firstsection">
        <div class="photo">
            <img src="../icons/berserk.jpg" width="400px" alt="berserk">
        </div>

        <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
            </script>

        <script src= "https://use.fontawesome.com/fe459689b4.js">
            </script>


<?php

$user_id= $_SESSION['id'];



require('../php/config.php');
$posts= mysqli_query($con,'SELECT * FROM mangas WHERE name="berserk"');
$posts=mysqli_fetch_assoc($posts);
$post_id=$posts["Id"];

$likescount= mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(*) AS likes FROM likes WHERE post_id=$post_id AND status='like' "))['likes'];

$dislikescount= mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(*) AS dislikes FROM likes WHERE post_id=$post_id AND status='dislike' "))['dislikes'];
$status= mysqli_query($con, "SELECT status FROM likes WHERE post_id=$post_id AND user_id=$user_id");
if(mysqli_num_rows($status)>0){
    $status= mysqli_fetch_assoc($status)['status'];
}else{
    $status= 0;
}



?>
        <div class="text">
            <h1 class="head">BERSERK</h1>
            <p>About : 
            Berserk (Japanese: ベルセルク, Hepburn: Beruseruku) is a Japanese manga series written and illustrated by Kentaro Miura. Set in a medieval Europe-inspired dark fantasy world, the story centers on the characters of Guts, a lone swordsman, and Griffith, the leader of a mercenary band called the "Band of the Hawk". The series follows Guts' journey seeking revenge on Griffith, who betrayed him.</p>
    <p>Author : Kentaro Miura</p>
            <div><a href="https://drive.google.com/file/d/1e-YYD8Ht6ZI-bfctHQ_G4dCVPgFafViK/view?usp=sharing">
                <button class="btn">VIEW</button>
            </a>
        </div>
        <button class= "like <?php if($status == 'like') echo "selected";?>" data-post-id=<?php echo $post_id;?>>

<i class="fa fa-thumbs-up fa-lg"></i>
<span class="likes_count<?php echo $post_id;?>" data-count = <?php echo $likescount;?>><?php echo $likescount;?></span>

</button>

<button class= "dislike <?php if($status == 'dislike') echo "selected";?>" data-post-id=<?php echo $post_id;?>>

<i class="fa fa-thumbs-down fa-lg"></i>
<span class="dislikes_count<?php echo $post_id;?>" data-count = <?php echo $dislikescount;?>><?php echo $dislikescount;?></span>

</button>


</div>

<script type="text/javascript">
$('.like, .dislike').click(function(){

var data = {
    post_id:$(this).data('post-id'),
    user_id:<?php echo $user_id;?>,
    status:$(this).hasClass('like') ? 'like' : 'dislike',



};

$.ajax({
    url:'function.php',
    type: 'post',
    data:data,
    success:function(response){
        var post_id = data['post_id'];
        var likes = $('.likes_count' + post_id);
        var $likescount= likes.data('count');

        var dislikes = $('.dislikes_count' + post_id);
        var $dislikescount= dislikes.data('count');

        var likebutton= $(".like[data-post-id=" + post_id + "]");
        var dislikebutton= $(".dislike[data-post-id=" + post_id + "]");
        if(response == 'newlike'){
            likes.html(likescount +1);
            likebutton.addClass('selected');

        }else if(response == 'newdislike' ){
            dislikes.html(dislikescount +1);
            dislikebutton.addClass('selected');


        
        }else if(response == 'changetolike'){
            likes.html(parseInt($('.likes_count' + post_id).text()) + 1);
            dislikes.html(parseInt($('.dislikes_count' + post_id).text()) - 1);
            likesbutton.addClass('selected');
            dislikebutton.removeClass('selected');


        }else if(response == 'changetodislike'){
            likes.html(parseInt($('.likes_count' + post_id).text()) - 1);
            dislikes.html(parseInt($('.dislikes_count' + post_id).text()) + 1);
            likesbutton.removeClass('selected');
            dislikebutton.addClass('selected');


        }else if(response == 'deletelike'){
            likes.html(parseInt($('.likes_count' + post_id).text()) - 1);
            likesbutton.removeClass('selected');
        }else if(response == 'deletedislike'){
            dislikes.html(parseInt($('.dislikes_count' + post_id).text()) - 1);
            dislikesbutton.removeClass('selected');
        }
        location.reload();

    }
})
})
</script>
        </div>
    </section>
 
            
            
         
            
   
    
    
</body>
</html>