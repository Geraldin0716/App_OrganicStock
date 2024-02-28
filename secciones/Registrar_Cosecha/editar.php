<?php 
include("../../base.php");
if(isset( $_GET['txtID'] )){
    $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia=$conexion->prepare("SELECT * FROM producto WHERE id_producto=:id_producto");
    $sentencia->bindParam(":id_producto", $txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    $nombre=$registro["nombre"];
    $precio=$registro["precio"];
    $fecha=$registro["fecha"];
    $cantidad=$registro["cantidad"];
    $id_huerta=$registro["id_huerta"];
    $id_categoria=$registro["id_categoria"];
    $gastos=$registro["gastos"];
}
if($_POST){
    
        //Recolectamos los datos del método POST
        $txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
        $nombre=(isset($_POST["nombre"])?$_POST["nombre"]:"");
        $precio=(isset($_POST["precio"])?$_POST["precio"]:"");
        $fecha=(isset($_POST["fecha"])?$_POST["fecha"]:"");
        $cantidad=(isset($_POST["cantidad"])?$_POST["cantidad"]:"");
        $id_huerta=(isset($_POST["id_huerta"])?$_POST["id_huerta"]:"");
        $id_categoria=(isset($_POST["id_categoria"])?$_POST["id_categoria"]:"");
        $gastos=(isset($_POST["gastos"])?$_POST["gastos"]:"");
        //Preparar la insercción de los datos
        $sentencia=$conexion->prepare("UPDATE  producto SET nombre=:nombre,precio=:precio,fecha=:fecha,cantidad=:cantidad,id_huerta=:id_huerta,id_categoria=:id_categoria,gastos=:gastos 
            WHERE id_producto=:id_producto"); 
                    
        //Asignando los valores que vienen del método POST 
        $sentencia->bindParam(":nombre",$nombre);
        $sentencia->bindParam(":precio",$precio);
        $sentencia->bindParam(":fecha",$fecha);
        $sentencia->bindParam(":cantidad",$cantidad);
        $sentencia->bindParam(":id_huerta",$id_huerta);
        $sentencia->bindParam(":id_categoria",$id_categoria);
        $sentencia->bindParam(":gastos",$gastos);
        $sentencia->bindParam(":id_producto",$txtID);
        $sentencia->execute();
        header("Location:index.php");
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
                                <h2>PRODUCTO</h2>

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
                <label for="nombre" class="form-label">Nombre </label>
                <input
                    type="text"
                    value="<?php echo $nombre;?>"
                    class="form-control"
                    name="nombre"
                    id="nombre"
                    aria-describedby="helpId"
                    placeholder="Nombre"
                />

                <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input
                    type="text"
                    value="<?php echo $precio;?>"
                    class="form-control"
                    name="precio"
                    id="precio"
                    aria-describedby="helpId"
                    placeholder="Precio"
                />

                <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input
                    type="date"
                    value="<?php echo $fecha;?>"
                    class="form-control"
                    name="fecha"
                    id="fecha"
                    aria-describedby="helpId"
                    placeholder="Fecha"
                />

                <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input
                    type="text"
                    value="<?php echo $cantidad;?>"
                    class="form-control"
                    name="cantidad"
                    id="cantidad"
                    aria-describedby="helpId"
                    placeholder="Cantidad"
                />

                <div class="mb-3">
                <label for="id_huerta" class="form-label">Id huerta</label>
                <input
                    type="text"
                    value="<?php echo $id_huerta;?>"
                    class="form-control"
                    name="id_huerta" 
                    id="id_huerta" 
                    aria-describedby="helpId"
                    placeholder="Id huerta"
                />

                <div class="mb-3">
                <label for="id_categoria" class="form-label">Id categoria</label>
                <input
                    type="text"
                    value="<?php echo $id_categoria;?>"
                    class="form-control"
                    name="id_categoria"
                    id="id_categoria"
                    aria-describedby="helpId"
                    placeholder="Id categoria"
                />

                <div class="mb-3">
                <label for="gastos" class="form-label">Gastos</label>
                <input
                    type="text"
                    value="<?php echo $gastos;?>"
                    class="form-control"
                    name="gastos"
                    id="gastos"
                    aria-describedby="helpId"
                    placeholder="Gastos"
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