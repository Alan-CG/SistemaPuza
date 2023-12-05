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
$codigo = isset($_REQUEST['IDmateriaprima']) ? $_REQUEST['IDmateriaprima'] : null;
// Prepara DELETE
$miConsulta = $miPDO->prepare('UPDATE materias_primas SET EstadoMateria = 0 WHERE IDmateriaprima = :IDmateriaprima');
// Ejecuta la sentencia SQL
$miConsulta->execute([
    'IDmateriaprima' => $codigo
]);
// Redireccionamos al PHP con todos los datos
header('Location: ../matprimR.php');
?>