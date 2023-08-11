<?php
require_once "models/peticiones_carro.php";

if (isset($_GET['id'])) {
    $carroId = $_GET['id'];
    
    if (!Carros::delete($carroId)) {
        // Eliminación exitosa, redirige de vuelta a la página principal o a donde sea necesario
        header("Location: sesion-perra.php");
        exit();
    } else {
        // Error al eliminar, muestra un mensaje o realiza una acción apropiada
        echo "Error al eliminar el carro.";
    }
} else {
    // ID no especificado, redirige o muestra un mensaje de error
    echo "ID de carro no especificado.";
}
?>
