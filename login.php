<?php
session_start();
if ($_POST) {
    if (($_POST['usuario'] == "usuario") && ($_POST['contrasena'] == "contrasena")) {

        $_SESSION['usuario'] = "usuario";
        header("location:index.php"); // Redirecciona a la página de inicio si el usuario y contraseña son correctos.

    } else {
        echo "<script>alert('Credenciales incorrectas');</script>";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Loguin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col-md-4"> </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Iniciar sesión</div>
                    <div class="card-body">
                        <form action="login.php" method="post">
                            Usuario: <input class="form-control" type="text" name="usuario" id="">
                            <br />
                            contraseña: <input class="form-control" type="password" name="contrasena" id="">
                            <br />
                            <button class="btn btn-success" type="submit">Ingresar</button>
                        </form>
                    </div>
                    <div class="card-footer text-muted">¿Olvidaste la contraseña?</div>
                </div>
            </div>
            <div class="col-md-4"> </div>
        </div>
    </div>



</body>

</html>