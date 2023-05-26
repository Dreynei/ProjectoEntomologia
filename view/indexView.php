<!--
login de usuarios normales
-->
<!DOCTYPE html>
<html >
    <head>

        <link href="public/css/bootstrap.min.css" rel="stylesheet">
        <script src="public/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="public/js/jquery.js"></script>
        <link rel="stylesheet" type="text/css" href="public/css/estilo.css" >

    </head>
    
    <?php
  
        //echo "<script>alert('" . $vars['lista'][0] . "');</script>";
    
    ?>
    
    <body class="text-center">

        <div id="contenedorLogin" class="container d-flex align-items-center justify-content-center" style="height: 100vh;"> 
            <div id="divImgLogin" class="w-50">
                <form class="" action="?controlador=insectos&accion=mostrar">

                    <h1 class="m-3 h3 fw-normal">Autenticación</h1>

                    <div class="m-3 form-floating">
                        <input name="usuario" type="text" class="form-control" id="floatingInput" placeholder="text">
                        <label for="floatingInput">Nombre de usuario</label>
                    </div>
                    <div class="m-3 form-floating">
                        <input name="contrasenna" type="password" class="form-control" id="floatingPassword" placeholder="password">
                        <label for="floatingPassword">Contraseña</label>
                    </div>
                    <button class="m-3 btn btn-lg btn-primary" type="submit">Iniciar sesión</button>
                    <p class="text-body-secondary">© Andrei Pérez - Miguel Araya
                    </p>
                </form >
            </div>
        </div>
    </body>
</html>
