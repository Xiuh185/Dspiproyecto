<!DOCTYPE html>
<html lang="es">
<title>Registro Nuevo</title>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href = SignUp.css rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <div class="barradetareas"><h2>Technologies LH</h2></div>
</head>
<body>
    <form method="post">
        <h2>Nuevo usuario</h2>
        <div class="input-wrapper">
            <input type="text" name="user" placeholder="Nombre de usuario">
            <img class="input-icon" src="Resources/name.svg" alt="">
        </div>
        <div class="input-wrapper">
            <input type="text" name="key" placeholder="Contraseña">
            <img class="input-icon" src="Resources/password.svg" alt="">
        </div>
        <input class="btn" type="submit" name="enviar" value="Enviar">
        <h5><p>¿Ya tiene cuenta? <a href="index.php">Regresar ahora</a></p></h5>
        <?php
        //registro de usuarios
        include("registrar_usuario.php");
        ?>
    </form>
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