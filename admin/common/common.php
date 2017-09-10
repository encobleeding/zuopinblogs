<?php
    $_SESSION || session_start(); //放在所有代码之前
    header('content-type:text/html;charset="UTF-8"');
    require './config/db.config.php';
    require './class/DB.php';
    $mysql = new DB($config);
    
