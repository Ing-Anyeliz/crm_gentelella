<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">


    <title>Sesion </title>

  </head>

  <body>
    <?php session_start();

    if(isset($_SESSION["u_usuario"])) {
      header("Location: index.html");
    //  echo "Iniciar sesion correctamente";

    }else {
      header("Location: login.html");
    }

     ?>

  </body>
</html>
