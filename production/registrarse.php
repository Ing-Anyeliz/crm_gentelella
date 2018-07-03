<?php session_start();

    if(isset($_SESSION['usuario'])) {
        header('location: index.html');
    }


        /*$usuario = $_POST['usuario'];
        $seleccion = $_POST['seleccion'];
        $email =$_POST['email'];
        $clave = $_POST['password'];
        $clave2 = $_POST['password_repeat']; */

        /*
        $clave = hash('sha512', $clave);
        $clave2 = hash('sha512', $clave2);*/
        $usuario = $_POST['usuario'];
        $seleccion = $_POST['seleccion'];
        $email =$_POST['email'];
        $clave = $_POST['password'];
        $clave2 = $_POST['password_repeat'];
        $error = '';

        if (empty($email) or empty($usuario) or empty($clave) or empty($clave2)){

            $error .= '<i>Rellenar todos los campos vacios</i>';
        }else{
            try{
                $conexion = new PDO('mysql:host=rut.colombiahosting.com.co:3306;dbname=aticin_indu_login', 'aticin_induser', 'indu3001*');
            }catch(PDOException $prueba_error){
                echo "Error: " . $prueba_error->getMessage();
            }

            $statement = $conexion->prepare('SELECT * FROM login_crm WHERE usuario = :usuario LIMIT 1');
            $statement->execute(array(':usuario' => $usuario));
            $resultado = $statement->fetch();


            if ($resultado != false){
                $error .= '<i> Este usuario ya existe</i>';
            }

            if ($clave != $clave2){
                $error .= '<i> Las contraseñas no coinciden</i>';
            }

        }

        try{
          $conexion = new PDO('mysql:host=rut.colombiahosting.com.co:3306;dbname=aticin_indu_login', 'aticin_induser', 'indu3001*');
        }catch(PDOException $prueba_error){
            echo "Error: " . $prueba_error->getMessage();
        }



                  if ($error == ''){
                      $statement = $conexion->prepare('INSERT INTO login_crm (id, usuario, seleccion, email, clave, clave2) VALUES (null,:usuario, :seleccion, :email, :clave)');
                      $statement->execute(array(

                          ':usuario' => $usuario,
                          ':seleccion' => $seleccion,
                          ':email' => $email,
                          ':password' => $clave

                      ));

                      $error .= '<i style="color: green;">Usuario registrado exitosamente</i>';
                  }





?>
