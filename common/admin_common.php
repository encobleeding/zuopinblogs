<?php
  if(!$_SESSION['account']){
    header('Location:./login.php');
    exit;
  }
  require './admin/config/db.config.php';
  require './admin/class/DB.php';
  $mysql = new DB($config);
