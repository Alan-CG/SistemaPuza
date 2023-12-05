<?php include 'model/consultaprovebd.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style_general.css">
  <title>Materias primas</title>
</head>

<body>

  <header>
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Puza</h1>
        <p class="lead">Sistema de inventario</p>
      </div>
    </div>
  </header>
  <div class="container">
    <h3 class="text-center">Lista de Proveedores</h3>
  </div>
  </div>
  <div class="row w-100 align-items-center">
    <div class="col text-center">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Representante</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Correo</th>
            <th scope="col">Calle</th>
            <th scope="col">Colonia</th>
            <th scope="col">Código Postal</th>
            <th scope="col">Estado</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($miConsulta as $clave => $valor): ?>
            <tr>
              <td>
                <?= $valor['IDproveedor']; ?>
              </td>
              <td>
                <?= $valor['NombreProveedor']; ?>
              </td>
              <td>
                <?= $valor['Nombre_representante']; ?>
              </td>
              <td>
                <?= $valor['TelefonoProveedor']; ?>
              </td>
              <td>
                <?= $valor['CorreoProveedor']; ?>
              </td>
              <td>
                <?= $valor['CalleProveedor']; ?>
              </td>
              <td>
                <?= $valor['ColoniaProveedor']; ?>
              </td>
              <td>
                <?= $valor['CodigopostalProveedor']; ?>
              <td>
                <?= $valor['Estado']; ?>
              </td>
              </td>
              <td>
                <a class="btn btn-primary" href="proveedoresU.php?IDproveedor=<?= $valor['IDproveedor'] ?>">Modificar</a>
              </td>
              <td>
                <a class="btn btn-primary"
                  href="model/borrarprovebd.php?IDproveedor=<?= $valor['IDproveedor'] ?>">Eliminar</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <a href="menuprove.php" class="btn btn-primary">Regresar</a>
    </div>
  </div>
</body>

</html>