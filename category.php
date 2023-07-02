<?php
//connecting to school data base and starting the session
session_start();
error_reporting(0);
require_once('path.php');
require_once('connection.php');
//saving category in GET
$chosenCategory = $_GET['category'];
//gtting data from DB
$dataFromDb = mysqli_query($connect, "SELECT * FROM `posts` WHERE `category` = '$chosenCategory'");
$dbPosts = mysqli_fetch_all($dataFromDb, MYSQLI_ASSOC);
//Going through array to get all the data
foreach($dbPosts as $row){
    $dbPost[] = $row;
}
//saving it for padding
$page = $_GET['page'];
$marker = $_GET['marker'] = '&#10008;';
$count = 4;
$page_count = floor(count($dbPosts) / $count);
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <script src="scripts/main-script.js"></script>
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
        <!-- creating link for sorting posts with categoty-->
        <?php if($_GET['category'] == novinky):?>
            <li><a class="news-nav" href="InTouch.php"><?php echo($_GET['marker'].'Novinky')?></a></li>
            <li><a href="category.php?category=recenze">Recenze</a></li>
        <?php endif;?>    
        <?php if($_GET['category'] == recenze):?>
            <li><a class="news-nav" href="category.php?category=novinky">Novinky</a></li>
            <li><a href="InTouch.php"><?php echo($_GET['marker'].'Recenze')?></a></li>
        <?php endif;?>    
            <li><?php ?><a href="login.php"><?php if (!$_SESSION['user']) echo 'LogIn'; else echo 'Profil'?></a></li>
            <li><a href="#" class="moon-sun">&#9789;</a></li>
            <li><a href="#" class="moon-sun">&#9728;</a></li>
            
        </ul>
    </nav>
    <?php
    //makig toolse for admin only 
        if($_SESSION['user']['admin'] == '1'){
                 echo '<div class="admin"><a href="admin/newPost.php"><p>Add new post</p><a href="admin/deletePost.php"><p>Delete post</p></a></div>';
        }
    ?>
    <div class="content-main">
        <div class="main-blocks">
            <!--creating new post using data from DB-->
            <?php for($i = $page*$count; $i < ($page+1)*$count; $i++) :?>
            <?php if($dbPost[$i]['id'] != null) :?>
                <?php
                    if($dbPost[$i]['category'] == 'Novinky'){
                    $link = 'singlePost.php?news=' .$dbPost[$i]['id'];
                    }elseif($dbPost[$i]['category'] == 'Recenze'){
                        $link = 'singleRec.php?news=' .$dbPost[$i]['id'];
                    }
                ?>
                <div class="main-block">
                    <a href="<?="$link";?>"><img  class="main-img" src="<?=$dbPost[$i]['top']?>" alt="<?=$dbPost[$i]['tittle']?>"></a>
                    <a href="<?="$link";?>"><h1><?=$dbPost[$i]['tittle']?></h1></a>
                    <h3><?=mb_substr($dbPost[$i]['article'], 0, 175).'...'?></h3>
                    <p class="category"><?=$dbPost[$i]['category']?></p>
                    <p class="date"><?=$dbPost[$i]['date']?></p>
                </div>
            <?php endif;?>
            <?php endfor;?>
        </div>
    </div>
    <div class="padding">
        <!--making page buttons for navigation-->
        <?php for($p = 0; $p <= $page_count; $p++) :?>
            <a href="https://wa.toad.cz/~mashkvla/project/category.php?category=<?=$chosenCategory?>&page=<?=$p?>"><div class="page-btn"><?php echo $p+1?></div></a>
        <?php endfor;?>
    </div>
    <footer>
        <div class="footer-info">
            <a href="up-anchor"><h1>InTouch</h1></a>
            <p>InTouch &#169; 2022 Všechna práva vyhrazena.</p>
        </div>
    </footer>
</body>
</html>