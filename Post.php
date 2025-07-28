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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./assets/css/styles.css" rel="stylesheet"/><!--Bootstrap-->
    <style>
      
      .vertical-center {
        display: flex;
        flex-direction: column;
        justify-content: center;
       align-items: center;
        min-height: 100vh;
      }
    </style>
</head>

<body class="">
    <div class="container-fluid">
      <div class="row vertical-center">
          <!--<form id ="form_login" action="" method="POST" autocomplete="" class="col-xs-8 col-xs-offset-2  col-sm-6 col-sm-offset-3 col-md-4 col-sm-offset-4 col-lg-2 col-lg-offset-5">-->
          <form id ="form_login" action="" method="POST" autocomplete="" class ="col-lg-2" >
            <h1>Sign In</h1>
            <p>
              <!--<label class="sr-only" for="">Email Address</label>-->
              <input id="email" class="form-control" type="email" placeholder="Email Address" required autofocus>
            </p>
            <p>
              <!--<label class="sr-only" for="">Password</label>-->
              <input id="password" class="form-control" type="password" placeholder="Password" required>
            </p>
            <!--<p class="checkbox">
              <label><input type="checkbox">Remember Me</label>
            </p>-->
            <button class="btn btn-dark w-100" type="submit" >Sign In</button>
          </form>
      </div>
    </div>


<script src="./assets/js/jquery-3.7.0.min.js"></script>
<script src="./assets/js/bootstrap.bundle.min.js"></script> <!-- Bootstrap core JS-->
<script>
     $("form").on("submit",function(event){
        event.preventDefault();
        
            let varemail = $("#email").val();
            let varpassword=$("#password").val();

            $.post( "./php/login_prueba.php", { email: varemail, password: varpassword })
              .done(function( data ) {
                 respuesta =  JSON.parse(data);
                 if (respuesta['resp'] == true){
                    $(location).attr('href','./Post_Principal.php');
                 }else{
                  alert('usuario y/o contraseña incorrectas!!')
                }
              })
            .fail( function( jqXHR, textStatus, errorThrown ) {
                              
                if (jqXHR.status == 404) {
                alert('Requested page not found [404]');
                } else if (jqXHR.status == 500) {
                    alert('Internal Server Error [500].');
                } else if (textStatus === 'parsererror') {
                    alert('Requested JSON parse failed.');
                }else alert('Uncaught Error: ' + jqXHR.responseText);
                
            });
        });
    
</script>
</body>
</html>


