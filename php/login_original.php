<?php   
session_start();
require_once 'conexion.php';
$quienllama = $_POST['quienllama'];

if ($quienllama == 'valida_session'){

    if (isset($_SESSION['email'])) {
        $respuesta = ['resp' => true, 'email'=>  $_SESSION ['email']]; 
    }else{
         $respuesta = ['resp' => false, 'email'=> ''];    
    }
}

if ($quienllama == 'login'){
    if (!isset($_SESSION['email'])) {

        $username=isset($_POST["username"])? $_POST["username"]: "";
        $password=isset($_POST["password"])? $_POST["password"]: "";
        $sql="select name, email, password from users where email = ". "'".$username."'";

        $resultado = $bd->prepare($sql);
        $resultado->execute();
        $data=$resultado->fetch(PDO::FETCH_ASSOC);

        if($data['password'] == $password){
            $_SESSION ['email'] = $data['email'];
            $sessionid = session_id();
            $respuesta = ['resp' => true, 'email'=> $data['email'], 'sessionid' => $sessionid];        
            $resultado=null;
            $bd=null;
        }else
        {
            $respuesta = ['resp' => false, 'email'=> ''];    
        }
 
 
    }}

//echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
echo json_encode($respuesta, true);

?>  