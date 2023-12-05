
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style_general.css">
    <title>Sistema de Inventario</title>
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
      <section class="row">
        <section class="col-4">
          <h2></h2>
        </section>
        <section class="col-4">
        <h2 class="title" >Bienvenido</h2>
          <form action="" method="post">
           <?php include 'model/conexionlogin.php' ?>
           <?php include 'model/controlador.php' ?>
            <div class="form-group">
              <label for="input_usuario">Usuario</label>
              <input type="text" class="form-control" id="input_usuario" placeholder="Introduce tu usuario"
              name="input_usuario">
            </div>
            <div class="form-group">
              <label for="input_password">Contraseña</label>
              <input type="password" class="form-control" id="input_password" placeholder="Introduce tu contraseña"
              name = "input_password"> 
            </div>
            <!--<a href="menu.php" class="btn btn-primary">Iniciar sesión</a>-->
            <input name = "btnlogin" type="submit" class="btn btn-primary" value="Acceder">
          </form>
        </section>
        <section class="col-4"></section>
      </section>
       
    </div>
    
</body>
</html>