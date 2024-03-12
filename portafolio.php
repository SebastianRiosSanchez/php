<?php include("cabecera.php"); ?>
<?php include("conexion.php"); ?>
<?php

if ($_POST) {
    print_r($_POST);
    $nombre = $_POST['txtNombre'];

    $objConexion = new conexion();
    $sql = "insert into `proyectos`(`nombre`, `imagen`, `descripcion`) VALUES( '$nombre', 'imagen 3', 'descripcion 3' ); ";
    $objConexion->ejecutar($sql);
}

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
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td scope="row">3</td>
                            <td>Aplicación web</td>
                            <td>imagen.jpg</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>






<?php include("pie.php"); ?>