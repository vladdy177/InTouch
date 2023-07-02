<?php
//creating session
session_start();
error_reporting(0);
require_once('path.php');
require_once('connection.php');
//looking data from DB
$dataFromDb = mysqli_query($connect, "SELECT * FROM `posts` WHERE `status` = 0");
$dbPosts = mysqli_fetch_all($dataFromDb, MYSQLI_ASSOC);
foreach($dbPosts as $row){
    $dbPost[] = $row;
}
//data for padding
$page = $_GET['page'];
$count = 4;

$page_count = floor(count($dbPosts) / $count);
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
            <a href="InTouch.php" id="up-anchor">
                <h4>InTouch</h4>
            </a>
        </div>
        <ul class="nav-links">
            <li><a class="news-nav" href="category.php?category=novinky">Novinky</a></li>
            <li><a href="category.php?category=recenze">Recenze</a></li>
            <li><?php ?><a href="login.php"><?php if (!$_SESSION['user']) echo 'LogIn'; else echo 'Profil'?></a></li>
            <li><a href="#" class="moon">&#9789;</a></li>
            <li><a href="#" class="sun">&#9728;</a></li>
            
        </ul>
    </nav>
    <?php
    //tools for admin
        if($_SESSION['user']['admin'] == '1'){
                 echo '<div class="admin"><a href="admin/newPost.php"><p>Add new post</p><a href="admin/deletePost.php"><p>Delete post</p></a></div>';
        }
    ?>
    <div class="content-main">
        <div class="main-blocks">
            <?php for($i = $page*$count; $i < ($page+1)*$count; $i++) :?>
            <?php if($dbPost[$i]['id'] != null) :?>
                <?php
                //going through DB table to get needed info about post
                    if($dbPost[$i]['category'] == 'Novinky'){
                    $_GET['news'] = ['page' => $dbPost[$i]['d']];
                    $link = 'singlePost.php?news=' .$dbPost[$i]['id'];
                    }elseif($dbPost[$i]['category'] == 'Recenze'){
                        $_GET['news'] = ['page' => $dbPost[$i]['d']];
                        $link = 'singleRec.php?news=' .$dbPost[$i]['id'];
                    }
                ?>
                <!--making post using data from DB-->
                <div class="main-block">
                    <a href="<?="$link";?>"><img class="main-img" src="<?=$dbPost[$i]['top']?>" alt="<?=$dbPost[$i]['tittle']?>"></a>
                    <a href="<?="$link";?>"><h1><?=$dbPost[$i]['tittle']?></h1></a>
                    <h3><?=mb_substr($dbPost[$i]['article'], 0, 175).'...'?></h3>
                    <p class="category"><?=$dbPost[$i]['category']?></p>
                    <p class="date"><?=$dbPost[$i]['date']?></p>
                </div>
            <?php endif;?>
            <?php endfor;?>
        </div>
    </div>
    <!--padding for navigation-->
    <div class="padding">
        <?php for($p = 0; $p <= $page_count; $p++) :?>
            <a href="?page=<?=$p?>" class="page-btn"><?php echo $p+1?></a>
        <?php endfor;?>
    </div>
    <footer>
        <div class="footer-info">
            <a href="up-anchor"><h1>InTouch</h1></a>
            <p>InTouch &#169; 2022 Všechna práva vyhrazena.</p>
        </div>
    </footer>
    <script src="scripts/main-script.js"></script>
</body>
</html>