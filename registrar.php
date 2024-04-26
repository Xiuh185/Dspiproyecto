<?php
        include ("conexion.php");
        if(isset ($_POST['enviar'])){
            if(
                strlen($_POST['user']) >= 1 &&
                strlen($_POST['key']) >= 1
                ){
                    $name = trim($_POST['user']);
                    $password = trim($_POST['key']);
                    $consulta = "INSERT INTO datos(nombre, contrasena) VALUES ('$name','$password')";
                    $resultado = mysqli_query($conex, $consulta);
                    if($resultado ){
                        ?>
                                <div class="success">Tu registro ha concluido de forma exitosa</div>
                    <?php
                    } else{
                        ?>
                                <div class="error">Ocurrio un error</div>
                    <?php
                    }
            } else{
                ?>
                            <div class="error">Llena los campos</div>
            <?php
            }
        }
?>