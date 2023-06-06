
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
                    $("#resultado").html("Procesando Familia");
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
                    $("#resultado").html("Procesando Subfamilia");
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
                    $("#resultado").html("Procesando Genero");
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
                    $("#resultado").html("Procesando Especie");
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

function registrarAlmacen(almacen){
    
    var parametros = {
        "almacen": almacen
    };
    $.ajax(
            {
                data: parametros,
                url: '?controlador=insectos&accion=registrarAlmacen',
                type: 'post',
                beforeSend: function () {
                    $("#resultadoAlmacen").html("Procesando Almacen");
                },
                success: function (respuesta) {
                    
                     if(respuesta.trim() === "Registrado correctamente"){
                     
                        var select = document.getElementById('almacen');
                        var option =  document.createElement('option');
                        option.text = almacen;
                        
                        select.appendChild(option);
                    }
                    
                
                    $("#resultadoAlmacen").html(respuesta);
                    $("#nuevoAlmacen").val("");
                }
            }
    );
    
}

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
                },
                success: function (respuesta) {
                   
                }
            }
    );
}

function accionAlmacen(almacen){
    
   
    
    if(almacen === "Gabinete"){
        //cuando se abra el modal
        var tituloGabineteOC = document.getElementById('tituloGabineteOC');
        tituloGabineteOC.textContent = "Registrar Gabinete";
        
        var tituloGavetaOV = document.getElementById('tituloGavetaOV');
        tituloGavetaOV.textContent = "Registrar Gaveta";
        
        var esperaGabineteOC = document.getElementById('resultadoGabineteOC');
        esperaGabineteOC.textContent = "Esperando Gabinete";
        
        var esperaGavetaOV = document.getElementById('resultadoGavetaOV');
        esperaGavetaOV.textContent = "Esperando Gaveta";
        
        var etiquetaGabinete = document.getElementById('labelGabineteOC');
        etiquetaGabinete.textContent = "Gabinete";
        
        var etiquetaGabeta = document.getElementById('labelGavetaOV');
        etiquetaGabeta.textContent = "Gaveta";
        
        /*
         * Traer todos los gabinetes
         */
        
    $.ajax(
            {
               
                url: '?controlador=insectos&accion=listarGabinetes',
                type: 'post',
                beforeSend: function () {
                    //$("#resultadoEspecie").html("Procesando Especie");
                },
                success: function (respuesta) {
                   
                    var datos = JSON.parse(respuesta);
                    $("#gabineteOCaja").empty();
                    
                     var opcion = $('<option>', {
                           
                            text: "Seleccione Gabinete"
                        });
                        $("#gabineteOCaja").append(opcion);
                    for (var i = 0; i < datos.length; i++) {
                        
                        var opcion = $('<option>', {
                           
                            text: datos[i].id_gabinete
                        });
                        $("#gabineteOCaja").append(opcion);
                    } // for
                   
                }
            }
    );
        
        return;
    }
    
    else if(almacen.trim() === "Caja"){
        
        var tituloGabineteOC = document.getElementById('tituloGabineteOC');
        tituloGabineteOC.textContent = "Registrar Caja";
        
        var tituloGavetaOV = document.getElementById('tituloGavetaOV');
        tituloGavetaOV.textContent = "Registrar Vial";
        
        var esperaGabineteOC = document.getElementById('resultadoGabineteOC');
        esperaGabineteOC.textContent = "Esperando Caja";
        
        var esperaGavetaOV = document.getElementById('resultadoGavetaOV');
        esperaGavetaOV.textContent = "Esperando Vial";
        
        var etiquetaCaja = document.getElementById('labelGabineteOC');
        etiquetaCaja.textContent = "Caja";
        
        var etiquetaVial = document.getElementById('labelGavetaOV');
        etiquetaVial.textContent = "Vial";
          
        $.ajax(
            {
               
                url: '?controlador=insectos&accion=listarCajas',
                type: 'post',
                beforeSend: function () {
                    //$("#resultadoEspecie").html("Procesando Especie");
                },
                success: function (respuesta) {
                   
                    var datos = JSON.parse(respuesta);
                    $("#gabineteOCaja").empty();
                    
                     var opcion = $('<option>', {
                           
                            text: "Seleccione Caja"
                        });
                        $("#gabineteOCaja").append(opcion);
                    for (var i = 0; i < datos.length; i++) {
                        
                        var opcion = $('<option>', {
                           
                            text: datos[i].id_caja
                        });
                        $("#gabineteOCaja").append(opcion);
                    } // for
                   
                }
            }
    );  
          
          
        return;
    }
    else{
        
        var tituloGabineteOC = document.getElementById('tituloGabineteOC');
        tituloGabineteOC.textContent = "INDEFINIDO";
        
        var tituloGavetaOV = document.getElementById('tituloGavetaOV');
        tituloGavetaOV.textContent = "INDEFINIDO";
        
        var esperaGabineteOC = document.getElementById('resultadoGabineteOC');
        esperaGabineteOC.textContent = "INDEFINIDO";
        
        var esperaGavetaOV = document.getElementById('resultadoGavetaOV');
        esperaGavetaOV.textContent = "INDEFINIDO";
        
        $("#gavetaOVial").empty();
        $("#gabineteOCaja").empty();
        
        var etiquetaGabineteOC = document.getElementById('labelGabineteOC');
        etiquetaGabineteOC.textContent = "INDEFINIDO";
        
        var etiquetaGabetaOV = document.getElementById('labelGavetaOV');
        etiquetaGabetaOV.textContent = "INDEFINIDO";
        
    }
    
}

