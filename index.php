<?php
include("cabecera.php");
include("conexion.php");
$objConexion = new conexion();
$sqlSelect = "SELECT * FROM `proyectos`";
$proyectos = $objConexion->consultar($sqlSelect);
?>



<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Bienvenid@s</h1>
        <p class="col-md-8 fs-4">Este es un portafolio privado</p>
        <hr class="my-2">
        <p>Más información correoelectronico@mail.com</p>

    </div>
</div>



<div class="card-group">

    <?php foreach ($proyectos as $proyecto) {  ?>


        <div class="card" style="width: 18rem;">
            <img src="img/<?php echo  $proyecto['imagen']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"> <?php echo $proyecto['nombre']; ?> </h5>
                <p class="card-text"> <?php echo $proyecto['descripcion']; ?> </p>
                <p class="card-text"><small class="text-body-secondary">****</small></p>
            </div>
        </div>




        <!-- <div class="card">
            <img src="img/<?php echo  $proyecto['imagen']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"> <?php echo $proyecto['nombre']; ?> </h5>
                <p class="card-text"> <?php echo $proyecto['descripcion']; ?> </p>
                <p class="card-text"><small class="text-body-secondary">****</small></p>
            </div>
        </div> -->

    <?php } ?>

</div>



<?php include("pie.php"); ?>