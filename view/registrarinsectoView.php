<?php
include_once './public/header.php';
?>

 <?php
    if (!empty($vars['mensaje'])) {
       $mensaje = $vars['mensaje'][0];
       echo "<div class='alert alert-dark text-center' role='alert'>" . $mensaje . "</div>";
    }
    ?>
<!--<div class="container"></div>-->
<div class="container d-flex align-items-center justify-content-center w-100 mt-5  mb-5">
    <form class="bg-dark w-75 rounded-4" method="POST" action="?controlador=insectos&accion=registrarInsecto" enctype="multipart/form-data">

        <h1 class="m-3 h3 fw-normal text-light">Registro nuevo insecto</h1>

        <div class="row mb-2 m-1">
            <h3 class="m-3 h3 fw-normal text-light">Informacion insecto</h3>
            <div class="col col-10">
                <input name="orden" class="form-control" list="reOrdenList" id="reOrden" oninput="consultaAsincronaFamiliaJSON($('#reOrden').val());return false;" placeholder="Tipea para buscar orden..." required>
                <datalist name="listOrden" id="reOrdenList">
                   <?php
                        foreach ($vars['lista'] as $orden) {
                            ?>

                            <option><?php echo $orden[0]; ?></option>


                            <?php
                        }//foreach
                        ?> 
                </datalist>
            </div>
           
            <div class="col col-1">
                <input id="b" type="button" value="+" onclick="abrirModalOrden()" class="form-control d-flex justify-content-center align-items-center">
            </div>
           
        </div>

        <div class="row mb-2 m-1">
            <div class="col col-10">
                <input class="form-control" name="familia" autocomplete="off" list="reFamiliaList" id="reFamilia" oninput="consultaAsincronaSubfamiliaJSON($('#reFamilia').val());return false;" placeholder="Tipea para buscar familia..." required>
                <datalist id="reFamiliaList">
                   
                </datalist>
            </div>
            <div class="col col-1">
                <input id="b" type="button" value="+" onclick="abrirModalFamilia()" class="form-control d-flex justify-content-center align-items-center">
            </div>
        </div>

        <div class="row mb-2 m-1">
            <div class="col col-10">
                <input class="form-control" list="reSubFList" id="reSubF" oninput="consultaAsincronaGeneroJSON($('#reSubF').val());return false;" placeholder="Tipea para buscar subfamilia...">
                <datalist id="reSubFList">
                   
                </datalist>
            </div>
            <div class="col col-1">
                <input id="b" type="button" value="+" onclick="abrirModalSubfamilia()" class="form-control d-flex justify-content-center align-items-center">
            </div>
        </div>

        <div class="row mb-2 m-1">
            <div class="col col-10">
                <input name="genero" class="form-control" list="reGeneroList" id="reGenero" oninput="consultaAsincronaEspecieJSON($('#reGenero').val());return false;"  placeholder="Tipea para buscar genero...">
                <datalist id="reGeneroList">
                   
                </datalist>
            </div>
            <div class="col col-1">
                <input id="b" type="button" value="+" onclick="abrirModalGenero()" class="form-control d-flex justify-content-center align-items-center">
            </div>
        </div>
 
        <div class="row mb-2 m-1">
            <div class="col col-10">
                <input name="especie" class="form-control" list="reEspecieList" id="reEspecie" placeholder="Tipea para buscar especie...">
                <datalist id="reEspecieList">
                    
                </datalist>
            </div>
            <div class="col col-1">
                <input id="b" type="button" value="+" onclick="abrirModalEspecie()" class="form-control d-flex justify-content-center align-items-center">
            </div>
        </div>
            
        <div class="form-label text-light d-flex justify-content-center align-items-center">
            <span id="resultado">Esperando prediccion
            </span>
        </div>
        
        <h1 class="m-3 h3 fw-normal text-light">Imagen Insecto</h1>
        <div class="row mb-2 m-1">
        <div class="col col-10">
        
            
            <input type="file" class="form-control d-flex justify-content-center align-items-center" id="imagen" name="imagen" accept="image/*" placeholder="Buscar Imagen" value="Buscar" required>
        
        </div>
        </div>
        
        <h1 class="m-3 h3 fw-normal text-light">Almacen del insecto</h1>
        

        <div class="row mb-2 m-1">
            <div class="col col-10 mb-2">
                <select id="almacen" name="almacen" onchange="accionAlmacen($('#almacen').val());return false;" class="form-select" required>
                    <option>Seleccione un almacen</option>
                    <?php
                    foreach ($vars['almacen'] as $almacen) {
                        ?>

                        <option><?php echo $almacen[0]; ?></option>


                        <?php
                    }//foreach
                    ?> 

                </select>
                
            </div>
            <div class="col col-1">
                <input id="b" type="button" value="+" onclick="abrirModalAlmacen()" class="form-control d-flex justify-content-center align-items-center">
            </div>
            
            
              <div class="col col-4 mb-2 form-floating">
                  <select id="gabineteOCaja" name="gabineteOCaja" onchange="listarGabetasOV($('#almacen').val(),$('#gabineteOCaja').val());return false;" class="form-select pb-1">
                    
                   
                </select>
                  <label id="labelGabineteOC" for="form-select" class="m-1 text-dark">Gabinete o Caja</label>
              </div>
            
             <div class="col col-1">
                <input id="b" type="button" value="+" onclick="abrirModalGabineteOC()" class="form-control d-flex justify-content-center align-items-center">
            </div>
                
                <div class="col col-4 mb-2 form-floating">
                <select id="gavetaOVial" name="gavetaOVial" class="form-select pb-1">
                    
                   
                </select>
                    <label id="labelGavetaOV" for="form-select" class="m-1 text-dark" >Gaveta o Vial</label>
              </div>
                
             <div class="col col-1">
                <input id="b" type="button" value="+" onclick="abrirModalGavetaOV()" class="form-control d-flex justify-content-center align-items-center">
            </div>
            
        </div>

        
        <div class="row mb-2 m-1">
            <h3 class="m-3 h3 fw-normal text-light">Ubicacion de recoleccion</h3>
            <div class="col col-10 mb-2">
                <input name="recolector" id="recolector" type="text" class="form-control" id="floatingInput" placeholder="Recolector ej. (S.Monge)">
                
            </div>
            
            <div class="col col-10 mb-2">
                <input name="pais" id="pais" type="text" class="form-control" id="floatingInput" placeholder="Pais">
               
            </div>
            <div class="col col-10 mb-2">
                <input name="provincia" id="provincia" type="text" class="form-control" id="floatingInput" placeholder="Provincia">
                
            </div>
            <div class="col col-10 mb-2">
                <input name="canton" id="canton" type="text" class="form-control" id="floatingInput" placeholder="Cantón">
                
            </div>
            <div class="col col-10 mb-2">
                <input name="distrito" id="distrito" type="text" class="form-control" id="floatingInput" placeholder="Distrito">
               
            </div>
            
            <div class="col col-10 mb-2">
                <input name="fecha" id="fecha" type="date" class="form-control datepicker" oninput="imprimirFecha($('#fecha').val());return false;" placeholder="Selecciona una fecha">

               
            </div>
            
        </div>
        <button class="m-3 btn btn-lg btn-primary" type="submit">Registrar</button>

    </form>
