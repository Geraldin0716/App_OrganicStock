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
?>

<?php
// Supongamos que ya tienes una conexión a la base de datos llamada $conexion

if (isset($_GET['id_cliente'])) {
    $id_cliente = $_GET['id_cliente'];

    // Consulta para obtener datos de cliente y datos_persona
    $sentencia = $conexion->prepare("SELECT cliente.*, datos_persona.*
                                     FROM cliente
                                     JOIN datos_persona ON cliente.id_datos_persona = datos_persona.id_persona
                                     WHERE cliente.id_cliente = :id_cliente");
    $sentencia->bindParam(":id_cliente", $id_cliente);
    $sentencia->execute();

    // Obtener el resultado como un array asociativo
    $datos_cliente = $sentencia->fetch(PDO::FETCH_ASSOC);

    // Mostrar los datos
    echo "ID Cliente: " . $datos_cliente['id_cliente'] . "<br>";
    echo "Nombre: " . $datos_cliente['nombre_1'] . "<br>";
    echo "Apellido: " . $datos_cliente['apellido_1'] . "<br>";
    // Puedes continuar mostrando otros datos según tu esquema

} else {
    echo "ID de cliente no proporcionado.";
}
?>

$lista_huerta = $sentencia->fetchAll(PDO::FETCH_ASSOC);


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
                                <h2>VENTA</h2>

<table class="table table-dark table-striped">
<a
        name=""
        id=""
        class="btn btn-success"
        href="crear.php"
        role="button"
        >Agregar venta</a
       >
         <thead>
         <tr>
        <th scope="col">ID</th>
        <th scope="col">FECHA </th>
        <th scope="col">ID CLIENTE</th>
        <th scope="col">PRECIO</th>
        <th scope="col">CANTIDAD</th>
        <th scope="col">TOTAL</th>
        
        </tr>
        </thead>
        <tbody>
            <?php foreach ($lista_huerta as $registro) { ?>

                    <tr class="">
                    <td scope="row"><?php echo $registro["id_venta"]; ?></td>
                    <td><?php echo $registro["fecha_venta"]; ?></td>
                    <td><?php echo $registro["id_cliente"]; ?></td>
                    <td><?php echo $registro["precio"]; ?></td>
                    <td><?php echo $registro["cantidad"]; ?></td>
                    <td><?php echo $registro["total"]; ?></td>
                    <td> 

                    
                       
                    <a
                            class="btn"
                            href="editar.php?txtID=<?php echo $registro["id_venta"]; ?>"
                            role="button"
                            >Editar</a
                        >
                        <a
                            class="btn"
                            href="index.php?txtID=<?php echo $registro["id_venta"]; ?>"
                            role="button"
                            >Eliminar</a
                        >
                        
                        
                        
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