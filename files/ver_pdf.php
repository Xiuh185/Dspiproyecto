<!DOCTYPE html>
<html lang="es">
<<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Koh+Santepheap&display=swap');
    </style>
    <link href = ver_pdf.scss rel="stylesheet"/>
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
    <div class="container">
    <H2 class="h2header">Vista previa del PDF</H2>
    <?php
    // Obtener el nombre del archivo PDF de los parámetros de la URL
    if (isset($_GET['file'])) {
        $archivo_pdf = htmlspecialchars($_GET['file']);
        echo '<iframe src="' . $archivo_pdf . '"></iframe>';
        $url_pdf = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/" . $archivo_pdf;
        echo '<div class="wrapper">';
        echo '<p>Enlace directo al PDF para copiar:</p>';
        echo '<input type="text" value="' . $url_pdf . '" size="80" readonly>';
        echo '</div>';
        echo '<div class="actions-link">';
        echo '<p>Acciones:</p>';
        echo '<p><a href="' . $archivo_pdf . '" target="_blank">Abrir PDF en una nueva pestaña</a></p>';
        echo '<p><a href="../tablas.php">Regresar a la pagina principal</a></p>';
        echo '<p><a href="../Nuevo_registro_table.php">Generar la cotización</a></p>';
        echo '</div>';
    } else {
        echo '<p>No se especificó ningún archivo PDF.</p>';
    }
    ?>
    </div>
</body>
</html>
