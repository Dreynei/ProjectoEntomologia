<?php
include_once './public/header.php';
?>

<div class="conteiner">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-4 bg-dark mt-3">
            <span class="bg-info-subtle px-2">Registro de Cultivos</span>
            <?php
            if (isset($vars['mensaje'])) {
                $mensaje = $vars['mensaje'][0];
                echo "<div class='alert alert-dark text-center' role='alert' mt-2>" . $mensaje . "</div>";
            }
            ?>
            <form action="?controlador=Cultivo&accion=registrarCultivo" method="POST">
                <input name="cultivoN" class="form-control mt-2 mb-2 p-2" type="text" placeholder="Ingrese nombre de Cultivo">
                <button class="btn btn-lg btn-primary mb-2" type="submit">Registrar</button>
            </form>
        </div>
        <div class="col-2"></div>
        <div class="col-3">
            <form action="" method="POST" class="mb-2">
                <input name="cultivoN" class="form-control" type="text" placeholder="Ingrese nombre de Cultivo">
                <button class="btn btn-lg btn-primary mb-2" type="">Registrar</button>
            </form>
        </div>
        <div class="col-2"></div>
    </div>

</div>

<?php
include_once './public/footer.php';
?>
