<?php
session_start();

if ( isset( $_SESSION['email'] ) ) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
   //echo $_SESSION['email'];
   header("Location: ./Post_Principal.php");
} else {
    // Redirect them to the login page
//    header("Location: ./Post.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <title>DGP Sistema de Cargos</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="./imagen/favicon.ico" />
    <link href="./assets/css/styles.css" rel="stylesheet"/><!--Bootstrap-->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/modal.css">
</head>
<body>
    <div class="container mx-5">
        <div class="row m-7 no-gutters shadow-lg">
            <div class="col-md-8 px-0">
                <img src="./imagen/Sistema/Login_2.png" />
            </div>
            <div class="col-md-4 pt-5 px-4 pb-1">
                <div class="d-flex">
                    <div  class="w-30">
                        <img src="./imagen/escudoUNSA.jpg" />
                    </div>
                    <div class="w-70">
                        <h2>DIRECCIÓN GENERAL DE PERSONAL</h2>
                       <p>Universidad Nacional de Salta</p>
                    </div>
                </div>
                 <form id ="form_login" action="" method="POST" autocomplete="on" class="mt-4">
                
                    <div class="input-container">
                        <input type="text" id="email" class="login-input" value="" required autofocus>
                        <!--<input type="text" id="email" class="login-input" value="" required>-->
                        <label for="email" class="label-mueve">Email</label>
                    </div>

                    <div class="input-container">
                        <div class="input-group">
                            <div class="input-group" style="display: flex; flex-wrap: nowrap; align-items: flex-end; width: 100%; flex-direction: row;">
                                <input type="password" class="login-input" id="password" value="" required="">
                                <label for="password" class="label-mueve">Contraseña</label>                               
                                <button class="btn" type="button" id="togglePassword" style="border-bottom: 1px solid #CCC;">
                                    <i class="fas fa-eye" id="toggleIcon">
                                    </i>
                                </button>
                            </div>
                            
                        </div>
                    </div>

                    <div class="input-container">
                        <span id="textError"></span>
                        <button type="button" class="btn btn-dark w-100 p-3 mt-3" id="btnSiguiente" onclick="">Ingresar</button>

                    </div>
                
                </form>
            </div>
        </div>
    </div>
    <script src="./assets/js/jquery-3.7.0.min.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script> <!-- Bootstrap core JS-->
    <script src="js/index.js"></script>
    <script src="js/login.js"></script>
</body>
</html>
