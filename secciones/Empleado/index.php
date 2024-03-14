<?php 
$url_base="http://localhost/app/";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ORGANIC STOCK</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../../Css/Style.css">
</head>

<?php include("../../base.php");




if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";
    $sentencia = $conexion->prepare("DELETE FROM empleado WHERE id_empleado=:id_empleado");
    $sentencia->bindParam(":id_empleado", $txtID);
    $sentencia->execute();

    header("Location:index.php");
}

// Modifica la consulta para unir las tablas empleado y datos_persona
$sentencia = $conexion->prepare("SELECT 
                                    empleado.id_empleado, 
                                    empleado.cargo,
                                    empleado.contrato,
                                    CONCAT(datos_persona.nombre_1, ' ', datos_persona.nombre_2) AS nombre,
                                    CONCAT(datos_persona.apellido_1, ' ', datos_persona.apellido_2) AS apellido,
                                    datos_persona.direccion,
                                    datos_persona.telefono,
                                    datos_persona.correo
                                FROM empleado
                                LEFT JOIN datos_persona ON empleado.id_datos_persona = datos_persona.id_datos_persona");
$sentencia->execute();
$lista_empleado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>

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
                        <li class="sidebar-item">
                    <a href="<?php echo $url_base;?>login.php" class="sidebar-link">
                    <i class="bi bi-toggle2-off"></i>
                        Cerrar sesión
                    </a>
                </li>
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
                                <h2>EMPLEADO</h2>

<a
        name=""
        id=""
        class="btn btn-success"
        href="crear.php"
        role="button"
        >Agregar Empleado</a>
        <table id="tabla_id" class="table table-dark table-striped">
         <thead>
         <tr>
         <th scope="col">ID</th>
         <th scope="col">CARGO</th>
         <th scope="col">CONTRATO</th>
        <th scope="col">NOMBRE</th>
        <th scope="col">APELLIDO</th>
        <th scope="col">DIRECCIÓN</th>
        <th scope="col">TELÉFONO</th>
        <th scope="col">CORREO</th>
        <th scope="col"></th>
        
</td>
        
        </tr>
        </thead>
        <tbody>
    <?php foreach ($lista_empleado as $empleado) { ?>
        <tr>
            <td scope="row"><?php echo $empleado["id_empleado"]; ?></td>
            <td><?php echo $empleado["cargo"]; ?></td>
            <td><?php echo $empleado["contrato"]; ?></td>
            <td><?php echo $empleado["nombre"]; ?></td>
            <td><?php echo $empleado["apellido"]; ?></td>
            <td><?php echo $empleado["direccion"]; ?></td>
            <td><?php echo $empleado["telefono"]; ?></td>
            <td><?php echo $empleado["correo"]; ?></td>
           
            
            <td>
                <a class="btn" href="editar.php?txtID=<?php echo $empleado["id_empleado"]; ?>" role="button">Editar</a>
                <a class="btn" href="javascript:borrar(<?php echo $empleado["id_empleado"]; ?>)" role="button">Eliminar</a>
            </td>
        </tr>
    <?php } ?>
</tbody>
        </table>
</div>
</div>
</div>

                                        
<?php include("../../templates/fooder.php"); ?>