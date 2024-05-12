<?php
    include('conexion.php');
    session_start();

    // Verifica si el usuario ha iniciado sesión
    if (!isset($_SESSION["username"])) {
        // Redirige a la página de inicio de sesión si no ha iniciado sesión
        header("Location: index.php");
        exit;
    }  
?>
<!DOCTYPE html>
<html lang="es">
<title>Editar informes</title>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Koh+Santepheap&display=swap');
    </style>
    <link href = editar.scss rel="stylesheet"/>
    <div class="barradetareas"><a class="title" href="tablas.php"><h2>Technologies LH</h2></a></div>
</head>
<body>
<?php 
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$fecha = $_POST['fecha'];
$type = $_POST['tipodearchivo'];
$link = $_POST['descarga'];
?>

<div class="containerform">
    <form method="post" action="edit.php">
    <h2 class="H2S">Editar registro de operaciones</h2>
    <p> Por favor introduce los datos correspondientes para editar el registro:</p><br>
        <div class="input-wrapper">
            <label>Id Informe (No alterar):</label> <input type="label" name="id" value="<?php echo $id ?>">
        </div>    
        <div class="input-wrapper">
            <label>Nombre del registro:</label> <input type="text" name="nombre" value="<?php echo $nombre ?>">
        </div>
        <div class="input-wrapper">
            <label>Fecha de registro:</label> <input type="date" name="fecha" value="<?php echo $fecha ?>">
        </div>
        <div class="input-wrapper">
            <label>Tipo de documento:</label> <select name="tipodearchivo" class="select">
                    <option value="<?php echo $type ?>" hidden selected><?php echo $type ?></option>
                    <option value="DOCX">DOCX</option>
                    <option value="PDF">PDF</option>
                    <option value="XSLX">XSLX</option>
                </select>
        </div>
        <div class="input-wrapper">
            <label>Link del repositorio:</label>
            <input type="text" name="descarga" value="<?php echo $link ?>">
        </div>
        <input class="btn" type="submit" name="update" value="Actualizar registro">
</div>
</form>
<?php 
if(isset($_POST["update"])){
    include('conexion.php');
    
    $sql = "UPDATE informes SET Nom_Informe=?, Fecha=?, Tipo=?, Link_Download=? WHERE Id_Informe=?";
    $SENTENCIA = mysqli_prepare($conex, $sql);
    mysqli_stmt_bind_param($SENTENCIA, "ssssi", $nombre, $fecha, $type, $link, $id);
    mysqli_stmt_execute($SENTENCIA);
    $affected = mysqli_stmt_affected_rows($SENTENCIA);
    if($affected == 1){
        echo "<div class='success'>El registro ha sido actualizado</div>";
    }else{
        echo "<div class='error'>No se ha podido actualizar el registro</div>";
    }
    mysqli_stmt_close($SENTENCIA);
}
?>
<div class="container">
    <h2 class="H2S"> Editar Registros </h2>
    <p>Se muestra los cambios en los registros:</p>
<table class="table">
    <form action="" method="post">
                <thead  class= "table-dark">
                <tr>
                    <td>Id<i class="bi bi-arrow-down-up"></i></td>
                    <td>Nombre de registro <i class="bi bi-arrow-down-up"></i></td>
                    <td>Fecha de emisión <i class="bi bi-arrow-down-up"></i></td>
                    <td>Tipo de documento <i class="bi bi-arrow-down-up"></i></td>
                    <td>Link de Descarga <i class="bi bi-arrow-down-up"></i></td>
                </tr>
                </thead>
                <tbody>
                <?php
                $rows = mysqli_query($conex, "SELECT * FROM informes");
                foreach ($rows as $row) :
                ?>
                <tr>
                    <td><?php echo $row['ID_Informe'];?></td>
                    <td><?php echo $row['Nom_Informe'];?></td>
                    <td><?php echo $row['Fecha'];?></td>
                    <td><?php echo $row['Tipo'];?></td>
                    <td><a href= "<?php echo $row['Link_Download'];?>"><i class="bi bi-download"></i></a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
            <div class="table_fotter">
                <?php
                    $numero = mysqli_num_rows($rows);
                    echo "<center><h3> Total de registros: $numero</h3></center>";
                ?>
            </div>
        </div>
        <footer class="footerbase">
        <div class="container2">
            <div class="footer-row2">
                <div class="footer-links">  
                    <h4>Sobre Nosotros</h4>  
                    <ul>
                        <li><a href="#">Acerca de nosotros</a></li>
                        <li><a href="#">Política de privacidad</a></li>
                        <li><a href="#">Nuestros servicios</a></li>
                    </ul>
                </div>
                <div class="footer-links"> 
                        <h4>Siguenos</h4>
                        <div class="social-link">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-x"></i></a>
                        </div>
                    </div>
                </div>
            </div>
    </footer>
</body>
</html>