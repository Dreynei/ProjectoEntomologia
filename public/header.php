<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Laboratorio Entomologia</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <link href="public/css/bootstrap.min.css" rel="stylesheet">
        <link href="public/css/estilo.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="public/js/jquery.js"></script>
        <script type="text/javascript" src="public/js/script.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
        <script type="text/javascript">

            function consultaAsincrona(cedula) {
                var parametros = {
                    "cedula": cedula
                };
                $.ajax(
                        {
                            data: parametros,
                            url: '?controlador=Persona&accion=buscarPersonaCedula',
                            type: 'post',
                            beforeSend: function () {
                                $("#resultado").html("Procesando");
                            },
                            success: function (respuesta) {
                                $("#resultado").html(respuesta);
                            }
                        }
                );
            } // consultaAsincrona

        </script>
    </head>
    <body>
        <!--            <div class="container">-->
        <header class="bg-dark">
            <h1 class="text-light pt-3">Laboratorio entomología UCR</h1>
            <nav class="navbar navbar-expand-lg bg-dark">
                <ul class="navbar-nav" >
                    <li class="nav-item p"><a class="nav-link active text-light" href="?controlador=insectos&accion=mostrar">Inicio</a></li>
                    <li><div class="dropdown bg-dark border-0">
                            <a class="btn btn-secondary dropdown-toggle bg-dark border-0" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                Busquedas generales
                            </a>

                            <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item text-light" href="?controlador=insectos&accion=mostrarBuscarOrden">Orden</a></li>
                                <li><a class="dropdown-item text-light" href="?controlador=insectos&accion=buscarInsectoFamilia">Familia</a></li>
                                <li><a class="dropdown-item text-light" href="?controlador=insectos&accion=buscarInsectoSubfamilia">Subfamilia</a></li>
                            </ul>
                        </div></li>
                    <li class="nav-item"><a class="nav-link text-light" href="?controlador=insectos&accion=mostrarRegistrarInsecto">Registrar insecto</a></li>
                    <?php if ($_SESSION['tipo'] == 1) { ?>
                        <li class="nav-item"><a class="nav-link text-light" href="?controlador=Usuario&accion=mostrarRegistrarUser">Registrar Usuario</a></li>
                    <?php } ?>  
                </ul>
            </nav>
        </header>

