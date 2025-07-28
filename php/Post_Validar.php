<?php   
session_start();
//require_once 'conexion.php';
//$quienllama = $_POST['quienllama'];

if (isset($_SESSION['email'])) {
        $respuesta = ['resp' => true, 'email'=>  $_SESSION ['email']]; 
    }else{
         $respuesta = ['resp' => false, 'email'=> ''];    
}

//echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
echo json_encode($respuesta, true);

?>  