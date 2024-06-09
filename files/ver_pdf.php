<?php
if (isset($_GET['file'])) {
    $file = urldecode($_GET['file']);
    $filepath = __DIR__ . '/' . $file;

    if (file_exists($filepath)) {
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . basename($filepath) . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        @readfile($filepath);
    } else {
        echo "El archivo no existe.";
    }
} else {
    echo "No se proporcionó ningún archivo.";
}
?>