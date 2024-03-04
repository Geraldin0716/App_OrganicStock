<?php 
include("../../base.php");
if (isset($_GET['txtID'])) {
    $txtID = isset($_GET['txtID']) ? $_GET['txtID'] : "";

    $sentencia = $conexion->prepare("SELECT * FROM usuario WHERE id_usuario=:id_usuario");
    $sentencia->bindParam(":id_usuario", $txtID, PDO::PARAM_INT);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);
    $usuario = $registro["usuario"];
    $correo = $registro["correo"];
    $contraseña = $registro["contraseña"];
}

if ($_POST) {
    // Recolectamos los datos del método POST
    $txtID = isset($_POST['txtID']) ? $_POST['txtID'] : "";
    $usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
    $correo = isset($_POST["correo"]) ? $_POST["correo"] : "";
    $contraseña = isset($_POST["contraseña"]) ? $_POST["contraseña"] : "";

    // Validar y limpiar datos POST
    $txtID = filter_var($txtID, FILTER_SANITIZE_STRING);
    $usuario = filter_var($usuario, FILTER_SANITIZE_STRING);
    $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);
    $contraseña = filter_var($contraseña, FILTER_SANITIZE_STRING);

    $hashedContraseña = password_hash($contraseña, PASSWORD_DEFAULT);

    // Intenta realizar la actualización con un bloque try-catch
    try {
        // Preparar la insercción de los datos
        $sentencia = $conexion->prepare("UPDATE usuario SET usuario=:usuario, correo=:correo, contraseña=:contraseña WHERE id_usuario=:id_usuario");

        // Asignando los valores que vienen del método POST
        $sentencia->bindParam(":usuario", $usuario);
        $sentencia->bindParam(":correo", $correo);
        $sentencia->bindParam(":contraseña", $hashedContraseña);
        $sentencia->bindParam(":id_usuario", $txtID);

        // Ejecutar la actualización
        $result = $sentencia->execute();

        // Verificar si la actualización fue exitosa
        if ($result) {
            // Redirige solo si la actualización fue exitosa
            header("Location: index.php");
            exit(); // Asegúrate de salir después de la redirección
        } else {
            // Maneja el caso en que la actualización falla
            echo "Error al actualizar el usuario.";
        }
    } catch (PDOException $e) {
        // Maneja errores de base de datos
        echo "Error: " . $e->getMessage();
    }
}


?>



        </form>
       
    </div>
    <div class="card-footer text-muted">
        
    </div>
</div>



<?php 
$url_base="http://localhost/app/";

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous">
<link rel="stylesheet" href="../../Css/Style.css">
    <title>ORGANIC STOCK</title>
</head>
<?php include("../../base.php"); ?>





<body>
    <div class="wrapper">
    
        <aside id="sidebar">
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#">ORGANIC STOCK</a>
                </div>
                
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        MENÚ
                        </li>
                    <li class="sidebar-item">
                        <a href="<?php echo $url_base;?>secciones/Usuario/" class="sidebar-link">
                            <i class="bi bi-person-fill-add"></i>
                            Usuario
                        </a>
                    </li>

                </li>
                <li class="sidebar-item">
                    <a href="<?php echo $url_base;?>secciones/Categoria/" class="sidebar-link">
                        <i class="bi bi-pencil-square"></i>
                        Categoría
                    </a>
                </li>


                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#registrar"
                            aria-expanded="false" aria-controls="registrar">
                            <i class="bi bi-pass-fill"></i>
                            Registrar
                        </a>
                        <ul id="registrar" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="<?php echo $url_base;?>secciones/Registrar_Materiaprima/" class="sidebar-link">Materia prima</a>
                                
                            <li class="sidebar-item">
                                <a href="<?php echo $url_base;?>secciones/Registrar_Huerta" class="sidebar-link">Huerta</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="<?php echo $url_base;?>secciones/Registrar_Cosecha/" class="sidebar-link">Productos</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="<?php echo $url_base;?>secciones/Registrar_Ventas/" class="sidebar-link">Ventas</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="<?php echo $url_base;?>secciones/Registrar_Datospersonales/" class="sidebar-link">Datos Personales</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#consultar"
                            aria-expanded="false" aria-controls="consultar">
                            <i class="bi bi-people-fill"></i>
                            Contactos
                        </a>
                        <ul id="consultar" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="<?php echo $url_base;?>secciones/Cliente/" class="sidebar-link">Cliente</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="<?php echo $url_base;?>secciones/Proveedor/"class="sidebar-link">Proveedor</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="<?php echo $url_base;?>secciones/Empleado/"class="sidebar-link">Empleado</a>
                            </li>
                        </ul>
                    </li>

                    
                </li>
                        
                    
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        
        
        </aside>
        <!-- Main Component -->
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <!-- Button for sidebar toggle -->
                <button class="btn" type="button" data-bs-theme="dark">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <main class="content px-3 py-2">
                    <div class="container-fluid">
                        <div class="mb-3">
                            <h3>ORGANIC STOCK </h3>

                        
            </nav>
<div class="container mt-5">
<div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 py-8 ">
                            
                            </div>
                            <br>
                                <h2>USUARIO</h2>

<table class="table table-dark table-striped">

<div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="txtID" class="form-label">ID:</label>
            <input
                type="text"
                value="<?php echo $txtID;?>"
                class="form-control"readonly 
                name="txtID"
                id="txtID"
                aria-describedby="helpId"
                placeholder="ID"
            />
        </div>

        <div class="mb-3">
                <label for="usuario" class="form-label">Usuario</label>
                <input
                    type="text"
                    value="<?php echo $usuario;?>"
                    class="form-control"
                    name="usuario"
                    id="usuario"
                    aria-describedby="helpId"
                    placeholder="Usuario"
                />

                <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input
                    type="text"
                    value="<?php echo $correo;?>"
                    class="form-control"
                    name="correo"
                    id="correo"
                    aria-describedby="helpId"
                    placeholder="Correo"
                />

                <div class="mb-3">
                <label for="contraseña" class="form-label">Contraseña</label>
                <input
                    type="password"
                    value="<?php echo $contraseña;?>"
                    class="form-control"
                    name="contraseña"
                    id="contraseña"
                    aria-describedby="helpId"
                    placeholder="Contraseña"
                
                />
                <small id="helpId" class="form-text text-muted"></small>
            </div>
            <button
                type="submit"
                class="btn btn-success"
            >
                Actualizar
            </button>
            <a
                name=""
                id=""
                class="btn btn-success"
                href="index.php"
                role="button"
                >Cancelar</a
            >
            

        </form>

            
                
            </tbody>
        </table>
       </div>
       
    </div>
   
</div>
</div>
</div>
   </div>
                                        
                                    </tbody>
                                </table>
        
                            </div>
                        </div>
                    </div>
            



            

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
      
<?php include("../../templates/fooder.php"); ?>