<?php
// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recogemos variables
    $nombre = isset($_REQUEST['input_nombrepd']) ? $_REQUEST['input_nombrepd'] : null;
    $descripcion = isset($_REQUEST['input_descripcionpd']) ? $_REQUEST['input_descripcionpd'] : null;
    $cliente = isset($_REQUEST['input_cliente']) ? $_REQUEST['input_cliente'] : null;
    $materiaprima = isset($_REQUEST['input_prodmat']) ? $_REQUEST['input_prodmat'] : null;
    $precio = isset($_REQUEST['input_precio']) ? $_REQUEST['input_precio'] : null;
    $cantidad = isset($_REQUEST['input_cantidad']) ? $_REQUEST['input_cantidad'] : null;
    $fechaentrada = isset($_REQUEST['input_fentrada']) ? $_REQUEST['input_fentrada'] : null;
    // Variables
    $hostDB = '127.0.0.1';
    $nombreDB = 'puza';
    $usuarioDB = 'root';
    $contrasenyaDB = '';
    // Conecta con base de datos
    $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
    $miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
    // Prepara INSERT
    $miInsert = $miPDO->prepare('INSERT INTO productos_terminados (NombreProducto, DescripcionProducto, 
    ExistenciasProducto, Fecha_fabricacionProducto, PrecioProducto,EstadoProducto) 
    VALUES (:NombreProducto,:DescripcionProducto,:ExistenciasProducto,:Fecha_fabricacionProducto,:PrecioProducto,:EstadoProducto)');
    // Ejecuta INSERT con los datos
    $miInsert->execute(
        array(
            'NombreProducto' => $nombre,
            'DescripcionProducto' => $descripcion,
            'ExistenciasProducto'=> $cantidad,
            'Fecha_fabricacionProducto'=> $fechaentrada,
            'PrecioProducto'=> $precio,
            'EstadoProducto'=> 1
        )
    );
     

    $idprodterminado= $miPDO->lastInsertId();
    
    // Prepara INSERT en tabla compras-clientes
    $miPDO2 = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
   $miInsert2 = $miPDO2->prepare('INSERT INTO compras_clientes (IDcliente, IDproductoterminado) 
     VALUES (:IDcliente, :IDproductoterminado)');
     // Ejecuta INSERT con los datos
     $miInsert2->execute(
         array(
            'IDcliente' => $cliente,
            'IDproductoterminado' => $idprodterminado
         )
     );

    
    // Prepara INSERT en tabla producto_materiaprima
    $miPDO3 = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
   $miInsert3 = $miPDO3->prepare('INSERT INTO producto_materiaprima (IDproductoterminado,IDmateriaprima) 
     VALUES (:IDproductoterminado, :IDmateriaprima)');
     // Ejecuta INSERT con los datos
     $miInsert3->execute(
         array(
            'IDproductoterminado' => $idprodterminado,
            'IDmateriaprima' => $materiaprima
         )
     );

     // Redireccionamos a Leer
    header('Location: ../prodtermR.php');
}
?>