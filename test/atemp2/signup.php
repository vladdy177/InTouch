<?php

require_once 'connection.php';

$name = $_POST['name'];
$password = $_POST['password'];
$email = $_POST['email'];

if (!count($name) || !count($password)) {
    echo "Pole se hvezdou musi byt splneno!";
}else{
    print_r($_POST);
}

?>