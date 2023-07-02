<?php
    //connecting to school data base
    $connect = mysqli_connect('localhost', 'mashkvla', 'webove aplikace', 'mashkvla');

    if(!$connect){
        "\n";
        die('ERROR connecting to server');
    }

?>