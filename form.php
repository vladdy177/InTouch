<?php
//starting the session
    session_start();
    error_reporting(0);
//if logined user will try to get on this web, redirecting him
    if($_SESSION['user']){
    header('Location: profile.php');
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
        <div class="heading-form" id="up-anchor">
            <a href="InTouch.php"><h4>InTouch</h4></a>
        </div>
        <ul class="nav-links">
            <li><a href="login.php">LogIn</a></li>
            <li><a href="#" class="moon-sun">&#9789;</a></li>
            <li><a href="#" class="moon-sun">&#9728;</a></li>
        </ul>
    </nav>
    <div class="form-window">
        <div class="form-data">
            <div class="message">
                <h1>Registrační informace</h1>
            </div>
            <form action="signup.php" method="post" class="js-form">
                <label> 
                    <input type="text" name="name"  value="<?php if (isset($_SESSION['name'])) echo htmlspecialchars($_SESSION['name']); ?>" pattern="[0-9, a-z, A-Z]{4,15}" placeholder="Uživatelské jméno*" class="js-input js-input-name" title="Use any letters and digits(0-9), min.length 4, max.length 15" required="required">
                </label>
                <?php
                    if($_SESSION['wrongName']){
                        echo '<p class="wrong"> ' . $_SESSION['wrongName'] . ' </p>';
                    }
                    unset($_SESSION['wrongName']);
                ?>
                <label>
                    <input type="email" name="email"  value="<?php if (isset($_SESSION['email'])) echo htmlspecialchars($_SESSION['email']); ?>" placeholder="Email*" class="js-input js-input-email" required="required">
                </label>
                <?php
                    if($_SESSION['wrongEmail']){
                        echo '<p class="wrong"> ' . $_SESSION['wrongEmail'] . ' </p>';
                    }
                    unset($_SESSION['wrongEmail']);
                ?>
                <label>
                    <input type="password" name="password" pattern="[0-9, a-z, A-Z]{10,30}" title="Use any letters and digits(0-9), min.length 10, max.length 30" placeholder="Heslo*" class="js-input js-input-password" required="required">
                </label>
                <?php
                    if($_SESSION['wrongPassword']){
                        echo '<p class="wrong"> ' . $_SESSION['wrongPassword'] . ' </p>';
                    }
                    unset($_SESSION['wrongPassword']);
                ?>
                <label>
                    <input type="password" name="password-conf" placeholder="Potvrďte heslo*" class="js-input js-input-password-conf" required="required" pattern="[0-9, a-z, A-Z]{10,30}" title="Use any letters and digits(0-9), min.length 10, max.length 30">
                </label>
                <label for="date">
                    Datum narození: <input type="date" name="date" id="date" value="<?php if (isset($_SESSION['date'])) htmlspecialchars($_SESSION['date']);?>">
                </label>
                <div class="check">
                    <input type="checkbox" name="checkbox" id="checkbox" class="js-input-checkbox"  <?php if (isset($_SESSION['checkbox'])) echo '"checked"'?>>
                    <label for="checkbox" class="checkbox-label"> Souhlas se zpracováním osobních údajů*</label>
                    <?php
                        if($_SESSION["wrongCheckbox"]){
                        echo '<p class="wrong"> ' . $_SESSION["wrongCheckbox"] . ' </p>';
                        }
                        unset($_SESSION["wrongCheckbox"]);
                    ?>
                </div>
                <label>
                    <input type="submit" name="submit" value="REGISTER" id="register-but">
                </label>
                <div class="log-reg-button">
                    <h3>Máte účet?</h3>
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