</div>

    <!-- Modal Registro orden -->
<div class="modal fade" id="modalOrden" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark text-light">
        <h5 class="modal-title" id="ModalLabel">Registrar orden</h5>
        
      </div>
       <form method="POST" action="?controlador=insectos&accion=registrarOrden">
      <div class="modal-body">
        
        <div class="col col-10">
            <input name="orden" id="nuevoOrden" type="text" class="form-control" id="floatingInput" placeholder="Orden">
        </div>
          
        
          <span class="m-3 form-label text-center" id="resultadoOrden">Esperando Orden
            </span>
        
          
      </div>
       
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Registrar</button>
          <button type="button" onclick="cerrarModalOrden()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
         
      </div>
          </form>  
           
    </div>
  </div>
</div>
    
    <!-- Modal Registro Familia -->
<div class="modal fade" id="modalFamilia" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark text-light">
        <h5 class="modal-title" id="ModalLabel">Registrar familia</h5>
        
      </div>
      <div class="modal-body">
        
        
        <div class="col col-10 mt-2">
            <input name="nuevaFamilia" id="nuevaFamilia" type="text" class="form-control" id="floatingInput" placeholder="Familia">
        </div>
        
          <span class="m-3 form-label text-center" id="resultadoFamilia">Esperando Familia
            </span>
        
          
      </div>
      <div class="modal-footer">
          <button type="button" onclick="registrarFamilia($('#nuevaFamilia').val(),$('#reOrden').val());return false;" class="btn btn-primary">Registrar</button>
          <button type="button" onclick="cerrarModalFamilia()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          
      </div>
    </div>
  </div>
</div>
    
 <!-- Modal Registro Subfamilia -->
<div class="modal fade" id="modalSubfamilia" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark text-light">
        <h5 class="modal-title" id="ModalLabel">Registrar subfamilia</h5>
        
      </div>
      <div class="modal-body">
        
        
        <div class="col col-10 mt-2">
            <input name="nuevaSubfamilia" id="nuevaSubfamilia" type="text" class="form-control" id="floatingInput" placeholder="Subfamilia">
        </div>
        
          <span class="m-3 form-label text-center" id="resultadoSubfamilia">Esperando Subfamilia
            </span>
        
          
      </div>
      <div class="modal-footer">
          <button type="button" onclick="registrarSubfamilia($('#nuevaSubfamilia').val(),$('#reFamilia').val());return false;" class="btn btn-primary">Registrar</button>
          <button type="button" onclick="cerrarModalSubfamilia()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          
      </div>
    </div>
  </div>
