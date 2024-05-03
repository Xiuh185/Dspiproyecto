<?php
        include("consultar.php");
?>
<!DOCTYPE html>
<html lang="es">
<title>Panel de informes</title>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Koh+Santepheap&display=swap');
    </style>
    <link href = tablasd.scss rel="stylesheet"/>
</head>
<body>
<div class="barradetareas"> Technologies LH</div>
    <div class="container">
        <div class="table_header">
            <p>Historial de Informes</p>
                <select name="" id="">
                    <option value="" selected>DOCX</option>
                    <option value="">PDF</option>
                    <option value="">XSLX</option>
                </select>
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
                </tr>
                </thead>
                <tbody>
                    <?php 
                        $sql = "SELECT * FROM informes";
                        $resultados = mysqli_query($conex, $sql);

                        while($mostrar = mysqli_fetch_array($resultados)){
                    ?>
                <tr>
                    <td><?php echo $mostrar['ID_Informe'] ?></td>
                    <td><?php echo $mostrar['Nom_Informe'] ?></td>
                    <td><?php echo $mostrar['Fecha'] ?></td>
                    <td><?php echo $mostrar['Tipo'] ?></td>
                    <td><a href="<?php echo $mostrar['Link_Download'] ?>"><i class="bi bi-download"></i></a></td>
                </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
            <div class="table_fotter">
                <p> Total de filas: 0</p>
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
