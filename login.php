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
        <div class="heading" id="up-anchor">
            <a href="InTouch.php"><h4>InTouch</h4></a>
        </div>
        <ul class="nav-links">
            <li><a href="login.php">LogIn</a></li>
            <li><a href="#">&#9789;</a></li>
            <li><a href="#">&#9728;</a></li>
        </ul>
    </nav>
    <div class="form-window">
        <div class="form-data">
            <div class="message">
                <h1>Login informace</h1>
            </div>
            
            <form action="signin.php" method="post" >
                <label>                                 
                    <input type="text"  value="<?php if (isset($_SESSION['name'])) echo htmlspecialchars($_SESSION['name']); ?>" name="name" placeholder="Uživatelské jméno" class="js-input-name" title="Use any letters and digits(0-9), min.length 4, max.length 15" required="required">
                </label>
                <label>
                    <input type="password" name="password" placeholder="Heslo" class="js-input-password" title="Use any letters and digits(0-9), min.length 10, max.length 30" required="required">
                </label>
                <label>
                    <input type="submit" value="LOG IN" id="log-in-but">
                </label>
                <?php //controling  if there any errors, if so making fields red
                    if($_SESSION['wrongData']){
                        echo '<p class="wrong"> ' . $_SESSION['wrongData'] . ' </p>';
                    }
                    unset($_SESSION['wrongData']);
                ?>
                <!-- controling  if there any errors, if there ate no errors making green text to massege user -->
                <?php 
                    if($_SESSION['successReg']){
                    echo '<p class="right"> ' . $_SESSION['successReg'] . ' </p>';
                    }
                    unset($_SESSION['successReg']);
                ?>
                <div class="log-reg-button">
                    <h3>Nemáte účet?</h3>
                    <a href="form.php" id="register-but">REGISTER</a>
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