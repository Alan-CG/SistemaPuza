<?php
// Variables
$hostDB = '127.0.0.1';
$nombreDB = 'puza';
$usuarioDB = 'root';
$contrasenyaDB = '';
$codigo = isset($_REQUEST['IDproductosterminados']) ? $_REQUEST['IDproductosterminados'] : null;
$nombre = isset($_REQUEST['input_nombrepd']) ? $_REQUEST['input_nombrepd'] : null;
$descripcion = isset($_REQUEST['input_descripcionpd']) ? $_REQUEST['input_descripcionpd'] : null;
$cliente = isset($_REQUEST['input_cliente']) ? $_REQUEST['input_cliente'] : null;
$materiaprima = isset($_REQUEST['input_prodmat']) ? $_REQUEST['input_prodmat'] : null;
$precio = isset($_REQUEST['input_precio']) ? $_REQUEST['input_precio'] : null;
$cantidad = isset($_REQUEST['input_cantidad']) ? $_REQUEST['input_cantidad'] : null;
$fechaentrada = isset($_REQUEST['input_fentrada']) ? $_REQUEST['input_fentrada'] : null;
// Conecta con base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);

// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prepara UPDATE
    $miUpdate = $miPDO->prepare('UPDATE productos_terminados 
    SET NombreProducto = :NombreProducto, DescripcionProducto = :DescripcionProducto, 
    ExistenciasProducto = :ExistenciasProducto, 
    Fecha_fabricacionProducto = :Fecha_fabricacionProducto, PrecioProducto = :PrecioProducto 
    WHERE IDproductosterminados = :IDproductosterminados');
    // Ejecuta UPDATE con los datos
    $miUpdate->execute(
        [
            'IDproductosterminados' => $codigo,
            'NombreProducto' => $nombre,
            'DescripcionProducto' => $descripcion,
            'ExistenciasProducto' => $cantidad,
            'Fecha_fabricacionProducto' => $fechaentrada,
            'PrecioProducto'=> $precio

        ]
    );
    $miupdate2=$miPDO->prepare('UPDATE compras_clientes SET IDcliente = :IDcliente 
    WHERE IDproductoterminado = :IDproductoterminado');
    $miupdate2->execute(
        [
            'IDproductoterminado' => $codigo,
            'IDcliente' => $cliente
        ]
        );
    $miupdate3=$miPDO->prepare('UPDATE producto_materiaprima SET IDmateriaprima = :IDmateriaprima 
    WHERE IDproductoterminado = :IDproductoterminado');
    $miupdate3->execute(
        [
            'IDproductoterminado' => $codigo,
            'IDmateriaprima' => $materiaprima
        ]
        );
    // Redireccionamos a Leer
    header('Location: ../prodtermR.php');
} else {
    // Prepara SELECT

    
    $miConsulta = $miPDO->prepare('SELECT * FROM productos_terminados WHERE IDproductosterminados = :IDproductosterminados;');
    // Ejecuta consulta
    $miConsulta->execute(
        [
          'IDproductosterminados' => $codigo
        ]
    );
}


// Obtiene un resultado
$prodterminado = $miConsulta->fetch();

?>
