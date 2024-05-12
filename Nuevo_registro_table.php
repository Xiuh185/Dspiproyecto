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
<title>Nuevo Registro</title>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href = "Nuevo_registro_table.scss" rel="stylesheet"/>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Koh+Santepheap&display=swap');
    </style>
    <div class="barradetareas"><a class="title" href="tablas.php"><h2>Technologies LH</h2></a></div>
</head>
<body>
    <div class="containerform">
    <form method="post">
    <h2 class="H2S">Nuevo registro de operaciones</h2>
    <p> Por favor introduce los datos correspondientes para completar el registro </p><br>
        <div class="input-wrapper">
            <label>Nombre del registro:</label> <input type="text" name="Nom_Registro" placeholder="Nombre del registro">
        </div>
        <div class="input-wrapper">
            <label>Fecha de registro:</label> <input type="date" name="fecha_registro">
        </div>
        <div class="input-wrapper">
            <label>Tipo de documento:</label> <select name="type_document" class="select">
                    <option value="DOCX" selected>DOCX</option>
                    <option value="PDF">PDF</option>
                    <option value="XSLX">XSLX</option>
                </select>
        </div>
        <div class="input-wrapper">
            <label>Link del repositorio:</label>
            <input type="text" name="link_download" placeholder="Ingrese el link de descarga del repositorio">
        </div>
        <input class="btn" type="submit" name="upload" value="Aceptar">
</div>
</form>
        <?php
        //registro de informes
        include("registrartabla.php");
        ?>
        <div class="container">
    <H2 class="H2S">Vista previa:</H2>
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
                $i = 1;
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
                </div>
    </footer>
</body>
</html>
