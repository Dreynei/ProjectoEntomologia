<?php
include_once './public/header.php';
?>

<form method="post" action="?controlador=insectos&accion=buscarInsectosEG" class="d-flex col-6 mt-2">
    <input name="NombreEG" class="form-control" type="text" placeholder="Buscar">
    <button id="buscarInsecto" class="btn btn-lg btn-primary" type="submit">Buscar</button>
</form>  

<?php
if (isset($vars['lista'])) {
    ?>
    <div class="container">
        <table class="table table-striped table-light mt-3 col-2">
            <tr>
                <th>Especie</th>
                <th>Genero</th>
                <th>Subfamilia</th>
                <th>Familia</th>
                <th>Orden</th>
                <th>Busquedas</th>
            </tr>


            <?php
            foreach ($vars['lista'] as $insecto) {
                ?>
                <tr>
                    <td><?php echo $insecto[1]; ?></td>
                    <td><?php echo $insecto[2]; ?></td>
                    <td><?php echo $insecto[3]; ?></td>
                    <td><?php echo $insecto[4]; ?></td>
                    <td><?php echo $insecto[5]; ?></td>
                    <td><div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Agregar</label>
                        </div></td>
                </tr>
                <?php
            } // foreach 
            ?>
        </table>
    </div>
    <?php
} else {
    ?>
    <div class="alert alert-info mt-2 col-6" role="alert">
        Busque Insectos por nombre de orden
    </div>
    <?php
}//else
?>
<?php
include_once './public/footer.php';
