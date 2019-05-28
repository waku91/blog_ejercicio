<?php

session_start();
if (!isset($_SESSION['usuarios']))
{
  header('Location:index.html');
}
?>

<!DOCTYPE html>
<html>
<head>
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <link rel="stylesheet" href="css/estilosLogin.css">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link href="img/logo.png" rel="icon" type="image/gif">
  <meta charset="utf-8">
  <title>Bloggo</title>
</head>
<body style="background-image: url(img/fondo.png); background-repeat: repeat;">
  <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo"><img src="img/logo.png" style="width:50px; margin:6px;"></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="#"><?php echo $_SESSION['usuarios'] ?></a></li>
        <li><a href="login/logout.php">Cerrar sesión</a></li>
      </ul>
    </div>
  </nav>
  <center>
    <div class="z-depth-1 grey lighten-4 row" style="background-color: white; width:900px; height:5000px; border-radius:5px; margin-top:4px;">
      <div class="z-depth-5 grey lighten-4 row"></div>
      <?php
        include 'funcionesmysql.php';
        $op = new FuncionesMysql();
        $id = $_GET['id'];
        $usuario = $_GET['usuario'];
        $resultado = $op->SeleccionarUnPost($id);
        while($fila = mysqli_fetch_assoc($resultado))
        {
          echo '<div class="row">
            <a href="home.php"><strong><h5>VOLVER</h5></strong></a>
            <br></br>
            <div class="container">
              <div class="col s12 z-depth-4" style="margin-bottom:50px;">
                <table border="1">
                  <tr>
                    <td><h5><strong>'.$usuario.'<strong></h5></td>
                    <td><strong>'.$fila['fecha'].'</strong></td>
                  </tr>
                  <tr>
                    <td>'.$fila['contenido'].'</td>
                  </tr>';
                  if($usuario == $_SESSION['usuarios'] or $_SESSION['usuarios'] == 'admin')
                    {
                      echo '
                        <tr>
                          <td></td>
                          <td></td>
                          <td><a href="borrar.php?id='.$fila['id'].'">Borrar</a></td>
                        </tr>';
                    }
                  echo '
                </table>';
        }
      ?>
    </div>
    </center>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" href="js/login.js"></script>
  </body>
</html>
