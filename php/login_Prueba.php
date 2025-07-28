<?php   
/*
session_start();
require_once 'conexion.php';
$quienllama = $_POST['quienllama'];
if ($quienllama == 'login'){
        $username=isset($_POST["username"])? $_POST["username"]: "";
        $password=isset($_POST["password"])? $_POST["password"]: "";
        $sql="select name, email, password from users where email = ". "'".$username."'";
        $resultado = $bd->prepare($sql);
        $resultado->execute();
        $data=$resultado->fetch(PDO::FETCH_ASSOC);

        if($data['password'] == $password){
            $_SESSION ['email'] = $data['email'];
            $sessionid = session_id();
            $respuesta = array ("resp" => false, "email"=> $data['email'], "password"=> $data['password'], "quienllama"=> $quienllama, "sessionid" => $sessionid);        
            //$respuesta = $data;
          $resultado=null;
            $bd=null;
        }else
        {
            $respuesta = ['resp' => false, 'email'=> ''];    
        }
echo json_encode($respuesta, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
*/
 //Always start this first
session_start();
require_once 'conexion.php';

if (!empty($_POST)){
   if ( isset( $_POST['email'] ) && isset( $_POST['password'] ) ) {
        $email =  $_POST['email'] ;
        $password = $_POST['password'];

        $sql="select name, email, password from users where email = ". "'".$email."'";
        $resultado = $bd->prepare($sql);
        $resultado->execute();

        if ($resultado->rowCount() > 0){ 




            $data=$resultado->fetch(PDO::FETCH_ASSOC);

            if($data['password'] == $password){
                $_SESSION ['email'] = $data['email'];
                $sessionid = session_id();
                $respuesta = ['resp' => true, 'email'=> $data['email'], 'password'=> $data['password'], 'sessionid' => $sessionid];        
                $resultado=null;
                $bd=null;
            }else
            {   
                $respuesta = ['resp' => false, 'email'=> '', 'msg' => 'Password Incorrecto!!!'];
            }
        }else
            {
                $respuesta = ['resp' => false, 'email'=> '', 'msg' => 'Email Incorrecto!!!'];
            }
            
    }
}
echo json_encode($respuesta, true);
?>  