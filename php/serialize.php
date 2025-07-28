<?php
require_once 'conexion.php';
$fecha = isset($_REQUEST['fecha'])? $_REQUEST['fecha']: '';
$consultar = isset($_REQUEST['consultar'])? $_REQUEST['consultar']: ''; 

if ($fecha !='' ) {
    switch ($consultar) {
        case 'regular':
            $sql = "SELECT date(fecha_hora) as fecha, (extract(hour from fecha_hora) ||':'|| extract(minutes from fecha_hora)) as hora, ";
            $sql .= "dni, apellidonombre, resultado FROM merendero_entrada ";
            $sql .= "WHERE date(fecha_hora) = '$fecha' and resultado = 'SI' ORDER BY apellidonombre ASC ";
            break;
        case 'regularNO':
            $sql = "SELECT date(fecha_hora) as fecha, (extract(hour from fecha_hora) ||':'|| extract(minutes from fecha_hora)) as hora, ";
            $sql .= "dni, apellidonombre, resultado FROM merendero_entrada ";
            $sql .= "WHERE date(fecha_hora) = '$fecha' and resultado = 'NO' ORDER BY apellidonombre ASC ";
            break;
        case 'no_existe':
            $sql = "SELECT date(fecha_hora) as fecha, ";
            $sql .= "(extract(hour from fecha_hora) ||':'|| extract(minutes from fecha_hora)) as hora, ";
            $sql .= "dni, apellidonombre, resultado FROM merendero_entrada ";
            $sql .= "WHERE date(fecha_hora) = '$fecha' and apellidonombre ISNULL ORDER BY dni ASC";
            break;
        case 'historico':
            $sql ="SELECT  max(date(fecha_hora)) as fecha, ";
            $sql .= "case ";
            $sql .= "when resultado = 'SI' THEN 'Alumno regular' ";
            $sql .= "WHEN resultado = 'NO' THEN 'Alumno no regular' ";
            $sql .= "WHEN resultado = '404 Not Found, El alumno no existe' THEN 'Alumno no existe' ";
            $sql .= "end as salida, ";
            $sql .= "COUNT(*) as cantidad ";
            $sql .= "FROM merendero_entrada ";
            $sql .= "GROUP by resultado order by resultado desc";
            break;
        case 'a_diario':
            $sql ="SELECT  max(date(fecha_hora)) as fecha, ";
            $sql .= "case ";
            $sql .= "when resultado = 'SI' THEN 'Alumno regular' ";
            $sql .= "WHEN resultado = 'NO' THEN 'Alumno no regular' ";
            $sql .= "WHEN resultado = '404 Not Found, El alumno no existe' THEN 'Alumno no existe' ";
            $sql .= "end as salida, ";
            $sql .= "COUNT(*) as cantidad ";
            $sql .= "FROM merendero_entrada ";
            $sql .= "where date(fecha_hora) = '$fecha' ";
            $sql .= "GROUP by resultado order by resultado desc";
            break;
        case 'todos':
            $sql = "SELECT date(fecha_hora) as fecha, ";
            $sql .= "(extract(hour from fecha_hora) ||':'|| extract(minutes from fecha_hora)) as hora, ";
            $sql .= "dni, apellidonombre, resultado FROM merendero_entrada ";
            $sql .= "WHERE date(fecha_hora) = '$fecha' ORDER BY dni ASC"; 
            break;
        default:
            # code...
            break;
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
        'dni' =>'',
        'apellidonombre' =>'',
        'fecha' =>'',
        'hora' =>'',
        'resultado' =>'');
    }
$bd=null;    
echo json_encode($resultado, true);
?>