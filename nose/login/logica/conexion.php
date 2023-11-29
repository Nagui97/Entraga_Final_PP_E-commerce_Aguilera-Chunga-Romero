<?php

$host = "localhost";
$usuario= "root";
$clave="";
$bd ="comprar";

$conexion= mysqli_connect($host, $usuario, $clave, $bd);

$conexion2 = new mysqli($host, $usuario, $clave, $bd);
?>