<?php
include_once './public/header.php';
?>

<div class=" mt-3 d-flex align-items-center justify-content-center">

    <?php if (isset($vars['lista'])) {

        foreach ($vars['lista'] as $carrito) {
            ?>
            <div class="col-3 m-1">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    <div class="card-body">
                        <p class="card-text">Clasificación:</p>
                        <p class="card-text">Orden: <?php echo $carrito[1];?> </p>
                        <p class="card-text">Familia: <?php echo $carrito[2];?> </p>
                        <p class="card-text">Subfamilia: <?parrito[3];?> </p>
                        <p class="card-text">Genero: <?php echo $carrito[4];?> </p>
                        <p class="card-text">Especie: <?php echo $carrito[5];?> </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Ver especimen</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                            </div>
                            <small class="text-body-secondary">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>
    <?php }
} ?>
</div>




<?php
include_once './public/footer.php';
?>

