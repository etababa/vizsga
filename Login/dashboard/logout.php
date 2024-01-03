<?php
    session_start();
    $_SESSION = array(); //A session változókat egy üres tömmbel felülírjuk
    session_destroy();
    
    $url = "../index.php";
    header("Location: ".$url);
?>