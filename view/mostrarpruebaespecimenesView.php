<?php
include_once './public/header.php';
?>

<div class="container col-6">
   
<?php

if(isset($vars['lista'])){

 foreach ($vars['lista'] as $especimen) {

$imageDataEncoded = base64_encode($especimen[1]);
$imageSrc = 'data:'.$especimen[0].';base64,' . $imageDataEncoded;


echo '<img src="' . $imageSrc . '" alt="Imagen">';

echo '<div class="col-md-4 d-flex align-items-center bg-black">
        <span class="mb-3 mb-md-0 text-light">Recolector: '.$especimen[2].'</span>
    </div>';

 }
}

?>

</div>

<?php
include_once './public/footer.php';
?>