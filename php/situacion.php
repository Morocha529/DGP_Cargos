<?php
require_once 'conexion.php';

$fecha = isset($_REQUEST['fecha'])? $_REQUEST['fecha']: '';
if ($fecha !='' ) {
   
    if ($alumno_ne == 'no_existe' ){
        $sql = "SELECT date(fecha_hora) as fecha, ";
        $sql .= "(extract(hour from fecha_hora) ||':'|| extract(minutes from fecha_hora)) as hora, ";
        $sql .= "dni, apellidonombre, resultado FROM merendero_entrada ";
        $sql .= "WHERE date(fecha_hora) = '$fecha' and apellidonombre ISNULL ORDER BY dni ASC";
        //echo $sql;
       
    }else {  
        if($alumno_rn == 'regularNO' ){
        $sql = "SELECT date(fecha_hora) as fecha, (extract(hour from fecha_hora) ||':'|| extract(minutes from fecha_hora)) as hora, ";
        $sql .= "dni, apellidonombre, resultado FROM merendero_entrada ";
        $sql .= "WHERE date(fecha_hora) = '$fecha' and resultado = 'NO' ORDER BY apellidonombre ASC ";
        //echo $sql;
        
        } else{
        $sql = "SELECT date(fecha_hora) as fecha, (extract(hour from fecha_hora) ||':'|| extract(minutes from fecha_hora)) as hora, ";
        $sql .= "dni, apellidonombre, resultado FROM merendero_entrada ";
        $sql .= "WHERE date(fecha_hora) = '$fecha' and resultado = 'SI' ORDER BY apellidonombre ASC ";
        //echo $sql;
        }
    }

    $stmt = $bd->prepare($sql);
    
    if ($stmt->execute()){
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 
    else{
        $resultado = array(
            /*'id' => '',*/
            'dni' =>'',
            'apellidonombre' =>'',
            'fecha' =>'',
            'hora' =>'',
            'resultado' =>'');
        }
}else{
    $resultado = array(
        /*'id' => '',*/
        'dni' =>'',
        'apellidonombre' =>'',
        'fecha' =>'',
        'hora' =>'',
        'resultado' =>'');
    }
$bd=null;    
echo json_encode($resultado, true);
?>