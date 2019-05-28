<?php
  include 'funcionesmysql.php';
  $op = new funcionesmysql();
  $op->BorrarPost($_GET['id']);
  header ('Location:home.php');
?>
