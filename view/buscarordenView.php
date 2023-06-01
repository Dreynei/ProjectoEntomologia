<?php
include_once './public/header.php';
?>

<form method="post" action="?controlador=insectos&accion=buscarInsectoFamilia" class="d-flex col-6 mt-2">
    <input name="NombreO" class="form-control" type="text" placeholder="Buscar orden">
    <button id="buscarInsecto" class="btn btn-lg btn-primary" type="submit">Buscar</button>
</form>  

<?php
if (isset($vars['lista'])) {
    ?>
    <div class="container col-6">
        <table class="table table-striped table-light mt-3 col-1">
            <tr>
                <th>Orden</th>
                <th>Cantidad de familias</th>
                <th>Familias asociadas</th>
            </tr>


            <?php
            foreach ($vars['lista'] as $insecto) {
                $url = $insecto
                ?>
                <tr>
                    <td><?php echo $insecto[1]; ?></td>
                    <td class="text-center"><?php echo $insecto[2]; ?></td>
                    <td class="d-flex justify-content-center align-content-center">
                        <form action="?controlador=insectos&accion=buscarFamiliaRelacion" method="post">
                            <input type="hidden" value="<?php echo $insecto[0]; ?>" name="id">
                            <button type="submit" class="btn btn-primary">Ver</button>
                        </form>
                    </td>
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
