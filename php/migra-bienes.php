<?php
require_once 'conexion.php';

$sql = "SELECT numero_patrimonial, descripcion_bien, fecha_alta, valor_bien, observaciones ";
$sql .= "FROM temp_bienes_migra ";
$sql .= "WHERE numero_patrimonial <>'' and observaciones <> '' ORDER BY fecha_alta limit 1000"; 

$stmt = $bd->prepare($sql);
if ($stmt->execute()){
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
} 
else{
    $resultado = array(
    'numero_patrimoni' =>'',
    'descripcion_bien' =>'',
    'fecha_alta' =>'',
    'valor_bien' =>'',
    'observaciones' =>'');
}

$bd=null;    
//var_dump($resultado);
//echo '<br>';
//header("content-type:application/json");
echo json_encode($resultado, true);

//echo json_encode($resultado);

?>