function listarGabetasOV(almacen, gabineteOC){
   
     var parametros = {
        "almacen": almacen,
        "gabineteOC": gabineteOC
    };
    $.ajax(
            {
                data: parametros,
                url: '?controlador=insectos&accion=listarGabetasOV',
                type: 'post',
                beforeSend: function () {
                    //$("#resultadoEspecie").html("Procesando Especie");
                },
                success: function (respuesta) {
                   
                   //alert("Respuesta"+respuesta);
                   
                    var datos = JSON.parse(respuesta);
                    $("#gavetaOVial").empty();
                    
                    if(almacen.trim() === "Gabinete"){
                    for (var i = 0; i < datos.length; i++) {

                        var opcion = $('<option>', {

                            text: datos[i].id_gabeta
                        });
                        $("#gavetaOVial").append(opcion);
                    } // for
                }
                
                if(almacen.trim() === "Caja"){
                    
                    for (var i = 0; i < datos.length; i++) {

                        var opcion = $('<option>', {

                            text: datos[i].id_vial
                        });
                        $("#gavetaOVial").append(opcion);
                    } // for
                }
                
                }
            }
    );
    
}

function registrarGabineteOC(gabineteOC, almacen){
    
    if(almacen === "Gabinete"){
        
        var parametros = {
        "idGabinete": gabineteOC
    };
    $.ajax(
            {
                data: parametros,
                url: '?controlador=insectos&accion=registrarGabinete',
                type: 'post',
                beforeSend: function () {
                    $("#resultadoGabineteOC").html("Procesando Gabinete");
                },
                success: function (respuesta) {
                  
                    if(respuesta.trim() === "Registrado correctamente"){
                     
                        var select = document.getElementById('gabineteOCaja');
                        var option =  document.createElement('option');
                        option.text = gabineteOC;
                        
                        select.appendChild(option);
                    }
                    
                  
                    $("#resultadoGabineteOC").html(respuesta);
                   
                }
            }
    );
        
    }
    
    if(almacen === "Caja"){
        
         var parametros = {
        "idCaja": gabineteOC
    };
    $.ajax(
            {
                data: parametros,
                url: '?controlador=insectos&accion=registrarCaja',
                type: 'post',
                beforeSend: function () {
                    $("#resultadoGabineteOC").html("Procesando Caja");
                },
                success: function (respuesta) {
                  
                    if(respuesta.trim() === "Registrado correctamente"){
                     
                        var select = document.getElementById('gabineteOCaja');
                        var option =  document.createElement('option');
                        option.text = gabineteOC;
                        
                        select.appendChild(option);
                    }
                    
                  
                    $("#resultadoGabineteOC").html(respuesta);
                   
                }
            }
    );
        
    }
    
}

function registrarGavetaOV(gabineteOC, gavetaOV, almacen){
    
    if(almacen === "Gabinete"){
        
        var parametros = {
        "idGabinete": gabineteOC
        ,"idGaveta": gavetaOV
    };
    $.ajax(
            {
                data: parametros,
                url: '?controlador=insectos&accion=registrarGaveta',
                type: 'post',
                beforeSend: function () {
                    $("#resultadoGavetaOV").html("Procesando Gaveta");
                },
                success: function (respuesta) {
                  
                    if(respuesta.trim() === "Registrado correctamente"){
                     
                        var select = document.getElementById('gavetaOVial');
                        var option =  document.createElement('option');
                        option.text = gavetaOV;
                        
                        select.appendChild(option);
                    }
                    
                  
                    $("#resultadoGavetaOV").html(respuesta);
                   
                }
            }
    );
        
    }
    
    if(almacen === "Caja"){
        
        var parametros = {
        "idCaja": gabineteOC
        ,"idVial": gavetaOV
    };
    $.ajax(
            {
                data: parametros,
                url: '?controlador=insectos&accion=registrarVial',
                type: 'post',
                beforeSend: function () {
                    $("#resultadoGavetaOV").html("Procesando Vial");
                },
                success: function (respuesta) {
                  
                    if(respuesta.trim() === "Registrado correctamente"){
                     
                        var select = document.getElementById('gavetaOVial');
                        var option =  document.createElement('option');
                        option.text = gavetaOV;
                        
                        select.appendChild(option);
                    }
                    
                  
                    $("#resultadoGavetaOV").html(respuesta);
                   
                }
            }
    );
        
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

function abrirModalAlmacen(){
    
    $('#modalAlmacen').modal('show');
     
}

function abrirModalGabineteOC(){
   
      $('#modalGabineteOC').modal('show');
     
}

function abrirModalGavetaOV(){
    
   $('#modalGavetaOV').modal('show');
    
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

function cerrarModalAlmacen(){
    
    $('#modalAlmacen').modal('hide');
}

function cerrarModalGabineteOC(){
    
    $('#modalGabineteOC').modal('hide');
    
}

function cerrarModalGavetaOV(){
    
    $('#modalGavetaOV').modal('hide');
    
}