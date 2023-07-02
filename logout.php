<?php

    //loging out the user
    session_start();
    unset($_SESSION['user']);

    //destroying the session and returnung to InTouch.php
    session_destroy();
    header('Location: login.php');
?>