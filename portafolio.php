<?php include("cabecera.php"); ?>
<?php include("conexion.php"); ?>
<?php

$objConexion = new conexion();
if ($_POST) {
    $nombre = $_POST['txtNombre'];
    $descripcion = $_POST['txtDescripcion'];
    $fecha = new DateTime();
    $nombreImagen = $fecha->getTimestamp() . "_" . $_FILES['txtArchivo']['name'];
    $imagenTemporal = $_FILES['txtArchivo']['tmp_name'];
    move_uploaded_file($imagenTemporal, "img/" . $nombreImagen);
    $sql = "insert into `proyectos`(`nombre`, `imagen`, `descripcion`) VALUES( '$nombre', '$nombreImagen', ' $descripcion' ); ";
    $objConexion->ejecutar($sql);
}
if ($_GET) {
    $id = $_GET['borrar'];
    $sqlBuscaImagen = "SELECT imagen FROM proyectos WHERE id=" . $id; //SELECT imagen from proyectos where id = 41
    $imagen = $objConexion->consultar($sqlBuscaImagen);
    unlink("img/" . $imagen['imagen']);
    $sql = "DELETE FROM proyectos WHERE `proyectos`.`id` =" . $id;
    $objConexion->ejecutar($sql);
}

$sqlSelect = "SELECT * FROM `proyectos`";
$proyectos = $objConexion->consultar($sqlSelect);

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
                                <td>
                                    <img width="50" src="img/<?php echo  $proyecto['imagen']; ?>" alt="">
                                </td>
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