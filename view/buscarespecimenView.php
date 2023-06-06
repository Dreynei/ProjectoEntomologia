<?php
include_once './public/header.php';
?>

<form method="post" action="?controlador=insectos&accion=buscarInsectosEG" class="d-flex col-sm-6 mt-2">
    <input name="NombreEG" class="form-control" type="text" placeholder="Buscar">
    <button id="buscarInsecto" class="btn btn-lg btn-primary" type="submit">Buscar</button>
</form>  

<?php
if (isset($vars['lista'])) {
    ?>
    <div class="container">
        <div class="table-conteiner">
            <table class="table table-striped table-light col-sm-12 mt-3">
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
                                <form action="action">
                                    <input class="form-check-input" type="checkbox" onchange="registrarCarrito(<?php echo $_SESSION['id']; ?>,<?php echo $insecto[0]; ?>);return false;" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Agregar</label>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php
                } // foreach 
                ?>
            </table>
        </div>
    </div>
    <?php
} else {
    ?>
    <div class="alert alert-info mt-2 col-sm-6" role="alert">
        Busque Insectos por nombre de especie o nombre de genero
    </div>
    <?php
}//else
?>
<?php
include_once './public/footer.php';
?>
   