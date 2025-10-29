<?php

session_start();


if (isset($_SESSION['valid'])) {
   
    header("Location: after.php");
    exit(); 
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <title>manga</title>
</head>


<body>
    <nav class="navbar background">
        <div class="logo"><img src="icons/logo.jpg" alt="logo"><p class="name"><span class="namem">m</span>anga<span class="plus">+</span> </p></div>
        
        <div class="middleNav">
            <input type="search" name="search" id="search" placeholder="Search manga">
            <a href="#" id="search">
            <button class="btn" onclick="checkLogin(event)">Search</button>
        </a>
        </div>
        
            <ul class="nav-list">
            
            
                <li><a href="#ok">Home</a></li>
                <li><a href="#popular">Popular</a></li>
                <li><a href="signup.php">Sign Up</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="#contact">Contact Us</a></li>
                
       
        
        </ul>
    </nav>

    <section class="background firstsection" id="ok">
    <div class="text"><p><span class=rest>There’s always a</span><span class="new"> NEW WORLD</span>     to explore with every turn of the page.</p></div>

        <div class="mainbox">
            <a href="#title4"   id="linka">
                <div class="first">
                <img  alt="Kamisama Hajimemashita"   id="kami" >
                </div>
            </a>
            
            
        <script>
            let i = 0;
            let images = [];
            let time = 3000;
           
            
            images[0] = "icons/aot.jpg";
            images[1] = "icons/onep.jpg";
            images[2] = "icons/ds.jpg";
            images[3] = "icons/naruto.webp";
            images[4] = "icons/death.jpg";
            images[5] = "icons/your.jpg";
           
            function first(){
                document.getElementById("kami").src= images[i];

                if(i < images.length - 1){
                    i++;

                } else {
                    i=0;
                }

                setTimeout("first()",time);
            }
            window.onload = first;
            </script>

           
        </div>
    </section>
    <section class="ok" id="popular">

    <?php  
      $is_logged_in = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ? 'true' : 'false';
    ?>
<script>
    var isLoggedIn = <?php echo $is_logged_in; ?>;

    function checkLogin(event) {
        if (!isLoggedIn) {
            event.preventDefault();
            alert('You must be logged in to view this content.');
            window.location.href = 'login.php';
        }
    }
</script>

        
        <div class="titl">Action</div>
        <div class="b">
            <div class="r1">
                <div class="c1">
                    <a href="ok/tokyo.php" onclick="checkLogin(event)">
                        <div class="rr1"><img src="icons/ghoul.jpg" alt="attack" class="sur"></div></a>
                        <div class="rr2">TOKYO GHOUL</div>
                    </div>
                    <div class="c2">
                        <a href="ok/berserk.php" onclick="checkLogin(event)">
                            <div class="rr1"><img src="icons/berserk.jpg" alt="attack" class="sur"></div></a>
                            <div class="rr2">BERSERK</div>
                        </div>
                        <div class="c3">
            <a href="ok/shigu.php" onclick="checkLogin(event)">
                <div class="rr1"><img src="icons/shig.jpg" alt="attack" name=""class="sur"></div></a>
                <div class="rr2">SHIGURUI</div>
            
            </div>
        </div>
    </div>
</section>
    <section id="title2">
    <div class="title">Yaoi</div>
    <div class="b">
        <div class="r1">
            <div class="c1">
                <a href="ok/myhero.php" onclick="checkLogin(event)">
                    <div class="rr1"><img src="icons/hitorijime.jpg" alt="attack" class="sur"></div></a>
                <div class="rr2">HITORIJIME MY HERO</div>
            </div>
            <div class="c2">
                <a href="ok/sasaki.php" onclick="checkLogin(event)">
                    <div class="rr1"><img src="icons/sa.jpg" alt="attack" class="sur"></div></a>
                <div class="rr2">SASAKI AND MIYANO</div>
            </div>
            <div class="c3">
                <a href="ok/given.php" onclick="checkLogin(event)">
                    <div class="rr1"><img src="icons/given.jpg" alt="attack" class="sur"></div></a>
                <div class="rr2">GIVEN</div>
            </div>
        </div>
    </div>
</section>
<section id="title3">
    <div class="title">Romance</div>
    <div class="b">
        <div class="r1">
            <div class="c1">
                <a href="ok/kami.php" onclick="checkLogin(event)">
                    <div class="rr1"><img src="icons/kamisama.jpg" alt="attack" class="sur"></div></a>
                <div class="rr2">KAMISAMA KISS</div>
            </div>
            <div class="c2">
                <a href="ok/each.php" onclick="checkLogin(event)">
                    <div class="rr1"><img src="icons/maid.webp" alt="attack" class="sur"></div></a>
                <div class="rr2">FRUIT BASKET</div>
            </div>
            <div class="c3">
                <a href="ok/otaku.php" onclick="checkLogin(event)">
                    <div class="rr1"><img src="icons/lov.jpg" alt="attack" class="sur"></div></a>
                <div class="rr2">LOVE IS HARD FOR OTAKU</div>
            </div>
        </div>
    </div>
    
</section>
<section id="title4">
    <div class="title">Thriller</div>
    <div class="b">
        <div class="r1">
            <div class="c1">
                <a href="ok/attack.php" onclick="checkLogin(event)">
                    <div class="rr1"><img src="backgroundimg/attack.jpg" alt="attack" class="sur"></div></a>
                <div class="rr2">ATTACK ON TITAN</div>
            </div>
            <div class="c2">
                <a href="ok/onep.php" onclick="checkLogin(event)">
                    <div class="rr1"><img src="backgroundimg/onep.jpg" alt="attack" class="sur"></div></a>
                <div class="rr2">ONE PIECE</div>
            </div>
            <div class="c3">
                <a href="ok/naruto.php" onclick="checkLogin(event)">
                    <div class="rr1"><img src="backgroundimg/naruto.jpg" alt="attack" class="sur"></div></a>
                <div class="rr2">NARUTO</div>
            </div>
        </div>
    </div>
    
</section>
<section id="title3">
    <div class="title">Mystery</div>
    <div class="b11">
        <div class="r1">
            <div class="c1">
                <a href="ok/demon.php" onclick="checkLogin(event)">
                    <div class="rr1"><img src="backgroundimg/demon.webp" alt="attack" class="sur"></div></a>
                <div class="rr2">DEMON SLAYER</div>
            </div>
            <div class="c2">
                <a href="ok/death.php" onclick="checkLogin(event)">
                    <div class="rr1"><img src="backgroundimg/death.jpg" alt="attack" class="sur"></div></a>
                <div class="rr2">DEATHNOTE</div>
            </div>
            <div class="c3">
                <a href="ok/name.php" onclick="checkLogin(event)">
                    <div class="rr1"><img src="backgroundimg/name.webp" alt="attack" class="sur"></div></a>
                <div class="rr2">YOUR NAME</div>
            </div>
        </div>
    </div>
    
</section>
<section id="contact">
    <h2 class="center1">Contact Us</h2>
    <div class="mail">

        <a href="mailto:surya.drishya@gmail.com">Email Us</a>
        <p>Number: +91 9876545666</p>
        <form action="sugg.php" method="POST">
        <label id="sugg">Suggestions</label>
        <textarea name="message" rows="1" cols="1" style="resize: none; width: 462px;
        height: 37px;" onclick="checkLogin(event)"></textarea>
        <input type="submit" name="submit" class="btn" onclick="checkLogin(event)" >
    
</form>

    </div>

    

</section>
<footer class="background">
    <p class="center">
    Copyright &copy; 2027 -All rights reserved
</p>
</footer>
</body>
</html>