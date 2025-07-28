<?php
require_once "conexion.php";

$opcion=isset($_POST["opcion"])? $_POST["opcion"]: "";
/*JSON_DECODE, al establecer su valor en true, devuelve una matriz asociativa y 
al establecer su valor en FALSE(defaul), devuelve una matriz de objetos.*/
if (isset($_POST["cadena"])){
    $cadena=$_POST["cadena"];
    $cad=json_decode($cadena, true);
    
    if(in_array(404,$cad)){ $opcion='error';}

}else $cadena="";


switch ($opcion) {
    case 'insert':
        for ($i=0; $i < count($cad); $i++) { 
            $dni = $cad[$i]['dni'];
            $fechahora = $cad[$i]['fechahora'];
            $apellido_nombres = $cad[$i]['apellido_nombres'];
            $es_regular = $cad[$i]['es_regular'];
        
            $sql = "INSERT INTO public.merendero_entrada (fecha_hora, dni, apellidonombre, resultado) ";
            $sql .= "VALUES( '$fechahora' , '$dni', '$apellido_nombres', '$es_regular')";
                    
            $stmt = $bd->prepare($sql);
            $stmt->execute();
        }
        break;
    case 'error':
            $dni = $cad['dni'];
            $fechahora = $cad['fechahora'];
            $error = $cad['error'];
            $resultado = $cad['mensaje']. ", " .$cad['descripcion'];
 
            $sql = "INSERT INTO public.merendero_entrada (dni, fecha_hora, resultado) ";
            $sql .= "VALUES( '$dni', '$fechahora', '$resultado')";
           
            $stmt = $bd->prepare($sql);
            $stmt->execute();
        break;
    default:
        # code...
        break;
}
//echo json_encode($responde); 
/*foreach($cad as $valor){
    $sql=$valor['fechahora']. $valor['dni']. $valor['apellido_nombres']. $valor['es_regular'];
    echo "\n".$sql;
}*/
?>
