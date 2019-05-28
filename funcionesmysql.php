<?php
  class FuncionesMysql
  {
    private $servidor = 'localhost';
    private $usuario = 'root';
    private $pass = 'root';
    private $base_datos = 'blog';

    public function Conectar() //funcion para conectar a la base de datos
    {
      $con = mysqli_connect($this->servidor, $this->usuario, $this->pass, $this->base_datos) or die ("No conecta");
      return $con;
    }

    public function SeleccionarPosts() //funcion para listar los post
    {
      $sql = 'SELECT
      posts.id,
      posts.contenido,
      posts.fecha,
      posts.titulo,
      usuarios.usuario
      FROM
      posts
      INNER JOIN usuarios ON usuarios.id = posts.id_usuario';
      $con = $this->Conectar();
      $res = mysqli_query($con, $sql) or die ('Lo siento no se puede realizar');
      return $res;
    }

    public function SeleccionarUnPost($id) //funcion para ingresar a un post
    {
      $sql = "SELECT * FROM posts WHERE id='$id'";
      $con = $this->Conectar();
      $res = mysqli_query($con, $sql);
      return $res;
    }

    public function BorrarPost($id) //funcion para borrar un post
    {
      $sql = 'DELETE FROM posts WHERE id='.$id;
      $con = $this->Conectar();
      mysqli_query($con, $sql) or die (mysqli_error($con));
    }

    public function Postear($post, $titulo, $id) //funcion para postear
    {
      $sql = "INSERT INTO posts (contenido, titulo, id_usuario) VALUES ('$post', '$titulo', '$id')";
      $con = $this->Conectar();
      mysqli_query($con, $sql) or die ("No se ha podido postear");
    }
  }
?>
