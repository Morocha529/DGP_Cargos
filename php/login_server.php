<?php
// Always start this first
session_start();
require_once 'conexion.php';

if (!empty($_POST)){
   if ( isset( $_POST['email'] ) && isset( $_POST['password'] ) ) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql="select name, email, password from users where email = ". "'".$email."'";
        $resultado = $bd->prepare($sql);
        $resultado->execute();
        
        if ( $resultado->rowCount() > 0 ){ 

            $data=$resultado->fetch(PDO::FETCH_ASSOC);
            if($data['password'] == $password){
                $_SESSION ['email'] = $data['email'];
                $sessionid = session_id();
                $respuesta = ['resp' => true, 'email'=> $data['email'], 'password'=> $data['password'], 'sessionid' => $sessionid];        
                $resultado=null;
                $bd=null;
            }else{
                    $respuesta = ['resp' => false, 'error_password'=> true];
                }
        }else{
                $respuesta = ['resp' => false,  'error_email' => true];
             }

    }
}

echo json_encode($respuesta, true);
?>