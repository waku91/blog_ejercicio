<?php
 session_start(); //funcion para el inicio de sesion
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
          <li><a href="#"><?php echo $_SESSION['usuarios'] ?></a></li>  <!-muestra el usuario activo->
          <li><a href="login/logout.php">Cerrar sesión</a></li>
        </ul>
      </div>
    </nav>
    <center>
      <div class="z-depth-1 grey lighten-4 row" style="background-color: white; width:900px; height:auto; border-radius:5px; margin-top:4px;">
        <div class="z-depth-5 grey lighten-4 row">
          <div class="col s12">
            <form action="postear.php?" method="post">  <!- formulario para crear el post->
              <div class="input-field col s2">
               <input name="titulo" type="text">
               <label for="titulo">titulo</label> 
              </div>
              <div class="input-field col s6">
               <input name="posteo" type="text">
               <label for="posteo">¿En que estas pensando?</label>
             </div>
             <button class="btn waves-effect waves-light" type="submit" name="action" style="margin:18px;">POSTEAR
               <i class="material-icons right">send</i>
             </button>
            </form>
          </div>
        </div>
        <?php
          include 'funcionesmysql.php';
          $op = new FuncionesMysql();
          $res = $op->SeleccionarPosts(); // funcion para listar los post existentes
          while($fila = mysqli_fetch_assoc($res))
          {
            echo '<div class="row">
                    <div class="col s12 z-depth-4">
                      <table class="responsive-table" border="1">
                        <tr>
                          <td><strong>Usuario</strong></td>
                          <td><strong>Título</strong></td>
                          <td><strong>Fecha</strong></td>
                        </tr>
                        <tr>
                          <td>'.$fila['usuario'].'</td>
                          <td>'.$fila['titulo'].'</td>
                          <td>'.$fila['fecha'].'</td>
                          <td><a href="post.php?id='.$fila['id'].'&usuario='.$fila['usuario'].'">Ir al post</a></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  ';
          }
        ?>
      </div>
    </center>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" href="js/login.js"></script>
  </body>
</html>