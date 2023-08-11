<?php
  // Conectar a la base de datos
  $conexion = mysqli_connect("localhost", "root", "", "carros");

  // Verificar la conexión
  if (mysqli_connect_errno()) {
    echo "Error en la conexión: " . mysqli_connect_error();
    exit();
  }

  // Obtener los datos del formulario
  $Marca = $_POST['Marca'];
  $Nombre = $_POST['Nombre'];
  $Origen = $_POST['Origen'];
  $Modelo = $_POST['Modelo'];
  $Tipo = $_POST['Tipo'];

  // Insertar el nuevo usuario en la base de datos
  $query = "INSERT INTO tipos_de_carros (Marca, Nombre, Origen, Modelo, Tipo) VALUES ('$Marca', '$Nombre', '$Origen', '$Modelo', '$Tipo')";
  mysqli_query($conexion, $query);

  // Cerrar la conexión
  mysqli_close($conexion);

  // Redireccionar a la página principal
  header("Location: sesion-perra.php");
?>