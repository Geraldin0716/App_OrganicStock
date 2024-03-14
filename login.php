<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include("./base.php");

    // Validación de formulario
    $usuario = trim($_POST["usuario"]);
    $password = trim($_POST["password"]);

    if (empty($usuario) || empty($password)) {
        $mensaje = "Error: El usuario y la password son requeridos.";
    } else {
        try {
            $sentencia = $conexion->prepare("SELECT * FROM `usuario` WHERE usuario=:usuario");
            $sentencia->bindParam(":usuario", $usuario);
            $sentencia->execute();

            $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

            if ($registro && password_verify($password, $registro["password"])) {
                // Inicio de sesión exitoso
                $_SESSION['usuario'] = $registro["usuario"];
                $_SESSION['logueado'] = true;

                // Redirige al usuario al index.php
                header("Location: index.php");
                exit();
            } else {
                // Usuario o password incorrectos
                $mensaje = "Error: El usuario o la password son incorrectos.";
            }
        } catch (PDOException $e) {
            // Manejo de errores de la base de datos
            $mensaje = "Error en la consulta: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ORGANIC STOCK</title>
    <link rel="stylesheet" href="Css/Style.css">
</head>
<body>
<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="Imagen/Logo.png" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <form method="post" action="">
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <i class="fas fa-cubes fa-2x me-3" style="color: #fff;"></i>
                                        <h1>ORGANIC STOCK</h1>
                                    </div>
                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Inicia sesión en tu cuenta</h5>
                                    <div class="alert alert-danger" role="alert">
                                        <?php if (isset($mensaje)) { ?>
                                            <strong><?php echo htmlspecialchars($mensaje); ?></strong>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="usuario">Usuario:</label>
                                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingresa tu usuario">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu password">
                                    </div>
                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-dark btn-lg btn-block" type="submit">Ingresar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
