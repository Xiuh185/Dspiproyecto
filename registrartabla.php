<?php
    include ("conexion.php");
    if(isset ($_POST['upload'])){
        if(
            strlen($_POST['Nom_Registro']) >= 1 &&
            strlen($_POST['fecha_registro']) >= 1 &&
            strlen($_POST['type_document']) >= 1 &&
            strlen($_POST['link_download']) >= 1
            ){
                $nameregister = trim($_POST['Nom_Registro']);
                $date = trim($_POST['fecha_registro']);
                $type = trim($_POST['type_document']);
                $link = trim($_POST['link_download']);
                $consulta = "INSERT INTO informes(Nom_Informe, Fecha, Tipo, Link_Download) VALUES ('$nameregister','$date','$type','$link')";
                $resultado = mysqli_query($conex, $consulta);
                if($resultado){
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