<?php
session_start();
error_reporting(0);

if(!$_SESSION['user']){
    header('Location: login.php');
    }
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
        <div class="heading" id="up-anchor">
            <a href="InTouch.php"><h4>InTouch</h4></a>
        </div>
        <ul class="nav-links">
            <li><?php ?><a href="login.php"><?php if (!$_SESSION['user']) echo 'LogIn'; else echo 'Profil'?></a></li>
            <li><a href="#" class="moon-sun">&#9789;</a></li>
            <li><a href="#" class="moon-sun">&#9728;</a></li>
        </ul>
    </nav>
    <main>
        <div class="profile-window">
            <h1>Informace o uživateli</h1>
            <div class="informacion">
                <p id="username">Uživatelské jméno: <?php echo $_SESSION['user']['name'];?></p>
                <p>Email: <?php echo $_SESSION['user']['email'];?></p>
                <p>Datum narození: <?php echo $_SESSION['user']['date'];?></p>
            </div>
                <div class="log-reg-button">
                    <a href="logout.php" id="register-but">LOGOUT</a>
                </div>
        </div>
    </main>
    <footer>
        <div class="footer-info">
            <a href="#up-anchor"><h1>InTouch</h1></a>
            <p>InTouch &#169; 2022 Všechna práva vyhrazena.</p>
        </div>
    </footer>
    <!-- <script src="scripts/form-script.js"></script> -->
</body>
</html>