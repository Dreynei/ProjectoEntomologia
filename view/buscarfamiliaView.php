<?php
include_once './public/header.php';
?>

<form method="post" action="?controlador=insectos&accion=buscarInsectoFamilia" class="d-flex col-6 mt-2">
    <input name="NombreF" class="form-control" type="text" placeholder="Buscar familia">
    <button id="buscarInsecto" class="btn btn-lg btn-primary" type="submit">Buscar</button>
</form>  

<?php
if (isset($vars['lista'])) {
    ?>
    <div class="container col-6">
        <table class="table table-striped table-light mt-3 col-1">
            <tr>
                <th>Familia</th>
                <th>Cantidad de subfamilias</th>
                <th>Subfamilias asociadas</th>
            </tr>


            <?php
            foreach ($vars['lista'] as $insecto) {
                ?>
                <tr>
                    <td><?php echo $insecto[1]; ?></td>
                    <td class="text-center"><?php echo $insecto[2]; ?></td>
                    <td class="d-flex justify-content-center align-content-center">
                        <form action="?controlador=insectos&accion=buscarsubFamiliaRelacion" method="post">
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
        Busque Insectos por nombre de Familia
    </div>
    <?php
}//else
?>
<?php
include_once './public/footer.php';

