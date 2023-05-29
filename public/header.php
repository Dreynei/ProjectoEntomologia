<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Laboratorio Entomologia</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="public/css/estilo.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/bootstrap.min.css" rel="stylesheet">
        <script src="public/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="public/js/jquery.js"></script>
        <script type="text/javascript" src="public/js/script.js"></script>
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
        <header>
            <h1>Ejemplo</a></h1>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <ul class="navbar-nav" >
                    <li class="nav-item"><a class="nav-link active" href="?controlador=insectos&accion=mostrar">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="?controlador=insectos&accion=mostrarRegistrarInsecto">Registrar insecto</a></li>
                    <li class="nav-item"><a class="nav-link" href="?controlador=Persona&accion=mostrar">Mostrar Persona</a></li>
                    <li class="nav-item"><a class="nav-link" href="?controlador=Persona&accion=mostrarListarPersonasAjax">Listar Personas Ajax</a></li>                                        
                    <li class="nav-item"><a class="nav-link" href="?controlador=Persona&accion=mostrarBuscarPersonaCedula">Buscar Persona</a></li>    
                </ul>
            </nav>
        </header>

