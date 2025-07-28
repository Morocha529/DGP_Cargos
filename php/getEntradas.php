<?php   
require_once 'conexion.php';

$fch_ini = isset($_GET["fch_ini"])? $_GET["fch_ini"]: "";
$fch_fin = isset($_GET["fch_fin"])? $_GET["fch_fin"]: "";
$opcion = isset($_GET["opcion"])? $_GET["opcion"]: "";

$opcion = 'resultado_si_no';
/*$fch_ini = '2023-08-04';
$fch_fin = '2023-08-07';*/
$fch_ini = $_REQUEST['fch_ini'];
$fch_fin = $_REQUEST['fch_fin'];


switch ($opcion) {
    case 'resultado_si_no':
        $sql="SELECT id, date(fecha_hora) as fecha, 
        (extract(hour from fecha_hora) ||':'|| extract(minutes from fecha_hora)) as hora,
        dni, apellidonombre, resultado FROM merendero_entrada
        where date(fecha_hora) between '$fch_ini' and '$fch_fin'
        order by id desc";
        /*echo $sql;
        return*/
              
        $stmt = $bd->prepare($sql);
        $stmt->execute();
        $respuesta=$stmt->fetchAll(PDO::FETCH_ASSOC);

        /*for ($i=0; $i < count($respuesta); $i++) { 
            echo $respuesta[$i]['id'].', '.
            $respuesta[$i]['fecha'].', '.
            $respuesta[$i]['hora'].', '. 
            $respuesta[$i]['dni'].', '.
            $respuesta[$i]['apellidonombre'].','.
            $respuesta[$i]['resultado']. "<br>";
        }
        foreach ($dataa as $data){
            echo $data['id'] . "<br>";
            echo $data['fecha'] . "<br>";
            echo $data['hora'] . "<br>";
            echo $data['dni'] . "<br>";
            echo $data['apellidonombre'] . "<br>";
            echo $data['resultado'] . "<br>";

        }*/
        header("content-type:application/json");
        echo json_encode($respuesta);
        break;
    case 'resultado_no_encontrado':
        break;
    case 'busqueda':
        

    default:
        # code...
        break;
}
$bd=null;
?>  
 

