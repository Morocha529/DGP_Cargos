<?php
session_start();
if (!isset($_SESSION['email'])){
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

    <link href="css/index.css" rel="stylesheet"/>
    <link href="css/entradas.css" rel="stylesheet"/><!--propia-->
    
</head>
<body>
<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <?php require_once "layout/vistas/sidebar.php";?>
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <?php require_once "layout/vistas/header.php";?>
       <!-- Page content-->
        <div class="cuerpo" style="width:100%;">
            <div class="container p-2 text-dark bg-opacity-25">
                
                <div class="loadingDiv"></div>

                <div class="card-group">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <form class="row row-cols-lg-auto g-3 align-items-center" id="formDni" method="" action="">
                              <div class="col-12" style="display: flex; flex: 1 1 0">
                                    <label for="inputNroDni">N°Documento</label>
                                    <input type="text" class="form-control" id="inputNroDni" name="inputNroDni" placeholder="Numero de Documento" autofocus>

                                    <button type="submit" name="submit" id="btnSubmit" class="btn btn-success btn-lg"> Enviar</button>
                              </div>
                            </form>
                            <span class='aviso'></span>
                            <br>
                            <table id="tabla-html" class="display" style="width:100%">
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
<script src="js/entradas.js"></script>
</body>
</html>


