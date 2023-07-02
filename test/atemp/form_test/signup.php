<?php

require_once 'connection.php';

$name = $_POST['name'];
$password = $_POST['password'];
$email = $_POST['email'];
$checkbox = $_POST['checkbox'];

if (!count($name) || !count($password) || $checkbox == "") {
    echo "Pole se hvezdou musi byt splneno!";
}else{
    print_r($_POST);
}

?>