
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
                   
                    if(respuesta.trim() === "Registrado correctamente"){
                     
                        var datalist = document.getElementById('reFamiliaList');
                        var option =  document.createElement('option');
                        option.text = familia;
                        
                        datalist.appendChild(option);
                    }
                                     
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
                   
                   if(respuesta.trim() === "Registrado correctamente"){
                     
                        var datalist = document.getElementById('reSubFList');
                        var option =  document.createElement('option');
                        option.text = subfamilia;
                        
                        datalist.appendChild(option);
                    }
                   
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
                   
                   if(respuesta.trim() === "Registrado correctamente"){
                     
                        var datalist = document.getElementById('reGeneroList');
                        var option =  document.createElement('option');
                        option.text = genero;
                        
                        datalist.appendChild(option);
                    }
                   
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
                   
                   if(respuesta.trim() === "Registrado correctamente"){
                     
                        var datalist = document.getElementById('reEspecieList');
                        var option =  document.createElement('option');
                        option.text = especie;
                        
                        datalist.appendChild(option);
                    }
                   
                    $("#resultadoEspecie").html(respuesta);
                   
                }
            }
    );
} // consultaAsincrona

function registrarCarrito(id_usuario,id_especimen){
    console.log(id_usuario+" "+id_especimen);
    
    
     var parametros = {
        "id_usuario": id_usuario,
        "id_especimen": id_especimen
    };
    $.ajax(
            {
                data: parametros,
                url: '?controlador=carrito&accion=registrarInsectoCarrito',
                type: 'post',
                beforeSend: function () {
                    //$("#resultadoEspecie").html("Procesando Especie");
                },
                success: function (respuesta) {
                   
                   alert(respuesta);
                    //$("#resultadoEspecie").html(respuesta);
                   
                }
            }
    );
}

function accionAlmacen(almacen){
    
    //alert(almacen);
    
    if(almacen === "Gabinete"){
        var etiquetaGabinete = document.getElementById('labelGabineteOC');
        etiquetaGabinete.textContent = "Gabinete";
        
        var etiquetaGabeta = document.getElementById('labelGabetaOV');
        etiquetaGabeta.textContent = "Gabeta";
        
        return;
    }
    
    if(almacen.trim() === "Caja"){
        var etiquetaCaja = document.getElementById('labelGabineteOC');
        etiquetaCaja.textContent = "Caja";
        
        var etiquetaGabeta = document.getElementById('labelGabetaOV');
        etiquetaGabeta.textContent = "Vial";
          
        return;
    }
    
}

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


