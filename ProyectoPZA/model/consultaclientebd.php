<?php
// Variables
$hostDB = '127.0.0.1';
$nombreDB = 'puza';
$usuarioDB = 'root';
$contrasenyaDB = '';
// Conecta con base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
// Prepara SELECT
$miConsulta = $miPDO->prepare('SELECT clientes.*,estados.Estado 
FROM clientes INNER JOIN estados ON clientes.IDestado = estados.ID_estado 
WHERE clientes.EstadoCliente = 1;');
// Ejecuta consulta
$miConsulta->execute();
//Las siguientes dos lineas sirven para llenar el select de estados en registro de clientes
$conexion=mysqli_connect($hostDB,$usuarioDB,$contrasenyaDB,$nombreDB) or die(mysqli_error($conexion));
$consulta = "SELECT * FROM estados";
$ejecutar=mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

?>