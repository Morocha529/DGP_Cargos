<?php
session_start();
if (!isset($_SESSION['dni'])){
    header('location:./index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Simple Sidebar - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="./imagen/favicon.ico" />
    <link href="./assets/css/styles.css" rel="stylesheet"/><!--Bootstrap)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="./Datatables/query.dataTables.min.css">        

    <link rel="stylesheet" href="./css/base-index.css">
    <!--<link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/consulta_mer.css">-->

</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
       <?php require_once "./layout/vistas/sidebar.php";?>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <?php require_once "./layout/vistas/header.php";?>
            <!-- Page content-->
            <div class="container-fluid">

                <div class="card-group">
                    <div class="card">
                        <div class="card-header">
                            <!--<img src="" class="card-img-top" alt="...">-->
                            <h3>Sistema de Consulta</h1>
                        </div>
                        <div class="card-body">
                            <form class="row row-cols-lg-auto g-3 align-items-center" id="formDni" method="" action="" autocomplete="off">
                              <div class="col-12" style="display: flex; flex: 1 1 0">

                                    <input type="hidden" value="<?php echo $usuario;?>" id="input_aux">
                                    
                                    <label for="inputNroDni">N°Documeto</label>
                                    <input type="text" class="form-control" id="inputNroDni" name="inputNroDni" placeholder="Numero de Documento" autofocus disabled>

                                    <button type="submit" name="submit" id="btnSubmit" class="btn btn-success btn-lg" disabled> Enviar</button>
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
<!-- MODAL -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header bg-success text-white">
              <h1 class="modal-title fs-5" id="loginModalLabel">INICIO DE SESIÓN</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id ="form_login" action="" method="t" autocomplete="off">
              <div class="modal-body">
                  <div class="">
                      
                               
                      <div class="input-container">
                        <input type="text" id="input-username" class="login-input" value="">
                        <label for="input-username" class="label-mueve">Nombre de Usuario</label>
                      </div>
  
                      <div class="input-container">
                        <input type="password" id="input-password" class="login-input" val="">
                        <label for="input-password" class="label-mueve">Contraseña</label>
                      </div>
                  </div>
              </div>
              <div class="modal-footer mt-2">
                  <span id="textError"></span>
                  <button type="button" class="btn btn-success w-100" id="btnSiguiente" onclick="">Siguiente</button>
              </div>
          </form>
      </div>
    </div>
  </div>
<!-- Bootstrap core JS-->
<script src="./assets/js/jquery-3.7.0.min.js"></script>
<script src="./assets/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<!-- Core theme JS-->
<!--<script src="./js/index.js"></script>-->
<script src="./js/verEntradas.js"></script>
<script src="js/merendero.js"></script>
</body>
</html>
