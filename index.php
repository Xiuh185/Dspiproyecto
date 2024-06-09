<!DOCTYPE html>
<html lang="es">
<title>Inicio de Sesión</title>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link href = index.css rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Koh+Santepheap&display=swap');
    </style>
    <div class="barradetareas"><h2>Technologies LH</h2></div>
</head>
<body>
    <form action="consultar.php" method="post">
        <h2>Iniciar Sesión</h2>
        <div class="input-wrapper">
            <input type="text" name="username" placeholder="Nombre de usuario">
            <img class="input-icon" src="Resources/name.svg" alt="">
        </div>
        <div class="input-wrapper">
            <input type="password" name="key_username" placeholder="Contraseña">
            <img class="input-icon" src="Resources/password.svg" alt="">
        </div>
        <input class="btn" type="submit" name="enviar" value="Enviar">
        <h5><p>¿No tiene cuenta? <a href="SignUp.php">Registrarse ahora</a></p></h5>
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