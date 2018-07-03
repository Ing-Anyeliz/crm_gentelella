<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">


    <title>Iniciar sesion </title>

  </head>

  <body>
    <?php session_start();

        $usuario = $_POST['usuario'];
        $clave = $_POST['password'];
        $seleccion = $_POST['seleccion'];


            include("conexion.php");

  /*      $server ='rut.colombiahosting.com.co:3306';
        $username= 'aticin_induser';
        $password = 'indu3001*';
        $database = 'aticin_indu_login';
        $tabla_name = 'login_crm';


          $conexion = new mysqli($server,$username,$password, $database);
          *//*$conexion = new mysqli($server, $username, $password, $database); */


        //    if($conexion -> connect_error){

          //    die("la conexion ha fallado".$conexion -> connect_error);
          //  }


        $proceso = $conexion -> query("SELECT * FROM login_crm WHERE usuario = '$usuario' AND clave = '$clave' ");

        if ($resultado = mysqli_fetch_array($proceso)) {
         $_SESSION['u_usuario'] = $usuario;
         header("Location: sesion.php");
          //echo "sesion iniciada";
       }else {
        //  echo "$usuario";
          header("Location: sesion.php");
    /*    echo "Error de contraseña o usuario";*/
       }

     ?>

  </body>
</html>
