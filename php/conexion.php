<?php

$host = "localhost";
$port = "5432";
$database = "dgpcargos";
#$database = "merendero";
$password = "postgres";
$user = "postgres";

try {
    $bd = new PDO("pgsql:host=$host;port=$port;dbname=$database", $user, $password);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "conexion TRUE";
} catch (Exception $e) {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}

?>
