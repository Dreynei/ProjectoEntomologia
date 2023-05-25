<?php
include_once './public/header.php';
?>

<div id="contenedoRregistarAdmins" class="container d-flex align-items-center justify-content-center ">         
            <form id="" class="bg-dark">

                <h1 class="m-3 h3 fw-normal text-light">Registro usuario administrador</h1>

                <div class="m-3 form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="text">
                    <label for="floatingInput">Nombre de usuario</label>
                </div>
                <div class="m-3 form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="password">
                    <label for="floatingPassword">Contraseña</label>
                </div>
                <div class="m-3 form-floating">
                    <input type="password" class="form-control" id="floatingPassword2" placeholder="password">
                    <label for="floatingPassword2">Confirmar contraseña</label>
                </div>
                <button class="m-3 btn btn-lg btn-primary" type="submit">Registrar</button>
               


            </form >
        </div>





<?php
include_once './public/footer.php';
?>