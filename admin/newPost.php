<?php
session_start();
//special admin tool for easy making posts
if($_SESSION['user']['admin'] != '1'){
    header('Location: ../InTouch.php');
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Post Edit</title>
        <link rel="stylesheet" href="post.css">
        <link rel="stylesheet" href="form.css">
    </head>
    <body>
        <form action="addPost.php" method="post">
            <a href="../InTouch.php">Go to main page</a>
            <p>Tittle*: </p><textarea class="text" name="tittle" required="required"></textarea>
            <p>Article*: </p><textarea class="text" name="article" required="required"></textarea>
            <p>Tittle image(link from web)*: </p><textarea class="text" name="topImg" required="required"></textarea>
            <p>1st image(link from web): </p><textarea class="text" name="img1" ></textarea>
            <p>2nd image(link from web): </p><textarea class="text" name="img2" ></textarea>
            <p>3rd image(link from web): </p><textarea class="text" name="img3" ></textarea>
            <p>4th image(link from web): </p><textarea class="text" name="img4" ></textarea>
            <p>Metacritic image(link from web): </p><textarea class="text" name="met" ></textarea>
            <p>YouTube link(link from web): </p><textarea class="text" name="youtube" ></textarea>
            <p>Trophy(link from web): </p><textarea class="text" name="trophy" ></textarea>
            <p>Category*:
                <label for="news">News
                    <input type="radio" value="Novinky" id="news" name="category" required>
                </label> 
                <label for="recensione">Recensione
                    <input type="radio" value="Recenze" id="recensione" name="category">
                </label>
            </p>
            <input type="submit" class="btn">
        </form>
    </body>
</html>
