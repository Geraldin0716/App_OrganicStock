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

<?php include("../../base.php");




if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    // Nota: Si deseas eliminar datos de la tabla proveedor, debes ajustar esta consulta
    // En este caso, estoy suponiendo que id_proveedor es la clave primaria de la tabla proveedor.
    $sentencia = $conexion->prepare("DELETE FROM proveedor WHERE id_proveedor=:id_proveedor");
    $sentencia->bindParam(":id_proveedor", $txtID);
    $sentencia->execute();

    header("Location:index.php");
}

// Modifica la consulta para unir las tablas proveedor y datos_persona
$sentencia = $conexion->prepare("SELECT 
                                    proveedor.id_proveedor, 
                                    proveedor.pagina_web,
                                    CONCAT(datos_persona.nombre_1, ' ', datos_persona.nombre_2) AS nombre,
                                    CONCAT(datos_persona.apellido_1, ' ', datos_persona.apellido_2) AS apellido,
                                    datos_persona.direccion,
                                    datos_persona.telefono,
                                    datos_persona.correo
                                FROM proveedor
                                LEFT JOIN datos_persona ON proveedor.id_datos_persona = datos_persona.id_datos_persona");
$sentencia->execute();
$lista_proveedor = $sentencia->fetchAll(PDO::FETCH_ASSOC);

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
                    </li>

                    <li class="sidebar-item">
                        <a href="<?php echo $url_base;?>secciones/Generar_reporte/" class="sidebar-link">
                            <i class="bi bi-file-text"></i>
                            Generar reporte
                        </a>
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
                                <h2>PROVEEDOR</h2>

<table class="table table-dark table-striped">
<a
        name=""
        id=""
        class="btn btn-success"
        href="crear.php"
        role="button"
        >Agregar Proveedor</a
       >
         <thead>
         <tr>
         <th scope="col">ID</th>
         <th scope="col">PAGINA WEB</th>
        <th scope="col">NOMBRE</th>
        <th scope="col">APELLIDO</th>
        <th scope="col">DIRECCIÓN</th>
        <th scope="col">TELÉFONO</th>
        <th scope="col">CORREO</th>
</td>
        
        </tr>
        </thead>
        <tbody>
    <?php foreach ($lista_proveedor as $proveedor) { ?>
        <tr>
            <td scope="row"><?php echo $proveedor["id_proveedor"]; ?></td>
            <td><?php echo $proveedor["pagina_web"]; ?></td>
            <td><?php echo $proveedor["nombre"]; ?></td>
            <td><?php echo $proveedor["apellido"]; ?></td>
            <td><?php echo $proveedor["direccion"]; ?></td>
            <td><?php echo $proveedor["telefono"]; ?></td>
            <td><?php echo $proveedor["correo"]; ?></td>
            
            <td>
                <a class="btn" href="editar.php?txtID=<?php echo $proveedor["id_proveedor"]; ?>" role="button">Editar</a>
                <a class="btn" href="index.php?txtID=<?php echo $proveedor["id_proveedor"]; ?>" role="button">Eliminar</a>
            </td>
        </tr>
    <?php } ?>
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