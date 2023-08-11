<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Registro de Vehiculo</title>
    <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous">
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="/api_soa/sesion-perra.php">Inventario de Vehiculos</a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/api_soa/nuevo.php">Agregar Vehiculo</a>
          </li>
        </ul>  
      </div>
    </nav>

    <br>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 container justify-content-center card">
                <h1 class="text-center"> Registro de Vehiculo </h1>
                <div class="card-body">
                  <form action="crear_carro.php" method="post"> <!--agregar el metodo Post-->
                    <div class="form-group">
                      <label> Marca : </label>
                      <input type="text" name="Marca" class="form-control" placeholder="Ingresa la marca del vehiculo" required> 
                    </div>
                    <div class="form-group">
                      <label> Nombre : </label>
                      <input type="text" name="Nombre" class="form-control" placeholder="Ingresa el nombre del vehiculo" required> 
                    </div>
                    <div class="form-group">
                      <label> Origen : </label>
                      <input type="text" name="Origen" class="form-control" placeholder="Ingresa el origen del vehiculo" required> 
                    </div>
                    <div class="form-group">
                      <label> Modelo : </label>
                      <input type="number" name="Modelo" class="form-control" placeholder="Ingresa el modelo del vehiculo" required>
                    </div>
                    <div class="form-group">
                      <label> Tipo: </label>
                      <input type="text" name="Tipo" class="form-control" placeholder="Ingresa el tipo del vehiculo" required> 
                    </div>
                    <div class="box-footer">
                      <button class="btn btn-success"> Guardar </button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>

  </body>
</html>
