
    <?php session_start();


   if ($_SERVER['REQUEST_METHOD'] == 'POST'){



    $Nom_Cliente = $_POST['Nom_Cliente'];
    $Tipo_Id_Cliente = $_POST['Tipo_Id_Cliente'];
    $Id_Cliente =$_POST['Id_Cliente'];
    $Domicilio_Cliente = $_POST['Domicilio_Cliente'];
    $Tel_Cliente = $_POST['Tel_Cliente'];
    $Cel_Cliente =$_POST['Cel_Cliente'];

    $Fecha_nac_Cliente1 = $_POST['Fecha_nac_Cliente'];
    $Correo_Cliente = $_POST['Correo_Cliente'];
    $Contacto_Cliente = $_POST['Contacto_Cliente'];
    $Tel_Contacto_Cliente = $_POST['Tel_Contacto_Cliente'];
    $Fecha_nac_Cliente=date('Y-m-d', strtotime($Fecha_nac_Cliente1));
/*    $server ='localhost/versiones_de_gentelella/gentelella/production';
    $username= 'root';
    $password = '796534';
    $database = 'aticin_induser';
    $tabla_name = 'Clientes';
*/

      $server ='rut.colombiahosting.com.co:3306';
      $username= 'aticin_induser';
      $password = 'indu3001*';
      $database = 'aticin_Indumuebles';
      $tabla_name = 'Clientes';

        $conexion = new mysqli($server,$username,$password, $database);


          if($conexion -> connect_error){

            die("la conexion ha fallado".$conexion -> connect_error);
          }

       $buscarCliente = "SELECT * FROM Clientes WHERE Nom_Cliente = '$Nom_Cliente' ";
       $resultado = $conexion -> query($buscarCliente);

      $count = mysqli_num_rows($resultado);

      if($count == 1){
        echo "<br /> Este cliente ya existe <br />";
        echo "<a href='form.html'> </a>";
      }else{
        $query = "INSERT INTO Clientes (id, Nom_Cliente, Tipo_Id_Cliente, Id_Cliente, Domicilio_Cliente, Tel_Cliente, Cel_Cliente, Fecha_nac_Cliente, Correo_Cliente, Contacto_Cliente, Tel_Contacto_Cliente) VALUES (null,'$Nom_Cliente', '$Tipo_Id_Cliente', '$Id_Cliente', '$Domicilio_Cliente', '$Tel_Cliente', '$Cel_Cliente','$Fecha_nac_Cliente', '$Correo_Cliente', '$Contacto_Cliente', '$Tel_Contacto_Cliente' )";
        echo "la variable es $Nom_Cliente";

        if($conexion -> query($query) == true) {
          echo"<br/>"."<h1>"." Se ha agregado con exito $Fecha_nac_Cliente "."</h1>";
          echo"<br>";
          echo"<h3>"."Ha sido agregado a clientes: ".$_POST["$Nom_Cliente"]."</h3>";
          echo"<br>";
          echo"<br>";
        }else{
          echo"ERROR AL CREAR USUARIO".$query."<br>".$conexion -> error;
        }
      }
}
     ?>
