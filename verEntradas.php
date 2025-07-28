<?php
session_start();
$usuario = $_SESSION['email'];
if (!isset($usuario)){
    header('Location: ./index.php');
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
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/verEntradas.css">
</head>
<body>
<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <?php require_once "layout/vistas/sidebar.php";?>
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <?php require_once "layout/vistas/header.php";?>        
        <div class="container" id="form-fecha">
            <form action="" method="">
                <div class="row">
                    <div class="col form-group">
                        <label for="fch_ini">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                    <div class="col form-group">
                        <input type="checkbox" name="check_regularNO" id="check_regularNO" value="">
                        <label for="check-404">No Regular</label>
                    </div>
                    <div class="col form-group">
                        <input type="checkbox" name="check_404" id="check_404" value="">
                        <label for="check-404">No encontrado</label>
                    </div>
                    <div class="col form-group">
                        <input type="checkbox" name="check_todos" id ="check_todos" value="">
                        <label for="check-todos">todos</label>
                    </div>
                    <div class="col form-group">
                        <button type="submit" class="form-control btn btn-secondary">
                            <i class="bi bi-search" style="font-size: 1rem; padding: 0 15px;"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- Page content-->
        <div class="cuerpo" style="width:100%;">
            <!--<div class="container bg-success p-2 text-dark bg-opacity-25">-->
            <div class="container p-2 text-dark bg-opacity-25">
                <table id="tabla-html" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <!--<th>id</th>-->
                            <th>DNI</th>
                            <th>Apellido y Nombres</th>
                            <th>Fecha</th>
                            <th>hora</th>
                            <th>Es Regular</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>                  
            </div>
        </div>
    </div>

</div>
        
<script src="./assets/js/jquery-3.7.0.min.js"></script>
<script src="./assets/js/bootstrap.bundle.min.js"></script>
<script src="./Datatables/query.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<!--Core theme JS-->
<!--<script src="js/scripts.js"></script>
<script src="js/login.js"></script>-->
<script src="js/verEntradas.js"></script>
</body>
</html>


