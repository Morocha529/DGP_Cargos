<?php
session_start();
unset($_SESSION["email"]);
session_destroy();
$array= array('session' => $_SESSION["email"]);
echo json_encode($array);
?>