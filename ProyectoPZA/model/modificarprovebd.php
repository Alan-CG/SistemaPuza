<?php
// Variables
$hostDB = '127.0.0.1';
$nombreDB = 'puza';
$usuarioDB = 'root';
$contrasenyaDB = '';
$codigo = isset($_REQUEST['IDproveedor']) ? $_REQUEST['IDproveedor'] : null;
$nombre = isset($_REQUEST['input_nombreproveedor']) ? $_REQUEST['input_nombreproveedor'] : null;
$nombre_represent = isset($_REQUEST['input_representprove']) ? $_REQUEST['input_representprove'] : null;
$telefono = isset($_REQUEST['input_telefonoprove']) ? $_REQUEST['input_telefonoprove'] : null;
$correo = isset($_REQUEST['input_correoprove']) ? $_REQUEST['input_correoprove'] : null;
$estado = isset($_REQUEST['input_proveestado']) ? $_REQUEST['input_proveestado'] : null;
$calle = isset($_REQUEST['input_provecalle']) ? $_REQUEST['input_provecalle'] : null;
$colonia = isset($_REQUEST['input_provecolonia']) ? $_REQUEST['input_provecolonia'] : null;
$codigopostal = isset($_REQUEST['input_provecp']) ? $_REQUEST['input_provecp'] : null;

// Conecta con base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);

// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prepara UPDATE
    $miUpdate = $miPDO->prepare('UPDATE proveedores 
    SET NombreProveedor = :NombreProveedor, Nombre_representante = :Nombre_representante, 
    TelefonoProveedor = :TelefonoProveedor, CorreoProveedor = :CorreoProveedor, CalleProveedor = :CalleProveedor,
    ColoniaProveedor = :ColoniaProveedor, CodigopostalProveedor = :CodigopostalProveedor, IDestado = :IDestado
     WHERE IDproveedor = :IDproveedor');
    // Ejecuta UPDATE con los datos
    $miUpdate->execute(
        [
            'IDproveedor' => $codigo,
            'NombreProveedor' => $nombre,
            'Nombre_representante' => $nombre_represent,
            'TelefonoProveedor' => $telefono,
            'CorreoProveedor' => $correo,
            'CalleProveedor'=> $calle,
            'ColoniaProveedor'=> $colonia,
            'CodigopostalProveedor'=> $codigopostal,
            'IDestado'=> $estado
        ]
    );
    // Redireccionamos a Leer
    header('Location: ../proveedoresR.php');
} else {
    // Prepara SELECT
    $miConsulta = $miPDO->prepare('SELECT * FROM proveedores WHERE IDproveedor = :IDproveedor;');
    // Ejecuta consulta
    $miConsulta->execute(
        [
            'IDproveedor' => $codigo
        ]
    );
}





// Obtiene un resultado
$proveedor = $miConsulta->fetch();

?>