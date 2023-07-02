<?php
//connecting to school data base
include_once('connection.php');
//clearing input data
$userId = trim(htmlspecialchars($_POST['userId']));
$postId = trim(htmlspecialchars($_POST['newsNum']));
$comment = trim(htmlspecialchars($_POST['comment']));

//sending comments to DB
$query = "INSERT INTO comments (userId, postId, comment, time) VALUES ('$userId', '$postId', '$comment', CURRENT_TIMESTAMP)";


//cheking for errors
$result = mysqli_query($connect, $query);
if (!$result) {
    die("Error: ".mysqli_error($connect));
}
//and thank user for it :)
$_SESSION['successCom'] = 'Děkujeme za komentář!';
header("Location: https://wa.toad.cz/~mashkvla/project/singlePost.php?news=$postId");