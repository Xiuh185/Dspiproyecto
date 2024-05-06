<?php
   require_once ('conexion.php');

        $user = $_POST['username'];
        $password = $_POST['key_username'];
        
        //Consulta de la base de datos
        $sql = "SELECT * FROM datos WHERE nombre = '$user' AND contrasena = '$password'";
        $resultado = $conex->query($sql);
        $row = $resultado->fetch_assoc();

        if($resultado->num_rows> 0){
            session_start();
            $_SESSION['username'] = $user;
            header("location:tablas.php");
        } else{
            header("location:index.php");
        }
?>