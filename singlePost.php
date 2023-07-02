<?php
session_start();
error_reporting(0);
require_once('path.php');
require_once('connection.php');

$dataFromDb = mysqli_query($connect, "SELECT * FROM `posts` WHERE `status` = 0");
$dbPosts = mysqli_fetch_all($dataFromDb, MYSQLI_ASSOC);
foreach($dbPosts as $dbPost){
    if ($dbPost['id'] == $_GET['news']){
        $post = $dbPost;
    }
}

$commsFromDb = mysqli_query($connect, "SELECT * FROM `comments` WHERE `postId` = '$_GET[news]'");
$comments = mysqli_fetch_all($commsFromDb, MYSQLI_ASSOC);

$usersFromDb = mysqli_query($connect, "SELECT * FROM `users`");
$users = mysqli_fetch_all($usersFromDb, MYSQLI_ASSOC);
$_SESSION['newsNum'] = $_GET['news'];
?>


<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://banner2.cleanpng.com/20180331/lgq/kisspng-system-gesture-touchscreen-finger-touch-user-inter-ai-5ac00ddc7f1fb1.4884210615225359005207.jpg">
    <link rel="stylesheet" href="styles/light.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;400;700&display=swap" rel="stylesheet">
    <title>InTouch</title>
</head>
<body>
    <nav>
        <div class="heading">
            <a href="<?=BASE_URL?>" id="up-anchor"><h4>InTouch</h4></a>
        </div>
        <ul class="nav-links">
            <li><?php ?><a href="login.php"><?php if (!$_SESSION['user']) echo 'LogIn'; else echo 'Profil'?></a></li>
        </ul>
    </nav>
    <main>
    <div class="news-block">
        <div class="text-block">
            <div class="top-img">
                <h1><?=$post['tittle']?></h1>
                <img src="<?=$post['top']?>" alt="<?=$post['tittle']?>" >    
            </div>
                <div>
                    <p id="post-text"><?=$post['article']?></p>
                    <?php if(strpos($post['img1'], 'http') === 0):?>
                        <img src="<?=$post['img1']?>" class="news-img" alt="<?=$post['tittle']?>">
                    <?php endif;?>
                </div> 
        </div>
        <?php if(isset($_SESSION['user'])):?>
            <div class="comments">
                <h3>Napište komentář:</h3>    
                <form action="commsControl.php" method="post">
                    <div class="comment">
                        <input type="hidden" name="newsNum" value="<?=$_GET['news']?>">
                        <input type="hidden" name="userId" value="<?=$_SESSION['user']['id']?>">
                        <textarea class ="comment-area" name="comment" placeholder="Napište text"></textarea>
                        
                        <input type="submit" name="goComment" value="Odeslat" class="btn">
                    </div>
                    <?php
                        if($_SESSION['successCom']){
                        echo '<p class="right"> ' . $_SESSION['successCom'] . ' </p>';
                        }
                        unset($_SESSION['successCom']);
                    ?>
                </form>
            </div>
            <?php endif;?>
            <div class="commsFromDb">
                
                <?php if(!isset($_SESSION['user'])):?>
                <h3>*Musíte být registrováni, abyste mohli psát komentáře</h3>
                <?php endif;?>
                <h3>Komentáře:</h3>
                <div class="comments-db">
                    <?php foreach($comments as $comment):?>
                    <?php foreach($users as $user):?>
                    <?php if($user['id'] == $comment['userId']):?>
                        <div class="solo-user">
                            <p>kdo: <?=$user['name'];?></p>
                            <?php endif;?>
                            <?php endforeach;?>
                            <p><?=$comment['comment'];?></p>
                            <p>kdy: <?=$comment['time'];?></p>
                        </div>
                    <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="footer-info">
            <a href="#up-anchor"><h1>InTouch</h1></a>
            <p>InTouch &#169; 2022 Všechna práva vyhrazena.</p>
        </div>
    </footer>
</body>
</html>

