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
//$miConsulta = $miPDO->prepare('SELECT * FROM productos_terminados;');
$miConsulta = $miPDO->prepare('SELECT productos_terminados.*,producto_materiaprima.IDmateriaprima,
materias_primas.NombreMateria, compras_clientes.IDcliente,clientes.NombreCliente FROM productos_terminados 
INNER JOIN producto_materiaprima ON productos_terminados.IDproductosterminados = producto_materiaprima.IDproductoterminado 
INNER JOIN materias_primas ON materias_primas.IDmateriaprima = producto_materiaprima.IDmateriaprima 
INNER JOIN compras_clientes ON productos_terminados.IDproductosterminados = compras_clientes.IDproductoterminado
INNER JOIN clientes ON clientes.IDcliente = compras_clientes.IDcliente WHERE productos_terminados.EstadoProducto=1;');
// Ejecuta consulta
$miConsulta->execute();
//Las siguientes lineas sirven para llenar el select de cliente en registro de productos terminados
$conexion2=mysqli_connect($hostDB,$usuarioDB,$contrasenyaDB,$nombreDB) or die(mysqli_error($conexion2));
$consulta = "SELECT * FROM clientes";
$ejecutar=mysqli_query($conexion2, $consulta) or die(mysqli_error($conexion));
//Las siguientes dos lineas sirven para llenar el select de materias primas en registro de productos terminados
$conexion3=mysqli_connect($hostDB,$usuarioDB,$contrasenyaDB,$nombreDB) or die(mysqli_error($conexion3));
$consulta2 = "SELECT * FROM materias_primas";
$ejecutar2=mysqli_query($conexion3, $consulta2) or die(mysqli_error($conexion));
?>