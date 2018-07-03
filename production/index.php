<?php session_start();

      if(isset($_SESSION['usuario'])){

          header('location:index.html');

      }else{
          header('location:login.html');

      }

 ?>
