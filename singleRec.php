<?php
//making recensione same as post
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
    $textArray = explode('  ',$post['article']);
    $firstPart = $textArray[0] . $textArray[1];
    $secondPart = $textArray[2] . $textArray[3];
    $thirdPart = $textArray[4] . $textArray[5];
    
    $commsFromDb = mysqli_query($connect, "SELECT * FROM `comments` WHERE `postId` = '$_GET[news]'");
    $comments = mysqli_fetch_all($commsFromDb, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://banner2.cleanpng.com/20180331/lgq/kisspng-system-gesture-touchscreen-finger-touch-user-inter-ai-5ac00ddc7f1fb1.4884210615225359005207.jpg">
    <link rel="stylesheet" href="styles/light.css" >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;400;700&display=swap" rel="stylesheet">
    <title>InTouch</title>
</head>
<body>
    <nav>
        <div class="heading">
            <a href="InTouch.php" id="up-anchor"><h4>InTouch</h4></a>
        </div>
        <ul class="nav-links">
            <li><?php ?><a href="login.php"><?php if (!$_SESSION['user']) echo 'LogIn'; else echo 'Profil'?></a></li>
        </ul>
    </nav>
    <div class="content-main-rec">
        <div class="recen-block">
            <div class="text-block-rec">
                <div class="top-img-rec">
                    <h1><?=$post['tittle']?></h1>
                    <?php if(strpos($post['top'], 'http') === 0):?>
                        <img class="img-rec" src="<?=$post['top']?>" alt="<?=$post['tittle']?>" >
                    <?php endif;?>    
                
                    <p><?=$firstPart?></p>
                    <?php if(strpos($post['img1'], 'http') === 0):?>
                        <img class="img-rec" src="<?=$post['img1']?>" alt="<?=$post['tittle']?>" >
                    <?php endif;?>
                    <p><?=$secondPart?></p>
                    <?php if(strpos($post['img2'], 'http') === 0):?>
                        <img class="img-rec" src="<?=$post['img2']?>" alt="<?=$post['tittle']?>" >
                    <?php endif;?>
                    <?php if(strpos($post['img3'], 'http') === 0):?>
                        <img class="img-rec" src="<?=$post['img3']?>" alt="<?=$post['tittle']?>" >
                    <?php endif;?>
                    <p><?=$thirdPart?></p>
                    <?php if(strpos($post['img4'], 'http') === 0):?>
                        <img class="img-rec" src="<?=$post['img4']?>" alt="<?=$post['tittle']?>" >
                    <?php endif;?>
                    <div class="opinion">
                        <?php if(strpos($post['met'], 'http') === 0):?>
                            <h1>Metacritic hodnocení a užitečné odkazy</h1>
                            <img class="img-rec" src="<?=$post['met']?>" alt="<?=$post['tittle']?>">
                        <?php endif;?>
                        <?php if(strpos($post['trophy'], 'http') === 0):?>
                            <h2><a href="<?=$post['trophy']?>">Guide, jak získat všechny trofeje ve hře</a></h2>
                        <?php endif;?>
                        <?php if(strpos($post['youtube'], 'http') === 0):?>
                            <h2><a href="<?=$post['youtube']?>">Video Recenze</a></h2>
                        <?php endif;?>
                    </div>
                </div>
            </div>
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
                
    <footer>
        <div class="footer-info">
            <a href="#up-anchor"><h1>InTouch</h1></a>
            <p>InTouch &#169; 2022 Všechna práva vyhrazena.</p>
        </div>
    </footer>
</body>
</html>