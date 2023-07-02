<?php
    //starting session
    session_start();
    require_once 'connection.php';

    //getiing data from registration form and ssecuring it with htmlspecialchars
    $name = trim(htmlspecialchars($_POST['name']));
    $email = trim(htmlspecialchars($_POST['email']));
    $password = trim(htmlspecialchars($_POST['password']));
    $date = date('Y-m-d', strtotime($_POST['date']));

    //saving user data to refill value in case of any errors
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['date'] = $date;

    // getting username nad email from DB
    $nameFromDb = mysqli_query($connect, "SELECT * FROM `users` WHERE `name` = '$name'");
    $emailFromDb = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");
    
    //making error counter, to check if there any errors before sending data to DB
    $errors = 0;

    //contolling lenght of name
    if (strlen($_POST['name']) < 4 || strlen($_POST['name']) > 15) {
        $_SESSION['wrongName'] = 'Zadejte platné jmeno, prosím!';
        $errors++;
        header('Location: form.php');
    }
    // check if user with this username already exists
    elseif(mysqli_num_rows($nameFromDb) > 0){
        $_SESSION['wrongName'] = 'Toto uživatelské jméno je již obsazeno!!';
        $errors++;
        header('Location: form.php');
    }
    
    //controlling email
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['wrongEmail'] = 'Zadejte platný email, prosím!';
        $errors++;
        header('Location: form.php');
    } 
    // check if user with this email already exists
    elseif(mysqli_num_rows($emailFromDb) > 0){
        $_SESSION['wrongEmail'] = 'Tento e-mail byl již použit!';
        $errors++;
        header('Location: form.php');
    }
        
    //controlling if checkbox is filled
    if (!isset($_POST['checkbox'])) {
        $_SESSION['wrongCheckbox'] = 'Souhlasíte se zpracováním osobních údajů, prosím!';
        $errors++;
        header('Location: form.php');
}else{
    $_SESSION['checkbox'] = 'on';

    //Controling lenght of password
    
        if (strlen($_POST['password']) == 0) {
            $_SESSION['wrongPassword'] = 'Zadejte heslo, prosím!';
            $errors++;
            header('Location: form.php');
        } elseif (strlen($_POST['password']) < 10 || strlen($_POST['password']) > 30) {
            $_SESSION['wrongPassword'] = 'Zadejte platné heslo, prosím!';
            $errors++;
            header('Location: form.php');
        }
        

        //Checking if there any errors and checking if password and conf.password are the same 
        elseif ($errors == 0) {
        if ($_POST['password'] === $_POST['password-conf']) {

            //hashing POST password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            //adding data from reistration form to DB
            mysqli_query($connect, "INSERT INTO `users` (`name`, `email`, `password`, `birthday`) VALUES ('$name', '$email', '$hashedPassword', '$date')");

            //message in case of successful registration
            $_SESSION['successReg'] = 'Úspěšně jste se zaregistrovali!';

            //redirecting user to login.php
            header('Location: login.php');
            }
        }
    }
        


?>