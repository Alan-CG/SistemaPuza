<?php
// Variables
$hostDB = '127.0.0.1';
$nombreDB = 'puza';
$usuarioDB = 'root';
$contrasenyaDB = '';
// Conecta con base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
$conexion=mysqli_connect($hostDB,$usuarioDB,$contrasenyaDB,$nombreDB) or die(mysqli_error($conexion));
// Prepara SELECT
//$miConsulta = $miPDO->prepare('SELECT * FROM proveedores;');
$miConsulta = $miPDO->prepare('SELECT proveedores.*, estados.Estado 
FROM proveedores INNER JOIN estados ON proveedores.IDestado = estados.ID_estado 
WHERE proveedores.estadoProveedor=1;');

// Ejecuta consulta
$miConsulta->execute();
//Las siguientes dos lineas sirven para llenar el select de estados en registro de proveedores
$conexion=mysqli_connect($hostDB,$usuarioDB,$contrasenyaDB,$nombreDB) or die(mysqli_error($conexion));
$consulta = "SELECT * FROM estados";
$ejecutar=mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));


?>