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
        <div class="col-3 bg-dark mt-3">
            <form action="?controlador=Cultivo&accion=registrarGeneroCultivo" method="POST">
                <span class="bg-info-subtle px-2 mb-2">Asignar cultivos a generos</span>
                <?php
                if (isset($vars['mensaje1'])) {
                    $mensaje1 = $vars['mensaje1'][0];
                    echo "<div class='alert alert-dark text-center' role='alert' mt-2>" . $mensaje1 . "</div>";
                }
                ?>
                <input name="id_genero" class="form-control mb-2" list="regeneroList" id="regenero" placeholder="Tipea para buscar genero..." required>
                <datalist id="regeneroList">
                    <?php
                    foreach ($vars['genero'] as $genero) {
                        ?>

                    <option ><input type="hidden" name="genero_id" id="genero_id" value="<?php echo $genero[0]; ?>"><?php echo $genero[1]; ?></option>


                        <?php
                    }//foreach
                    ?> 
                </datalist>

                <input name="id_cultivo" class="form-control mb-2" list="reOrdenList" id="reOrden" placeholder="Tipea para buscar orden..." required>
                <datalist id="reOrdenList">
                    <?php
                    foreach ($vars['cultivo'] as $cultivo) {
                        ?>

                        <option "><input type="hidden" name="cultivo_id" id="cultivo_id" value="<?php echo $genero[0]; ?>"><?php echo $cultivo[1]; ?></option>


                        <?php
                    }//foreach
                    ?> 
                </datalist>
                <button class="btn btn-lg btn-primary mb-2" type="submit">Asignar</button>
            </form>
        </div>
        <div class="col-2"></div>
    </div>

</div>

<?php
include_once './public/footer.php';
?>
