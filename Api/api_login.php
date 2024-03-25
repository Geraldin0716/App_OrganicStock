<?php
// Incluir el archivo de conexión a la base de datos
include("./base.php");

// Verificar si la solicitud es del tipo POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los datos del formulario
    $usuario = trim($_POST["usuario"]);
    $password = trim($_POST["password"]);

    // Verificar si se proporcionaron usuario y contraseña
    if (empty($usuario) || empty($password)) {
        // Si falta usuario o contraseña, responder con un mensaje de error
        echo json_encode(["success" => false, "error" => "El usuario y la contraseña son requeridos."]);
    } else {
        try {
            // Consulta SQL para obtener el usuario de la base de datos
            $sentencia = $conexion->prepare("SELECT * FROM `usuario` WHERE usuario=:usuario");
            $sentencia->bindParam(":usuario", $usuario);
            $sentencia->execute();

            // Obtener el registro de usuario
            $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

            // Verificar si se encontró un usuario y si la contraseña coincide
            if ($registro && password_verify($password, $registro["password"])) {
                // Inicio de sesión exitoso
                // Aquí podrías realizar más acciones, como generar un token de sesión
                // y almacenarlo en la base de datos o en una cookie de sesión

                // Responder con un mensaje de éxito
                echo json_encode(["success" => true]);
            } else {
                // Usuario o contraseña incorrectos
                // Responder con un mensaje de error
                echo json_encode(["success" => false, "error" => "El usuario o la contraseña son incorrectos."]);
            }
        } catch (PDOException $e) {
            // Manejo de errores de la base de datos
            // Responder con un mensaje de error
            echo json_encode(["success" => false, "error" => "Error en la consulta: " . $e->getMessage()]);
        }
    }
} else {
    // Si la solicitud no es del tipo POST, responder con un mensaje de error
    echo json_encode(["success" => false, "error" => "La solicitud debe ser del tipo POST."]);
}
?>
