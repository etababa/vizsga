<?php
    header('Content-Type: text/html; charset=utf-8');
    $mysqli = new mysqli("localhost","root", "", "dz_tetofedo_kft");

    if (!$mysqli){
        die("Nem lehet csatlakozni az adatbázishoz!!!".$mysqli->error);
    }
?>