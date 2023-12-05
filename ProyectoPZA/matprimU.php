<?php include 'model/modificarmatprimbd.php' ?>
<?php include 'model/consultamatprimbd.php' ?>
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
    <h4 class="text-center">Actualizar inventario</h4>
    <form method="post" class="needs-validation" novalidate>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="input_nombremp">Nombre</label>
          <input type="text" class="form-control" id="input_nombremp" name="input_nombremp"
            value="<?= $matprim['NombreMateria'] ?>" required>
            <div class="invalid-feedback">
        Rellena el campo correctamente
      </div>
        </div>
        <div class="form-group col-md-6">
          <label for="input_descripcionmp">Descripción</label>
          <input type="text" class="form-control" id="input_descripcionmp" name="input_descripcionmp"
            value="<?= $matprim['DescripcionMateria'] ?>" required>
            <div class="invalid-feedback">
        Rellena el campo correctamente
      </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="input_proveedor">Proveedor</label>
          <select class="custom-select" id="input_proveedor" name="input_proveedor">
            <?php foreach ($ejecutar as $opciones): ?>
              <option value="<?php echo $opciones['IDproveedor'] ?>"><?php echo $opciones['NombreProveedor'] ?>
              </option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="input_precio">Precio</label>
          <input type="number" class="form-control" id="input_precio" name="input_precio"
            value="<?= $matprim['PrecioMateria'] ?>" required>
            <div class="invalid-feedback">
        Rellena el campo correctamente
      </div>
        </div>
        <div class="form-group col-md-6">
          <label for="input_cantidad">Cantidad</label>
          <input type="number" class="form-control" id="input_cantidad" name="input_cantidad"
            value="<?= $matprim['ExistenciasMateria'] ?>" required>
            <div class="invalid-feedback">
        Rellena el campo correctamente
      </div>
        </div>
        <div class="form-group col-md-6">
          <label for="input_fentrada">Fecha de entrada</label>
          <input type="date" class="form-control" id="input_fentrada" name="input_fentrada"
            value="<?= $matprim['Fecha_entradaMateria'] ?>" required>
            <div class="invalid-feedback">
        Rellena el campo correctamente
      </div>
        </div>
      </div>
      <input type="hidden" name="IDmateriaprima" value="<?= $codigo ?>">
      <button type="submit" class="btn btn-primary">Actualizar la base de datos</button>
    </form>
    <div class="row w-100 align-items-center">
      <div class="col text-center">
        <a href="menumatprim.php" class="btn btn-primary">Regresar</a>
      </div>
    </div>
  </div>
  <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

</body>

</html>