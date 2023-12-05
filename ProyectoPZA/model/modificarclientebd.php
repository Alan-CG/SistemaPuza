<?php
// Variables
$hostDB = '127.0.0.1';
$nombreDB = 'puza';
$usuarioDB = 'root';
$contrasenyaDB = '';
$codigo = isset($_REQUEST['IDcliente']) ? $_REQUEST['IDcliente'] : null;
$nombre = isset($_REQUEST['input_nombreclient']) ? $_REQUEST['input_nombreclient'] : null;
$apellidop = isset($_REQUEST['input_apellidopclient']) ? $_REQUEST['input_apellidopclient'] : null;
$apellidom = isset($_REQUEST['input_apellidomclient']) ? $_REQUEST['input_apellidomclient'] : null;
$telefono = isset($_REQUEST['input_telefonoclient']) ? $_REQUEST['input_telefonoclient'] : null;
$correo = isset($_REQUEST['input_correoclient']) ? $_REQUEST['input_correoclient'] : null;
$estado = isset($_REQUEST['input_estadoclient']) ? $_REQUEST['input_estadoclient'] : null;
$calle = isset($_REQUEST['input_calleclient']) ? $_REQUEST['input_calleclient'] : null;
$colonia = isset($_REQUEST['input_coloniaclient']) ? $_REQUEST['input_coloniaclient'] : null;
$codigopostal = isset($_REQUEST['input_cpclient']) ? $_REQUEST['input_cpclient'] : null;

// Conecta con base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);

// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prepara UPDATE
    $miUpdate = $miPDO->prepare('UPDATE clientes SET NombreCliente = :NombreCliente, 
    ApellidoP = :ApellidoP, ApellidoM = :ApellidoM, 
    TelefonoCliente = :TelefonoCliente, CorreoCliente = :CorreoCliente, 
    CalleCliente = :CalleCliente, ColoniaCliente = :ColoniaCliente, 
    CodigopostalCliente = :CodigopostalCliente, IDestado = :IDestado WHERE IDcliente = :IDcliente');
    // Ejecuta UPDATE con los datos
    $miUpdate->execute(
        [
            'IDcliente' => $codigo,
            'NombreCliente' => $nombre,
            'ApellidoP' => $apellidop,
            'ApellidoM' => $apellidom,
            'TelefonoCliente' => $telefono,
            'CorreoCliente' => $correo,
            'CalleCliente'=> $calle,
            'ColoniaCliente'=> $colonia,
            'CodigopostalCliente'=> $codigopostal,
            'IDestado'=> $estado
        ]
    );
    // Redireccionamos a Leer
    header('Location: ../clienteR.php');
} else {
    // Prepara SELECT
    $miConsulta = $miPDO->prepare('SELECT * FROM clientes WHERE IDcliente = :IDcliente;');
    // Ejecuta consulta
    $miConsulta->execute(
        [
            'IDcliente' => $codigo
        ]
    );
}

// Obtiene un resultado
$cliente = $miConsulta->fetch();

?>