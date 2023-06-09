<?php
include_once './public/header.php';
?>

<div class="container col-8 align-items-center">

    <div class="row row-cols-10">
        <?php
        if (isset($vars['lista'])) {

            foreach ($vars['lista'] as $carrito) {

                $imageDataEncoded = base64_encode($carrito[6]);
                $imageSrc = 'data:' . $carrito[7] . ';base64,' . $imageDataEncoded;
                ?>

                <div class="col-4 mb-4">
                    <div class="card shadow-sm col col-12 align-items-center">

                        <img src="<?php echo $imageSrc; ?>" class="card-img-top" alt="Imagen de la carta">

                        <div class="card-body">
                            <p class="card-text">Clasificación:</p>
                            <p class="card-text">Orden: <?php echo $carrito[1]; ?> </p>
                            <p class="card-text">Familia: <?php echo $carrito[2]; ?> </p>
                            <p class="card-text">Subfamilia: <?php echo $carrito[3]; ?> </p>
                            <p class="card-text">Genero: <?php echo $carrito[4]; ?> </p>
                            <p class="card-text">Especie: <?php echo $carrito[5]; ?> </p>
                            <p class="card-text">Almacen: <?php echo $carrito[8] . " " . $carrito[9]; ?> </p>
                            <p class="card-text"><?php
                                if ($carrito[8] === "Gabinete") {

                                    echo "Gaveta " . $carrito[10];
                                }
                                if ($carrito[8] === "Caja") {

                                    echo "Vial " . $carrito[10];
                                }
                                ?> 
                            </p>
                        </div>
                    </div>
                    <br>
                </div>
            </div>


        <?php
        }
    }
    ?>
</div>
</div>




<?php
include_once './public/footer.php';
?>

