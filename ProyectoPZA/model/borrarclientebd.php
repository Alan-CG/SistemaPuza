<?php

// Variables
$hostDB = '127.0.0.1';
$nombreDB = 'puza';
$usuarioDB = 'root';
$contrasenyaDB = '';
// Conecta con base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
// Obtiene codigo del libro a borrar
$codigo = isset($_REQUEST['IDcliente']) ? $_REQUEST['IDcliente'] : null;
// Prepara DELETE
$miConsulta = $miPDO->prepare('UPDATE clientes SET EstadoCliente = 0 WHERE IDcliente = :IDcliente');
// Ejecuta la sentencia SQL
$miConsulta->execute([
    'IDcliente' => $codigo
]);
// Redireccionamos al PHP con todos los datos
header('Location: ../clienteR.php');
?>