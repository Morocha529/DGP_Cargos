<?php
function redirigirALogin() {
    if (headers_sent() === false) {
        header('Location: login.php');
        exit;
    }
}
//  si el usuario no está autenticado, redirigir a login.php
if (!isset($_SESSION['email'])) {
    redirigirALogin();
}else{
     header('Location: Principal.php');
}
?>

