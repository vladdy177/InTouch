<?php
session_start();
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/form.css" >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;400;700&display=swap" rel="stylesheet">
    <title>InTouch</title>
</head>
<body id="form-body">
    <nav>
        <div class="heading" id="up-anchor">
            <a href="InTouch.html"><h4>InTouch</h4></a>
        </div>
        <ul class="nav-links">
            <li><a class="news-nav" href="news.html">Novinky</a></li>
            <li><a href="recenze.html">Recenze</a></li>
            <li><a href="login.php">LogIn</a></li>
        </ul>
    </nav>
    <div class="form-window">
        <div class="form-data">
            <div class="message">
                <h1>Registrační informace</h1>
            </div>
            <form action="signup.php" method="post" class="js-form">
                <label>
                    <input type="text" name="name" id="name" placeholder="Uživatelské jméno*" class="js-input js-input-name">
                </label>
                <label>
                    <input type="email" name="email" id="email" placeholder="Email*" class="js-input js-input-email">
                </label>
                <label>
                    <input type="password" name="password" id="password" placeholder="Heslo*" class="js-input js-input-password">
                </label>
                <label>
                    Datum narození: <input type="date">
                </label>
                <label>
                    <input type="checkbox" name="checkbox" id="checkbox" class="js-input-checkbox">Souhlas se zpracováním osobních údajů*
                </label>
                <label>
                    <input type="submit" value="REGISTER" id="register-but">
                </label>
                <div class="log-reg-button">
                    <h3>Maš účet?</h3>
                    <a href="login.php" id="log-in-but">LOG IN</a>
                </div>
            </form>
        </div>
    </div>
    <footer>
        <div class="footer-info">
            <a href="#up-anchor"><h1>InTouch</h1></a>
            <p>InTouch &#169; 2022 Všechna práva vyhrazena.</p>
        </div>
    </footer>
    <script src="scripts/form-script.js"></script>
</body>
</html>