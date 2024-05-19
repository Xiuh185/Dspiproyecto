<?php
    include('conexion.php');
    session_start();

    // Verifica si el usuario ha iniciado sesión
    if (!isset($_SESSION["username"])) {
        // Redirige a la página de inicio de sesión si no ha iniciado sesión
        header("Location: index.php");
        exit;
    }
    if(isset($_POST["delete"]) && isset($_POST["deleteId"])) {
       
        foreach($_POST["deleteId"] as $deleteid){
            $delete = "DELETE FROM informes WHERE ID_Informe = $deleteid";
            mysqli_query($conex, $delete);
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<title>Eliminar informes</title>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Koh+Santepheap&display=swap');
    </style>
    <link href = delete.scss rel="stylesheet"/>
</head>
<body>
<div class="barradetareas"><div class="titulo">
    <a class="title" href="tablas.php"><h2>Technologies LH</h2></a>
    </div>
    <div class="cerrar_sesion">
    <a class="a_1" href="logout.php">Cerrar la sesión</a>
    </div>   
</div>
<div class="container">
    <h2 class="H2S"> Eliminar Registros </h2>
    <p>Por favor, seleccione uno o varios registros para poder eliminarlos:</p>
<table class="table">
    <form action="" method="post">
                <thead  class= "table-dark">
                <tr>
                    <td><button type="submit" class="btn" name="delete">Eliminar</button></td>
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
                    <td><input type="checkbox" name="deleteId[]" value="<?php echo $row['ID_Informe'];?>"></td>
                    <td><?php echo $i++; ?></td>
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
