<?php
    session_start();
    $usuario = $_SESSION['dni'];
    if(!isset($_SESSION['dni'])) {
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Merendero</title>
    <link rel="icon" type="image/x-icon" href="imagen/favicon.ico" />
    <link href="./assets/css/styles.css" rel="stylesheet"/><!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="./Datatables/query.dataTables.min.css">        
    <link href="css/consulta_mer.css" rel="stylesheet"/><!--propia-->
   
</head>
<body>
<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom bg-light">
             <p>Merendero</p>
            <a href="index.php">
                <p>HOME</p>
            </a>
        </div>
        <div class="list-group list-group-flush">
            <img src="./imagen/escudoUNSa.jpg">
        </div>
    </div>
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom" id="nav-merendero">
            <div class="container-fluid">
                <button class="btn btn-primary" id="sidebarToggle">Menu</button>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="width:100%; justify-content:space-between">
                    <!--<ul class="navbar-nav ms-auto mt-2 mt-lg-0">-->
                    <ul class="navbar-nav">
                        <!--usuario-->
                        <li class="nav-item active me-2">
                            <a class="btn btn-outline-success" href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo "usuario: ". $usuario?>">
                                <i class="bi bi-person-fill" style="font-size: 1rem; padding: 0 15px;">
                                </i>
                            </a>
                        </li>
                        <!--close conexion-->
                        <li class="nav-item active me-2">
                            <a class="btn btn-outline-success" id="a_cerrar_s" href="./php/close_conexion.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="cerrar sesion">
                                <i class="bi bi-box-arrow-left" style="font-size: 1rem; padding: 0 15px;"></i>
                            </a>
                        </li>
                    </ul>
                    <!--<lu class="navbar-nav ms-auto mt-2 mt-lg-0">-->
                    <ul class="navbar-nav">
                        <!--busquedas-->
                        <li class="nav-item">
                            <a class="btn btn-outline-dark" href="#!">
                                <i class="bi bi-search" style="font-size: 1rem; padding: 0 15px;"></i>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
        
  
        <!-- Page content-->
        <div class="cuerpo" style="width:100%;">
            <!--<div class="container bg-success p-2 text-dark bg-opacity-25">-->
            <div class="container p-2 text-dark bg-opacity-25">
                
                <div class="loadingDiv"></div>

                <div class="card-group">
                    <div class="card">
                        <div class="card-header">
                            <!--<img src="" class="card-img-top" alt="...">-->
                            <h3>Sistema de Consulta</h1>
                        </div>
                        <div class="card-body">
                            <form class="row row-cols-lg-auto g-3 align-items-center" id="formDni" method="" action="">
                              <div class="col-12" style="display: flex; flex: 1 1 0">
                                    <label for="inputNroDni">N°Documeto</label>
                                    <input type="text" class="form-control" id="inputNroDni" name="inputNroDni" placeholder="Numero de Documento" autofocus>

                                    <button type="submit" name="submit" id="btnSubmit" class="btn btn-success btn-lg"> Enviar</button>
                              </div>
                            </form>
                            <span class='aviso'></span>
                            <br>
                            <table id="tablaResultados" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>DNI</th>
                                        <th>Apellido y Nombres</th>
                                        <th class="esRegular">Es Regular</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
        
<script src="./assets/js/jquery-3.7.0.min.js"></script>
<script src="./assets/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="./Datatables/query.dataTables.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<script src="js/merendero.js"></script>

</body>
</html>


