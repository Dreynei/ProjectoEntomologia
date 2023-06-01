
function consultaAsincronaFamiliaJSON(orden) {
    
    var parametros = {
        "orden": orden
    };
    $.ajax(
            {
                data: parametros,
                url: '?controlador=insectos&accion=listarFamiliasAjax',
                type: 'post',
                beforeSend: function () {
                    $("#resultado").html("Procesando");
                },
                success: function (respuesta) {
                    var datos = JSON.parse(respuesta);
                    $("#reFamiliaList").empty();
                    for (var i = 0; i < datos.length; i++) {
                        $("#resultado").html("Hecho");
                        var opcion = $('<option>', {
                            
                            text: datos[i].nombre_familia
                        });
                        $("#reFamiliaList").append(opcion);
                    } // for

                }
            }
    );
} // consultaAsincrona   


function consultaAsincronaSubfamiliaJSON(familia) {
    
    var parametros = {
        "familia": familia
    };
    $.ajax(
            {
                data: parametros,
                url: '?controlador=insectos&accion=listarSubfamiliasAjax',
                type: 'post',
                beforeSend: function () {
                    $("#resultado").html("Procesando");
                },
                success: function (respuesta) {
                    var datos = JSON.parse(respuesta);
                    $("#reSubFList").empty();
                    for (var i = 0; i < datos.length; i++) {
                        $("#resultado").html("Hecho");
                        var opcion = $('<option>', {
                           
                            text: datos[i].nombre_subfamilia
                        });
                        $("#reSubFList").append(opcion);
                    } // for

                }
            }
    );
} // consultaAsincrona

function consultaAsincronaGeneroJSON(subfamilia) {
    
    var parametros = {
        "subfamilia": subfamilia
    };
    $.ajax(
            {
                data: parametros,
                url: '?controlador=insectos&accion=listarGenerosAjax',
                type: 'post',
                beforeSend: function () {
                    $("#resultado").html("Procesando");
                },
                success: function (respuesta) {
                    var datos = JSON.parse(respuesta);
                    $("#reGeneroList").empty();
                    for (var i = 0; i < datos.length; i++) {
                        $("#resultado").html("Hecho");
                        var opcion = $('<option>', {
                           
                            text: datos[i].nombre_genero
                        });
                        $("#reGeneroList").append(opcion);
                    } // for

                }
            }
    );
} // consultaAsincrona

function consultaAsincronaEspecieJSON(genero) {
    
    
    var parametros = {
        "genero": genero
    };
    $.ajax(
            {
                data: parametros,
                url: '?controlador=insectos&accion=listarEspeciesAjax',
                type: 'post',
                beforeSend: function () {
                    $("#resultado").html("Procesando");
                },
                success: function (respuesta) {
                    var datos = JSON.parse(respuesta);
                    $("#reEspecieList").empty();
                    for (var i = 0; i < datos.length; i++) {
                        $("#resultado").html("Hecho");
                        var opcion = $('<option>', {
                           
                            text: datos[i].nombre_especie
                        });
                        $("#reEspecieList").append(opcion);
                    } // for

                }
            }
    );
} // consultaAsincrona

function registrarOrden(orden) {
   
    var parametros = {
        "orden": orden
    };
    $.ajax(
            {
                data: parametros,
                url: '?controlador=insectos&accion=registrarOrden',
                type: 'post',
                beforeSend: function () {
                    $("#resultadoOrden").html("Procesando Orden");
                },
                success: function (respuesta) {
                   
                    $("#resultadoOrden").html(respuesta);
                   
                }
            }
    );
} // consultaAsincrona

function registrarFamilia(familia, orden) {
   
    var parametros = {
        "familia": familia,
        "orden": orden
    };
    $.ajax(
            {
                data: parametros,
                url: '?controlador=insectos&accion=registrarFamilia',
                type: 'post',
                beforeSend: function () {
                    $("#resultadoFamilia").html("Procesando Familia");
                },
                success: function (respuesta) {
                   
                    $("#resultadoFamilia").html(respuesta);
                   
                }
            }
    );
} // consultaAsincrona

function registrarSubfamilia(subfamilia, familia) {
   
    var parametros = {
        "subfamilia": subfamilia,
        "familia": familia
    };
    $.ajax(
            {
                data: parametros,
                url: '?controlador=insectos&accion=registrarSubfamilia',
                type: 'post',
                beforeSend: function () {
                    $("#resultadoSubfamilia").html("Procesando Subfamilia");
                },
                success: function (respuesta) {
                   
                    $("#resultadoSubfamilia").html(respuesta);
                   
                }
            }
    );
} // consultaAsincrona

function registrarGenero(genero, subfamilia) {
   
    var parametros = {
        "genero": genero,
        "subfamilia": subfamilia
    };
    $.ajax(
            {
                data: parametros,
                url: '?controlador=insectos&accion=registrarGenero',
                type: 'post',
                beforeSend: function () {
                    $("#resultadoGenero").html("Procesando Genero");
                },
                success: function (respuesta) {
                   
                    $("#resultadoGenero").html(respuesta);
                   
                }
            }
    );
} // consultaAsincrona

function registrarEspecie(especie, genero) {
   
    var parametros = {
        "especie": especie,
        "genero": genero
    };
    $.ajax(
            {
                data: parametros,
                url: '?controlador=insectos&accion=registrarEspecie',
                type: 'post',
                beforeSend: function () {
                    $("#resultadoEspecie").html("Procesando Especie");
                },
                success: function (respuesta) {
                   
                    $("#resultadoEspecie").html(respuesta);
                   
                }
            }
    );
} // consultaAsincrona

function abrirModalOrden(){
    
    $('#modalOrden').modal('show');
    
}

function abrirModalFamilia(){
    
    $('#modalFamilia').modal('show');
    
}

function abrirModalSubfamilia(){
    
    $('#modalSubfamilia').modal('show');
    
}

function abrirModalGenero(){
    
    $('#modalGenero').modal('show');
     
}

function abrirModalEspecie(){
    
    $('#modalEspecie').modal('show');
     
}

function cerrarModalOrden(){
    
    $('#modalOrden').modal('hide');
}

function cerrarModalFamilia(){
    
    $('#modalFamilia').modal('hide');
}

function cerrarModalSubfamilia(){
    
    $('#modalSubfamilia').modal('hide');
}

function cerrarModalGenero(){
    
    $('#modalGenero').modal('hide');
}

function cerrarModalEspecie(){
    
    $('#modalEspecie').modal('hide');
}


