<?php
session_start();
if (!isset($_SESSION['id'])) {
    echo "User not logged in.";
    exit();
}

$user_id = $_SESSION['id']; 
require('php/config.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Liked Mangas</title>
    <link rel="stylesheet" href="css/liked.css">
</head>
<body>

    <nav class="navbar background1">
        <div class="logo"><img src="icons/logo.jpg" alt="logo"><p class="name"><span class="namem">m</span>anga<span class="plus">+</span></p></div>
        <ul class="nav-list">
            <li><a href="after.php">Home</a></li>
            <li><a href="after.php#popular">Popular</a></li>
            <li><a href="liked.php">Liked Mangas</a></li>
        </ul>
    </nav>

    <section class="liked-mangas-section">
        <h1>Your Liked Mangas</h1>
        <div class="manga-grid">
            <?php
            
            $liked_query = mysqli_query($con, "SELECT mangas.* FROM mangas
                                                INNER JOIN likes ON mangas.id = likes.post_id
                                                WHERE likes.user_id = $user_id AND likes.status = 'like'");

            
            if (mysqli_num_rows($liked_query) > 0) {
                while ($liked_manga = mysqli_fetch_assoc($liked_query)) {
                    $manga_name = $liked_manga['name'];
                    $manga_image = $liked_manga['image'];
                    $manga_site = $liked_manga['site'];
                    ?>
                    <div class="manga-item">
                      <a href="<?php echo $manga_site; ?>" > <img src="<?php echo $manga_image; ?>" alt="<?php echo $manga_name; ?>" width="200px"></a>
                        <p class="manga-name"><?php echo $manga_name; ?></p>
                    </div>
                    <?php
                }
            } else {
            
                echo "<p>You haven't liked any manga yet.</p>";
            }
            ?>
        </div>
    </section>

   

</body>
</html>
