
    <?php session_start();

    if(isset($_SESSION['usuario'])) {
    header('location: login.php');
}

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $usuario = $_POST['usuario'];
    $seleccion = $_POST['seleccion'];
    $email =$_POST['email'];
    $clave = $_POST['password'];
    $clave2 = $_POST['password_repeat'];


      $server ='rut.colombiahosting.com.co:3306';
      $username= 'aticin_induser';
      $password = 'indu3001*';
      $database = 'aticin_indu_login';
      $tabla_name = 'login_crm';


        $conexion = new mysqli($server,$username,$password, $database);
        /*$conexion = new mysqli($server, $username, $password, $database); */


          if($conexion -> connect_error){

            die("la conexion ha fallado".$conexion -> connect_error);
          }

       $buscarUsuario = "SELECT * FROM $tabla_name WHERE usuario = '$usuario' ";
       $resultado = $conexion -> query($buscarUsuario);

      $count = mysqli_num_rows($resultado);

      if($count == 1){
        echo "<br /> Este Usuario ya existe <br />";
        echo "<a href='registrar_usuario.html'>Por favor elija un usuario diferente </a>";
      }else{

        $query = "INSERT INTO login_crm (id, usuario, seleccion, email, clave, clave2) VALUES (null, '$usuario', '$seleccion', '$email', '$clave', '$clave2')";
        //echo "la variable es $usuario";

        if($conexion -> query($query) == true) {
          echo"<br/>"."<h1>"."Se ha agregado con exito"."</h1>";
          echo"<br>";
          echo"<h3>"."Bienvenidos: ".$_POST["$username"]."</h3>";
          echo"<br>";
          echo"<br>";
        }else{
          echo"ERROR AL CREAR USUARIO".$query."<br>".$conexion -> error;
        }
      }
}
     ?>
