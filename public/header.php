<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Ejemplo HTML</title>
		<meta name="description" content="Este es un ejemplo de pagina web">
		<meta name="viewport" content="width=device-width,initial-scale=1">
                <link href="public/css/estilo.css" rel="stylesheet" type="text/css"/>
                <link href="public/css/bootstrap.min.css" rel="stylesheet">
                <script src="public/js/bootstrap.min.js"></script>
                <script type="text/javascript" src="public/js/jquery.js"></script>
                <script type="text/javascript">
                    function consultaAsincrona(cedula){
                        var parametros={
                            "cedula":cedula
                        };
                        $.ajax(
                            {
                                data:parametros,
                                url:'?controlador=Persona&accion=buscarPersonaCedula',
                                type:'post',
                                beforeSend:function(){
                                    $("#resultado").html("Procesando");
                                },
                                success:function (respuesta){                                
                                    $("#resultado").html(respuesta);
                                }
                            }
                        );
                    } // consultaAsincrona
                    
                    
                    function consultaAsincronaRespuestaJSON(cedula){
                        var parametros={
                            "cedula":cedula
                        };
                        $.ajax(
                            {
                                url:'?controlador=Persona&accion=listarPersonasAjax',
                                type:'post',
                                beforeSend:function(){
                                    $("#resultado").html("Procesando");
                                },
                                success:function (respuesta){   
                                    var datos = JSON.parse(respuesta);
                                    for (var i = 0; i < datos.length; i++) {
                                        $("#resultado").html(respuesta);
                                        var opcion = $('<option>', {
                                            value: datos[i].cedula,
                                            text: datos[i].nombre
                                        });
                                        $("#personas").append(opcion);
                                    } // for
                                    
                                }
                            }
                        );
                    } // consultaAsincrona                    
                    
                </script>
	</head>
	<body>
            <div class="container">
		<header>
			<h1>Ejemplo</a></h1>
                        <nav class="navbar navbar-expand-lg bg-body-tertiary">
                            <ul class="navbar-nav" >
					<li class="nav-item"><a class="nav-link active" href="?controlador=Index&accion=mostrar">Inicio</a></li>
                                        <li class="nav-item"><a class="nav-link" href="?controlador=Persona&accion=mostrarregistrar">Registrar Persona</a></li>
					<li class="nav-item"><a class="nav-link" href="?controlador=Persona&accion=mostrar">Mostrar Persona</a></li>
                                        <li class="nav-item"><a class="nav-link" href="?controlador=Persona&accion=mostrarListarPersonasAjax">Listar Personas Ajax</a></li>                                        
                                        <li class="nav-item"><a class="nav-link" href="?controlador=Persona&accion=mostrarBuscarPersonaCedula">Buscar Persona</a></li>    
				</ul>
			</nav>
		</header>

		<section id="contenido">
			<section id="principal">
                            
