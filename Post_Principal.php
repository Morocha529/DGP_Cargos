<?php
session_start();

if ( isset( $_SESSION['email'] ) ) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
   //echo $_SESSION['email'];
} else {
    // Redirect them to the login page
    header("Location: ./login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <title>Sistema de Cargos</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="./imagen/favicon.ico" />
    <link href="./assets/css/styles.css" rel="stylesheet"/><!--Bootstrap-->
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">-->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/modal.css">
    <style>
        .box{
            /*width: 250px;
            height: 450px;*/
            /*background: rgb(224, 228, 31);*/
            color: black;
            margin: 0px 9px;
            transition: 0.1s;
            height: 200px;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            padding: 10px;
            }


        .box:hover{
            transform: scale(1.3);
            /*background:rgba(237, 238, 232, 1);*/
            /*background: #f9e79f ;*/
            color: black;
            z-index: 1;
            box-shadow: 1px 1px 1px #000;
            
        }
        a {
            
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<script>
    window.addEventListener('beforeunload', function (e) {
    //  Se recomienda enviar una petición asíncrona para evitar problemas.
    //  Por ejemplo, usando fetch o XMLHttpRequest.
    //  Aquí se muestra un ejemplo con fetch.
    fetch('./php/close_conexion.php', {keepalive: true});  // keepalive para asegurar que la petición se complete antes del cierre
});
</script>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
       <?php require_once "layout/vistas/sidebar.php";?>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <?php require_once "./layout/vistas/header.php";?>
            <!-- Page content-->
            <!--<div class="container-fluid">-->
                <!--aca contenido.....-->
            <div class="container">
                <div class="row hidden-md-up">
                    <div class="col-md-4">
                        <a href="migra-bienes.php" class="custom-card">
                            <div class="card box">
                                <img src="./imagen/LogosFacultad/Exactas.jpg" class="card-img-top" alt="..." style="width: 100%; height: 100%; object-fit: contain;">
                                <h4 class="card-title">Facultad de Ciencias Exactas</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                              <a href="migra-bienes.php" class="custom-card">
                            <div class="card box">
                                <img src="./imagen/LogosFacultad/Humanidades.png" class="card-img-top" alt="..." style="width: 100%; height: 100%; object-fit: contain;">
                                <h4 class="card-title">Facultad de Humanidades</h4>
                            </div>
                        </a>
                    </div>
                <div class="col-md-4">
                  <a href="migra-bienes.php" class="custom-card">
                            <div class="card box">
                                <img src="./imagen/LogosFacultad/Agronomia.jpg" class="card-img-top" alt="..." style="width: 100%; height: 100%; object-fit: contain;">
                                <h4 class="card-title">Facultad de Agronomia</h4>
                            </div>
                        </a>
                </div>
                </div><br>
                <div class="row">
                    <div class="col-md-4">
                            <a href="migra-bienes.php" class="custom-card">
                            <div class="card box">
                                <img src="./imagen/LogosFacultad/Salud.png" class="card-img-top" alt="..." style="width: 100%; height: 100%; object-fit: contain;">
                                <h4 class="card-title">Facultad de Ciencias de la Salud</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="migra-bienes.php" class="custom-card">
                            <div class="card box">
                                <img src="./imagen/LogosFacultad/Ingenieria.jpg" class="card-img-top" alt="..." style="width: 100%; height: 100%; object-fit: contain;">
                                <h4 class="card-title">Facultad de Ingeniera</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="migra-bienes.php" class="custom-card">
                        <div class="card box">
                                <div class="card box">
                                <img src="./imagen/LogosFacultad/Economicas.png" class="card-img-top" alt="..." style="width: 100%; height: 100%; object-fit: contain;">
                                <!--<h4 class="card-title">Facultad de Ciencias Economicas</h4>-->
                            </div>
                        </div>
                        
                        </a>
                    </div>
                </div>
 
                <!--aca contenido.....-->
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
        <form id ="form_login" action="" method="POST" autocomplete="off">
            <div class="modal-body">
                <div class="input-container">
                    <input type="text" id="input-username" class="login-input" value="" name ="username">
                    <label for="input-username" class="label-mueve">Nombre de Usuario</label>
                </div>

                <div class="input-container">
                    <input type="password" id="input-password" class="login-input" val="" name="password">
                    <label for="input-password" class="label-mueve">Contraseña</label>
                </div>

                </div>

                <div class="modal-footer mt-2">
                    <span id="textError"></span>
                    <button type="button" class="btn btn-success w-100" id="btnSiguiente" onclick="">Siguiente</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
<script src="./assets/js/jquery-3.7.0.min.js"></script>
<script src="./assets/js/bootstrap.bundle.min.js"></script> <!-- Bootstrap core JS-->
<script>


$(document).ready(function(){
   (function(){
        $.post("php/Post_Validar.php")
            .done(function(responde) {
            data=JSON.parse(responde);
            console.log(data);
            if(data['resp'] == true){
                $("a#a_link_logout").css("display", "block");
                $("a#a_link_login").css("display", "none");
                $("li.nav-item p#p_link_usuario").text('Usuario: '+ data['email']);
                //sidebar
                $("#a_link_ingreso, #a_link_consultadetallada, #a_link_consultatotal").removeClass("disabled-href");
            }else{
                //nav
                //Menu seteado por CSS
                $("#a_link_ingreso, #a_link_consultadetallada, #a_link_consultatotal").addClass("disabled-href");
            }
            })
    })();
    
});



</script>
</body>
</html>


