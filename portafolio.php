<?php include("cabecera.php"); ?>
<?php include("conexion.php"); ?>
<?php
$objConexion = new conexion();
if ($_POST) {
    print_r($_POST);

    $nombre = $_POST['txtNombre'];
    $descripcion = $_POST['txtDescripcion'];
    $imagen = $_FILES['txtArchivo'];
    $sql = "insert into `proyectos`(`nombre`, `imagen`, `descripcion`) VALUES( '$nombre', 'imagen', ' $descripcion' ); ";
    $objConexion->ejecutar($sql);
}
if ($_GET) {
    //DELETE FROM proyectos WHERE `proyectos`.`id` = 37
}

$sqlSelect = "SELECT * FROM `proyectos`";
$proyectos = $objConexion->consulta($sqlSelect);

?>
<br />
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Datos del proyecto</div>
                <div class="card-body">
                    <form action="portafolio.php" method="post" enctype="multipart/form-data">
                        Nombre del proyecto:
                        <input class="form-control" type="text" name="txtNombre"><br />
                        Imágen del proyecto:
                        <input class="form-control" type="file" name="txtArchivo"><br />
                        Descripción:
                        <textarea class="form-control" name="txtDescripcion" id="" rows="3"></textarea>
                        <br />
                        <input class="btn btn-success" type="submit" value="Enviar Proyecto">
                    </form>
                </div>
                <div class="card-footer text-muted">Click en el botón para enviar datos.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="table-responsive">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre del proyecto</th>
                            <th scope="col">Imágen</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($proyectos as $proyecto) {  ?>
                            <tr class="">
                                <td><?php echo  $proyecto['id']; ?></td>
                                <td><?php echo  $proyecto['nombre']; ?></td>
                                <td><?php echo  $proyecto['imagen']; ?></td>
                                <td><?php echo  $proyecto['descripcion']; ?></td>
                                <td> <a class="btn btn-danger" href="?borrar=<?php echo  $proyecto['id']; ?>">Eliminar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>






<?php include("pie.php"); ?>