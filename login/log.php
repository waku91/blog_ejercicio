<?php
  include '../funcionesmysql.php';
  session_start();

  $op = new FuncionesMysql();
  //$sql = 'SELECT * FROM remain WHERE usuario = ? AND password = ?';
  //$con = $op->Conectar();

  $con = $op->Conectar();
  $sql = 'SELECT * FROM usuarios WHERE usuario = ? AND password = ?';
  $pre = $con->prepare($sql);
  $pre->bind_param('ss', $_POST['usuario'], $_POST['password']);
  $pre->execute();
  $pre->bind_result($id, $usuario, $password);
  if ($pre->fetch())
  {
    $_SESSION['usuarios'] = $usuario;
    $_SESSION['id'] = $id;
    header('Location:../home.php');
  }else
  {
    echo 'Lo siento pero no coincide ni el nombre ni la contraseña <br>';
    echo '<a href="../index.html">Volver a inicio</a>';
  }

 ?>
