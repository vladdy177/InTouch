<?php
    session_start();
    error_reporting(0);
    require_once 'connection.php';

    //getting data from POST

    $name = $_POST['name'];
    $password = $_POST['password'];

    //getting hased password from DB

    $dataFromDb = mysqli_query($connect, "SELECT `password` FROM `users` WHERE `name` = '$name'");
    $dbPassword = mysqli_fetch_all($dataFromDb, MYSQLI_ASSOC);
    foreach($dbPassword as $passwordFromDb){
        $hashedPassword = $passwordFromDb['password'];
    }

    //checking if POST password mathes with DB password

    $checkPasswords = password_verify($password, $hashedPassword);

    if($checkPasswords > 0){
        //getting name, email, date of birth from DB
        $userFromDb = mysqli_query($connect, "SELECT * FROM `users` WHERE `name` = '$name'");
        $user = mysqli_fetch_assoc($userFromDb);
        if ($user['birthday'] == '1970-01-01') {
            $user['birthday'] = '-';
        }
        
        //creating array with users data
        $_SESSION['user'] = [
            "id" => $user['id'],
            "name" => $user['name'],
            "email" => $user['email'],
            "date" => $user['birthday'],
            "admin" => $user['admin']
        ];
        //Redirecting user to profile.php
        header('Location: profile.php');
    }else{
        //Printing error message
        header('Location: login.php');
        $_SESSION['wrongData'] = 'Nesprávné přihlašovací jméno nebo heslo!';
    }




?>