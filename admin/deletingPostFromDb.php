<?php
//starting session and getting connection to DB
session_start();
include_once('../connection.php');

//redericting not admin user
if($_SESSION['user']['admin'] != '1'){
    header('Location: ../InTouch.php');
}

//getting id of chosen post to delete
$idToDel = $_GET['id'];

//making query to DB to delete choosen data
$query = mysqli_query($connect, "DELETE FROM `posts` WHERE `id` = $idToDel");

//making message about successful operation for admin and redirecting to msg.php
$_SESSION['msg'] = 'Post successfuly deleted!';
header('Location: msg.php');