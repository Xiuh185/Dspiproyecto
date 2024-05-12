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
<title>Panel de informes</title>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Koh+Santepheap&display=swap');
    </style>
    <link href = tablasd.scss rel="stylesheet"/>
    <div class="barradetareas"><a class="title" href="tablas.php"><h2>Technologies LH</h2></a></div>
</head>
<body>
    <div class="container">
        <div class="table_header">
            <H2>Historial de Informes</H2>
                <select name="" id="">
                    <option value="" selected>DOCX</option>
                    <option value="">PDF</option>
                    <option value="">XSLX</option>
                </select>
                Acciones:<a href="Nuevo_registro_table.php"><i class="bi bi-file-earmark-plus"></i></a>
                <a href="delete.php"><i class="bi bi-trash3-fill"></i></a>
                <div class="input_search">
                <input type="search" placeholder="Buscar">
                <i class="bi bi-search" id="search"></i>
    </div>
            </div>

            <table class="table">
                <thead class="table-dark">
                <tr>
                    <td>Id<i class="bi bi-arrow-down-up"></i></td>
                    <td>Nombre de registro <i class="bi bi-arrow-down-up"></i></td>
                    <td>Fecha de emisión <i class="bi bi-arrow-down-up"></i></td>
                    <td>Tipo de documento <i class="bi bi-arrow-down-up"></i></td>
                    <td>Link de Descarga <i class="bi bi-arrow-down-up"></i></td>
                    <td>Editar registro<i class="bi bi-arrow-down-up"></i></td>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    
                        $sql = "SELECT * FROM informes";
                        $resultados = mysqli_query($conex, $sql);
                        while($r = mysqli_fetch_assoc($resultados)){
                    
                echo "<tr>";
                    echo "<td>" . $r['ID_Informe'] . "</td>";
                    echo "<td>" . $r['Nom_Informe'] . "</td>";
                    echo "<td>" . $r['Fecha'] ."</td>";
                    echo "<td>" . $r['Tipo'] ."</td>";
                    echo "<td><a href='" . $r["Link_Download"] . "'><i class='bi bi-download'></i></a></td>";
                    echo "<td> 
                    <form action='edit.php' method='POST'>
                    <input type='hidden' name='id' value='" . $r["ID_Informe"] . "'>
                    <input type='hidden' name='nombre' value='" . $r["Nom_Informe"] . "'>
                    <input type='hidden' name='fecha' value='" . $r["Fecha"] . "'>
                    <input type='hidden' name='tipodearchivo' value='" . $r["Tipo"] . "'>
                    <input type='hidden' name='descarga' value='" . $r["Link_Download"] . "'>
                    <input type='submit' class='btneditar' name='editar' value='Editar' '>
                    </form>
                    </td>";
                    echo "</tr>";
                }

                ?>
                </tbody>
            </table>
            <div class="table_fotter">
                <?php
                    $numero = mysqli_num_rows($resultados);
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
