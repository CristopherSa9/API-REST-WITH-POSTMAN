<?php
require_once "models/peticiones_carro.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $Marca = $_POST['Marca'];
        $Nombre = $_POST['Nombre'];
        $Origen = $_POST['Origen'];
        $Modelo = $_POST['Modelo'];
        $Tipo = $_POST['Tipo'];

        if (!Carros::update($id, $Marca, $Nombre, $Origen, $Modelo, $Tipo)) {
            // Actualización exitosa, redirige de vuelta a la página principal o a donde sea necesario
            header("Location: sesion-perra.php");
            exit();
        } else {
            // Error al actualizar, muestra un mensaje o realiza una acción apropiada
            echo "Error al actualizar el carro.";
        }
    } else {
        echo "ID de carro no especificado.";
    }
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $carro = Carros::getWhere($id);

    if ($carro) {
        // Mostrar el formulario de edición
?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <title>Editar Carro</title>
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        </head>
        <body>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="/api_soa/index.php">Inventario de Vehiculos</a>
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
                            <form action="" method="POST">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <div class="form-group">
                                    <label> Marca : </label>
                                    <input type="text" name="Marca" class="form-control" placeholder="Ingresa la marca del vehiculo" value="<?php echo htmlspecialchars($carro[0]['Marca']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label> Nombre : </label>
                                    <input type="text" name="Nombre" class="form-control" placeholder="Ingresa el nombre del vehiculo" value="<?php echo htmlspecialchars($carro[0]['Nombre']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label> Origen : </label>
                                    <input type="text" name="Origen" class="form-control" placeholder="Ingresa el origen del vehiculo" value="<?php echo htmlspecialchars($carro[0]['Origen']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label> Modelo : </label>
                                    <input type="number" name="Modelo" class="form-control" placeholder="Ingresa el modelo del vehiculo" value="<?php echo htmlspecialchars($carro[0]['Modelo']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label> Tipo: </label>
                                    <input type="text" name="Tipo" class="form-control" placeholder="Ingresa el tipo del vehiculo" value="<?php echo htmlspecialchars($carro[0]['Tipo']); ?>" required>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-success"> Guardar </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        </body>
        </html>
<?php
    } else {
        // El ID de carro no existe, muestra un mensaje de error o realiza una acción apropiada
        echo "El carro no existe.";
    }
} else {
    // ID no especificado, redirige o muestra un mensaje de error
    echo "ID de carro no especificado.";
}
?>
