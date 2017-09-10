<?php
  //header('Content-type: text/html; charset="utf-8"');
  require './admin/config/db.config.php';
  require './admin/class/DB.php';
  $mysql = new DB($config);
