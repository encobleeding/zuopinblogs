<?php
if($_GET['destroy_session']){
unset($_SESSION['account']);
unset($_SESSION['id']);
}
// var_dump($_SESSION['account']);
if($_SESSION['account']){
  require './login_head.php';
}else {
  require './head.php';
}
