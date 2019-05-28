<?php
  include "funcionesmysql.php";
  include "login/log.php";

  $id = $_SESSION['id'];
  $post = $_POST['posteo'];
  $titulo = $_POST['titulo'];
  $op = new FuncionesMysql;
  $op-> Postear($post, $titulo, $id);


  Header("Location:home.php");
 ?>
