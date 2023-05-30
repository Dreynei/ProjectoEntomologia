<!DOCTYPE html>
<html >
    <head>

        <link href="public/css/bootstrap.min.css" rel="stylesheet">
        <script src="public/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="public/js/jquery.js"></script>
        <link rel="stylesheet" type="text/css" href="public/css/estilo.css" >

    </head>


    <body class="text-center">

        <div id="contenedorLogin" class="container d-flex align-items-center justify-content-center " style="height: 100vh;">         
            <form class="bg-body" method="POST" action="?controlador=Usuario&accion=autenticarUsuario">

                <h1 class="m-3 h3 fw-normal">Autenticación usuario</h1>
                
                <div class="m-3 form-floating">
                    <input type="text" name="usuario" class="form-control" id="floatingInput" placeholder="Usuario" required>
                    <label for="floatingInput">Nombre de usuario</label>
                </div>
                <div class="m-3 form-floating">
                    <input type="password" name="contrasenna" class="form-control" id="floatingPassword" placeholder="password" required>
                    <label for="floatingPassword">Contraseña</label>
                </div>
                <button class="m-3 btn btn-lg btn-primary" type="submit">Iniciar sesión</button>
                <p class="text-body-secondary">© Andrei Pérez - Miguel Araya
                </p>


            </form >
        </div>
    </body>
</html>

