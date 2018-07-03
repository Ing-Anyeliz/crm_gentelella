<?php
/*  $server ='localhost';
  $username= 'root';
  $password = '796534';
  $dbname = 'logincrm';
  $tabla_name = 'login_crm';*/

        $server ='rut.colombiahosting.com.co:3306';
        $username= 'aticin_induser';
        $password = 'indu3001*';
        $database = 'aticin_indu_login';
        $tabla_name = 'login_crm';


        $conexion = new mysqli($server,$username,$password, $database);

        if($conexion -> connect_error){

          die("la conexion ha fallado".$conexion -> connect_error);
        }
      /*if ($conexion){

        echo 'conexion correcta';
      }
      else {
        echo 'Error de conexion';
      } */

 ?>
