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
    <link href = "Nuevo_registro_table.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <div class="barradetareas"><h2>Technologies LH</h2></div>
</head>
<body>
    <form method="post">
    <h2>Nuevo registro de operaciones</h2>
    <p> Por favor introduce los datos correspondientes para completar el registro </p><br>
        <div class="input-wrapper">
            Nombre del registro: <input type="text" name="Nom_Registro" placeholder="Nombre del registro">
        </div>
        <div class="input-wrapper">
            Fecha de registro: <input type="date" name="fecha_registro">
        </div>
        <div class="input-wrapper">
            Tipo de documento: <select name="type_document" class="select">
                    <option value="DOCX" selected>DOCX</option>
                    <option value="PDF">PDF</option>
                    <option value="XSLX">XSLX</option>
                </select>
        </div>
        <div class="input-wrapper">
            Link del repositorio:
            <input type="text" name="link_download" placeholder="Ingrese el link de descarga del repositorio">
        </div>
        <div class="input-wrapper">
        <input class="btn" type="submit" name="upload" value="Aceptar">
        </div>
        </form>
        <?php
        //registro de informes
        include("registrartabla.php");
        ?>
        <footer class="footer">
        <div class="container">
            <div class="footer-row">
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