<?php
//starting session and getting connection to DB
session_start();
include_once('../connection.php');

//redericting not admin user
if($_SESSION['user']['admin'] != '1'){
    header('Location: ../InTouch.php');
}

//getting admin essential data from POST
$tittle = trim(htmlspecialchars($_POST['tittle']));
$article = trim(htmlspecialchars($_POST['article']));
$topImg = trim(htmlspecialchars($_POST['topImg']));

//getting inessential data and checking it. If data is empty, then data's value if 0
if(!empty($_POST['img1'])){
    trim(htmlspecialchars($img1 = $_POST['img1']));
}else $img1 = 'NONE';

if(!empty($_POST['img2'])){
    trim(htmlspecialchars($img2 = $_POST['img2']));
}else $img2 = 'NONE';

if(!empty($_POST['img3'])){
    trim(htmlspecialchars($img3 = $_POST['img3']));
}else $img3 = 'NONE';

if(!empty($_POST['img4'])){
    trim(htmlspecialchars($img4 = $_POST['img4']));
}else $img4 = 'NONE';

if(!empty(htmlspecialchars($_POST['met']))){
    trim($met = $_POST['met']);
}else $met = 'NONE';

if(!empty(htmlspecialchars($_POST['youtube']))){
    trim($youtube = $_POST['youtube']);
}else $youtube = 'NONE';

if(!empty(htmlspecialchars($_POST['trophy']))){
    trim($trophy = $_POST['trophy']);
}else $trophy = 'NONE';

if(isset($_POST['category'])){
    $category = $_POST['category'];
}
//setting data and status
$date = date("Y-m-d");
$status = 0;

//sending all data to DB
mysqli_query($connect, "INSERT INTO `posts`(`tittle`, `article`, `top`, `img1`, `category`, `date`, `status`, `img2`, `img3`, `img4`, `met`, `youtube`, `trophy`) VALUES ('$tittle', '$article', '$topImg', '$img1', '$category', '$date', '$status', '$img2', '$img3', '$img4', '$met', '$youtube', '$trophy')");
//creating message to see, if post is created
$_SESSION['msg'] = 'Post created!';

header('Location: msg.php');
?>