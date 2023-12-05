<?php 
// Variables
$hostDB = '127.0.0.1';
$nombreDB = 'puza';
$usuarioDB = 'root';
$contrasenyaDB = '';
// Conecta con base de datos

$conexion=new mysqli($hostDB,$usuarioDB,$contrasenyaDB,$nombreDB,"3306");
$conexion->set_charset("utf8");



//$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
//$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
//$conexion=mysqli_connect($hostDB,$usuarioDB,$contrasenyaDB,$nombreDB) or die(mysqli_error($conexion));



?>