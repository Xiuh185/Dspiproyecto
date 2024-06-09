<?php
include('conexion2.php');
session_start();

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION["username"])) {
    // Redirige a la página de inicio de sesión si no ha iniciado sesión
    header("Location: index.php");
    exit;
}

if (isset($_POST['agregar'])) {
    $productos = $_POST['productos'];
    $cantidades = $_POST['cantidades'];
   
    foreach ($productos as $index => $producto) {
        $cantidad = $cantidades[$index];
        $precio = $_POST['precios'][$index];
        $total = $precio * $cantidad;
       
        $consulta = "INSERT INTO carrito(producto, cantidad, precio, total) VALUES ('$producto', '$cantidad', '$precio', '$total')";
        mysqli_query($conex, $consulta);
    }
    header("Location: Nuevoreporte.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    include('generarreporte.php');
}
$consulta = "SELECT * FROM carrito";
$resultado = mysqli_query($conex, $consulta);
$total_final = 0;
 
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
    <link href = productos.scss rel="stylesheet"/>
    <div class="barradetareas">
    <div class="titulo">
    <a class="title" href="../tablas.php"><h2>Technologies LH</h2></a>
    </div>
    <div class="cerrar_sesion">
    <a class="a_1" href="../logout.php">Cerrar la sesión</a>
</div>    
</form>
</div>
</head>
<body>
    <div class="containerform">
        <form method="post" action="">
            <h2 class="H2S">Seleccionar Productos Electrónicos</h2>
            <p>Por favor selecciona los productos y las cantidades:</p><br>
            <div class="input-wrapper">
                <label>Producto:</label>
                <select name="productos[]">
                    <option value="Laptop">Laptop - $1000</option>
                    <option value="Smartphone">Smartphone - $500</option>
                    <option value="Tablet">Tablet - $300</option>
                    <option value="Monitor">Monitor - $200</option>
                </select>
            </div>
            <div class="input-wrapper">
                <label>Cantidad:</label> <input type="number" name="cantidades[]" min="1" value="1">
                <input type="hidden" name="precios[]" value="1000">
                <input type="hidden" name="precios[]" value="500">
                <input type="hidden" name="precios[]" value="300">
                <input type="hidden" name="precios[]" value="200">
            </div>
            <input class="btn" type="submit" name="agregar" value="Agregar al Carrito">
            <h2 class="H2S">Por último dale el nombre final al reporte:</h2>
            <div class="input-wrapper">
            <label for="filename">Nombre del reporte:</label> 
            <input type="text" id="filename" name="filename" placeholder="Nombre del reporte">
        </div>
            <input class="btn" type="submit" name="Crear" value="Crear Reporte en PDF">
        </form>
    </div>
    <div class="container">
<h2 class="H2S">Reporte de Compras</h2>
<table class="table">
            <thead class="table-dark">
                <tr>
                    <td>Producto</td>
                    <td>Cantidad</td>
                    <td>Precio Unitario</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($resultado)): ?>
                    <tr>
                        <td><?php echo $row['producto']; ?></td>
                        <td><?php echo $row['cantidad']; ?></td>
                        <td><?php echo $row['precio']; ?></td>
                        <td><?php echo $row['total']; ?></td>
                    </tr>
                    <?php $total_final += $row['total']; ?>
                <?php endwhile; ?>
            </tbody>
        </table>
        <div class="table-footer">
            <h3><center>Total Final: <?php echo $total_final; ?></center></h3>
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
