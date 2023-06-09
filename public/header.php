<?php
    
    if (!isset($_SESSION['usuario'])) {
       header("Location: ?controlador=Usuario&accion=mostrar");
       exit();
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Laboratorio Entomologia</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <link href="public/css/bootstrap.min.css" rel="stylesheet">
        <link href="public/css/estilo.css" rel="stylesheet"/>
        <script type="text/javascript" src="public/js/jquery.js"></script>
        <script type="text/javascript" src="public/js/script.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
    </head>
    <body>
        <p><?php $_SESSION['usuario']?></p>
        <header class="bg-dark">
            <h1 class="text-light pt-3">Laboratorio entomología UCR</h1>
            <nav class="navbar navbar-expand-lg bg-dark">
                <ul class="navbar-nav mr-auto col-8" >
                    <li class="nav-item"><a class="nav-link active text-light" href="?controlador=insectos&accion=mostrar">Inicio</a></li>
                    <li class="nav-item hover-dropdown"><div class="dropdown bg-dark border-0">
                            <a class="nav-link text-light dropdown-toggle border-0" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                Busquedas generales
                            </a>

                            <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item text-light hover-dropdown" href="?controlador=insectos&accion=mostrarBuscarOrden">Orden</a></li>
                                <li><a class="dropdown-item text-light hover-dropdown" href="?controlador=insectos&accion=buscarInsectoFamilia">Familia</a></li>
                                <li><a class="dropdown-item text-light hover-dropdown" href="?controlador=insectos&accion=buscarInsectoSubfamilia">Subfamilia</a></li>
                                <li><a class="dropdown-item text-light hover-dropdown" href="?controlador=Cultivo&accion=mostrarBuscarCultivo">Cultivo</a></li>
                            </ul>
                        </div></li>
                    
                    <?php if ($_SESSION['tipo'] == 1) { ?>
                        <li class="nav-item"><a class="nav-link text-light" href="?controlador=insectos&accion=mostrarRegistrarInsecto">Registrar insecto</a></li>
                        <li class="nav-item"><a class="nav-link text-light" href="?controlador=Cultivo&accion=mostrar">Registrar cultivo</a></li>
                        <li class="nav-item"><a class="nav-link text-light" href="?controlador=Usuario&accion=mostrarRegistrarUser">Registrar Usuario</a></li>
                    <?php } ?>  
                </ul>
                <div class=" col-sm-4 d-flex justify-content-end"><a class="nav-link" id="carrito" href="?controlador=carrito&accion=mostrar"></a><a class="nav-link ml-2" id="logout" href="?controlador=Usuario&accion=logout"></a></div>

            </nav>

        </header>

