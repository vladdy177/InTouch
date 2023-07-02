<?php
//starting session and getting connection to DB
session_start();
include_once('../connection.php');

//redericting not admin user
if($_SESSION['user']['admin'] != '1'){
    header('Location: ../InTouch.php');
}

//getting data from DB
$dataFromDb = mysqli_query($connect, "SELECT `id`, `tittle`, `category`, `date` FROM `posts`");
$dbPosts = mysqli_fetch_all($dataFromDb, MYSQLI_ASSOC);
    
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="post.css">
        <title>Delete post</title>
    </head>
    <body>
        <div class="del">
            <div  id="exit">
                <a href="../InTouch.php">Go to main page</a>
            </div>
            <!-- making table for better understanding, which post admin wants to delete -->
            <table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Tools</th>
                </tr>
                <!--making table for easy post managment + delete function -->
                <?php foreach($dbPosts as $dbPost): ?>
                <tr>
                    <td><?=$dbPost['id']?></td>
                    <td><?=$dbPost['tittle']?></td>
                    <td><?=$dbPost['category']?></td>
                    <td><?=$dbPost['date']?></td>
                    <td><a href="deletingPostFromDb.php?id=<?=$dbPost['id']?>">Delete</a></td>
                </tr>
                <?php endforeach;?>   
            </table>
        </div>
    </body>
</html>