</div>

 <!-- Modal Registro Genero -->
<div class="modal fade" id="modalGenero" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark text-light">
        <h5 class="modal-title" id="ModalLabel">Registrar Genero</h5>
        
      </div>
      <div class="modal-body">
        
        
        <div class="col col-10 mt-2">
            <input name="nuevoGenero" id="nuevoGenero" type="text" class="form-control" id="floatingInput" placeholder="Genero">
        </div>
        
          <span class="m-3 form-label text-center" id="resultadoGenero">Esperando Genero
            </span>
        
          
      </div>
      <div class="modal-footer">
          <button type="button" onclick="registrarGenero($('#nuevoGenero').val(),$('#reSubF').val());return false;" class="btn btn-primary">Registrar</button>
          <button type="button" onclick="cerrarModalGenero()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          
      </div>
    </div>
  </div>
</div>
 
 
 <!-- Modal Registro Especie -->
<div class="modal fade" id="modalEspecie" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark text-light">
        <h5 class="modal-title" id="ModalLabel">Registrar Especie</h5>
        
      </div>
      <div class="modal-body">
        
        
        <div class="col col-10 mt-2">
            <input name="nuevaEspecie" id="nuevaEspecie" type="text" class="form-control" id="floatingInput" placeholder="Especie">
        </div>
        
          <span class="m-3 form-label text-center" id="resultadoEspecie">Esperando Especie
            </span>
        
          
      </div>
      <div class="modal-footer">
          <button type="button" onclick="registrarEspecie($('#nuevaEspecie').val(),$('#reGenero').val());return false;" class="btn btn-primary">Registrar</button>
          <button type="button" onclick="cerrarModalEspecie()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          
      </div>
    </div>
  </div>
</div>
 
<!-- Modal Registro Almacen -->
<div class="modal fade" id="modalAlmacen" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark text-light">
        <h5 class="modal-title" id="ModalLabel">Registrar Almacen</h5>
        
      </div>
      <div class="modal-body">
        
        
        <div class="col col-10 mt-2">
            <input name="nuevoAlmacen" id="nuevoAlmacen" type="text" class="form-control" id="floatingInput" placeholder="Almacen">
        </div>
        
          <span class="m-3 form-label text-center" id="resultadoAlmacen">Esperando Almacen
            </span>
        
          
      </div>
      <div class="modal-footer">
          <button type="button" onclick="registrarAlmacen($('#nuevoAlmacen').val());return false;" class="btn btn-primary">Registrar</button>
          <button type="button" onclick="cerrarModalAlmacen()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          
      </div>
    </div>
  </div>
</div>
 
  <!-- Modal Registro Gabinete o Caja -->
<div class="modal fade" id="modalGabineteOC" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark text-light">
        <h5 class="modal-title" id="tituloGabineteOC">Registrar Gabinete o Caja</h5>
        
      </div>
      <div class="modal-body">
        
        
        <div class="col col-10 mt-2">
            <input name="nuevoGabineteOC" id="nuevoGabineteOC" type="text" class="form-control" id="floatingInput">
        </div>
        
          <span class="m-3 form-label text-center" id="resultadoGabineteOC">Esperando Gabinete o Caja
            </span>
        
          
      </div>
      <div class="modal-footer">
          <button type="button" onclick="registrarGabineteOC($('#nuevoGabineteOC').val(), $('#almacen').val());return false;" class="btn btn-primary">Registrar</button>
          <button type="button" onclick="cerrarModalGabineteOC()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          
      </div>
    </div>
  </div>
</div>
 
 <!-- Modal Registro Gaveta o Vial -->
<div class="modal fade" id="modalGavetaOV" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark text-light">
        <h5 class="modal-title" id="tituloGavetaOV">Registrar Gaveta o Vial</h5>
        
      </div>
      <div class="modal-body">
        
        
        <div class="col col-10 mt-2">
            <input name="nuevaGavetaOV" id="nuevaGavetaOV" type="text" class="form-control" id="floatingInput">
        </div>
        
          <span class="m-3 form-label text-center" id="resultadoGavetaOV">Esperando Gaveta o Vial
            </span>
        
          
      </div>
      <div class="modal-footer">
          <button type="button" onclick="registrarGavetaOV($('#gabineteOCaja').val(), $('#nuevaGavetaOV').val(), $('#almacen').val());return false;" class="btn btn-primary">Registrar</button>
          <button type="button" onclick="cerrarModalGavetaOV()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          
      </div>
    </div>
  </div>
</div>  
  
  
  
 
<?php
include_once './public/footer.php';
?>
