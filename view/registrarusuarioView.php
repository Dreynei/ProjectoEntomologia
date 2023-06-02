<?php
include_once './public/header.php';
?>

 //<?php
//    if (!empty($vars['mensaje'])) {
//       $mensaje = $vars['mensaje'][0];
//       echo "<div class='alert alert-dark text-center' role='alert'>" . $mensaje . "</div>";
//    }
//    ?>

<div id="contenedoRregistarAdmins" class="container d-flex align-items-center justify-content-center ">         
    <form method="POST" id="" class="bg-dark" action="?controlador=Usuario&accion=registrarUsuario">

                <h1 class="m-3 h3 fw-normal text-light">Registro usuario</h1>

                <div class="m-3 form-floating">
                    <input type="text" name="usuario" class="form-control" id="floatingInput" placeholder="text"/>
                    <label for="floatingInput">Nombre de usuario</label>
                </div>
             
                <div class="m-3 form-floating">
                    <input type="password" name="contrasenna" class="form-control" id="floatingPassword" placeholder="password">
                    <label for="floatingPassword">Contraseña</label>
                </div>
                <div class="m-3 form-floating">
                    <input type="password" class="form-control" id="floatingPassword2" placeholder="password">
                    <label for="floatingPassword2">Confirmar contraseña</label>
                </div>
               
                <div class="m-3 form-floating">
                    
                    <select name="tipo" class="form-select">
                        
                        <?php
                        foreach ($vars['lista'] as $tipo) {
                            ?>

                            <option><?php echo $tipo[0]; ?></option>


                            <?php
                        }//foreach
                        ?> 

                    </select>
                    <label for="form-select">Tipos usuario</label>
                </div>

                <button class="m-3 btn btn-lg btn-primary" type="submit">Registrar</button>
               
            </form>
        </div>

                

<?php
include_once './public/footer.php';
?>