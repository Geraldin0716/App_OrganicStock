<?php 
include("../../base.php");
if(isset( $_GET['txtID'] )){
    $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia=$conexion->prepare("SELECT * FROM datos_persona WHERE id_datos_persona=:id_datos_persona");
    $sentencia->bindParam(":id_datos_persona", $txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    $nombre_1=$registro["nombre_1"];
    $nombre_2=$registro["nombre_2"];
    $apellido_1=$registro["apellido_1"];
    $apellido_2=$registro["apellido_2"];
    $direccion=$registro["direccion"];
    $telefono=$registro["telefono"];
    $correo=$registro["correo"];
}
if($_POST){
    
        //Recolectamos los datos del método POST
        $txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
        $nombre_1=(isset($_POST["nombre_1"])?$_POST["nombre_1"]:"");
        $nombre_2=(isset($_POST["nombre_2"])?$_POST["nombre_2"]:"");
        $apellido_1=(isset($_POST["apellido_1"])?$_POST["apellido_1"]:"");
        $apellido_2=(isset($_POST["apellido_2"])?$_POST["apellido_2"]:"");
        $direccion=(isset($_POST["direccion"])?$_POST["direccion"]:"");
        $telefono=(isset($_POST["telefono"])?$_POST["telefono"]:"");
        $correo=(isset($_POST["correo"])?$_POST["correo"]:"");
        //Preparar la insercción de los datos
        $sentencia=$conexion->prepare("UPDATE  datos_persona SET nombre_1=:nombre_1,nombre_2=:nombre_2,apellido_1=:apellido_1,apellido_2=:apellido_2,direccion=:direccion,telefono=:telefono,correo=:correo 
            WHERE id_datos_persona=:id_datos_persona"); 
                    
        //Asignando los valores que vienen del método POST 
        $sentencia->bindParam(":nombre_1",$nombre_1);
        $sentencia->bindParam(":nombre_2",$nombre_2);
        $sentencia->bindParam(":apellido_1",$apellido_1);
        $sentencia->bindParam(":apellido_2",$apellido_2);
        $sentencia->bindParam(":direccion",$direccion);
        $sentencia->bindParam(":telefono",$telefono);
        $sentencia->bindParam(":correo",$correo);
        $sentencia->bindParam(":id_datos_persona",$txtID);
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
                                <h2>CLIENTES</h2>

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
                <label for="nombre_1" class="form-label">Primer nombre </label>
                <input
                    type="text"
                    value="<?php echo $nombre_1;?>"
                    class="form-control"
                    name="nombre_1"
                    id="nombre_1"
                    aria-describedby="helpId"
                    placeholder="Primer nombre"
                />

                <div class="mb-3">
                <label for="nombre_2" class="form-label">Segundo nombre</label>
                <input
                    type="text"
                    value="<?php echo $nombre_2;?>"
                    class="form-control"
                    name="nombre_2"
                    id="nombre_2"
                    aria-describedby="helpId"
                    placeholder="Segundo nombre"
                />

                <div class="mb-3">
                <label for="apellido_1" class="form-label">Primer apellido</label>
                <input
                    type="text"
                    value="<?php echo $apellido_1;?>"
                    class="form-control"
                    name="apellido_1"
                    id="apellido_1"
                    aria-describedby="helpId"
                    placeholder="Primer apelido"
                />

                <div class="mb-3">
                <label for="apellido_2" class="form-label">Segundo apellido</label>
                <input
                    type="text"
                    value="<?php echo $apellido_2;?>"
                    class="form-control"
                    name="apellido_2"
                    id="apellido_2"
                    aria-describedby="helpId"
                    placeholder="Segundo apellido"
                />

                <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input
                    type="text"
                    value="<?php echo $direccion;?>"
                    class="form-control"
                    name="direccion" 
                    id="direccion" 
                    aria-describedby="helpId"
                    placeholder="Dirección"
                />

                <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input
                    type="text"
                    value="<?php echo $telefono;?>"
                    class="form-control"
                    name="telefono"
                    id="telefono"
                    aria-describedby="helpId"
                    placeholder="Teléfono"
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