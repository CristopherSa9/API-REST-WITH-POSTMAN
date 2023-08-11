<?php
require_once "Config/Conexion.php";

class Carros {

    public static function getAll() {
        $db = new Connection();
        $query = "SELECT * FROM tipos_de_carros";
        $resultado = $db->query($query);
        $datos = [];
        if($resultado->num_rows) {
            while($row = $resultado->fetch_assoc()) {
                $datos[] = [
                    'id' => $row['id'],
                    'Marca' => $row['Marca'],
                    'Nombre' => $row['Nombre'],
                    'Origen' => $row['Origen'],
                    'Modelo' => $row['Modelo'],
                    'Tipo' => $row['Tipo']
                ];
            }
        }
        return $datos;
    }

    public static function getWhere($id_tipo_de_carro) {
        $db = new Connection();
        $query = "SELECT * FROM tipos_de_carros WHERE id=?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('i', $id_tipo_de_carro);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $stmt->close();
        $datos = [];
        if($resultado->num_rows) {
            while($row = $resultado->fetch_assoc()) {
                $datos[] = [
                    'id' => $row['id'],
                    'Marca' => $row['Marca'],
                    'Nombre' => $row['Nombre'],
                    'Origen' => $row['Origen'],
                    'Modelo' => $row['Modelo'],
                    'Tipo' => $row['Tipo']
                ];
            }
        }
        return $datos;
    }

    public static function insert($Marca, $Nombre, $Origen, $Modelo, $Tipo) {
        $db = new Connection();
        $query = "INSERT INTO tipos_de_carros (Marca, Nombre, Origen, Modelo, Tipo)
        VALUES(?, ?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param('sssss', $Marca, $Nombre, $Origen, $Modelo, $Tipo);
        $stmt->execute();
        $stmt->close();
        return $db->affected_rows > 0;
    }

    public static function update($id, $Marca, $Nombre, $Origen, $Modelo, $Tipo) {
        $db = new Connection();
        $query = "UPDATE tipos_de_carros SET Marca=?, Nombre=?, Origen=?, Modelo=?, Tipo=? WHERE id=?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('sssssi', $Marca, $Nombre, $Origen, $Modelo, $Tipo, $id);
        $stmt->execute();
        $stmt->close();
        return $db->affected_rows > 0;
    }

    public static function delete($id_tipo_de_carro) {
        $db = new Connection();
        $query = "DELETE FROM tipos_de_carros WHERE id=?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('i', $id_tipo_de_carro);
        $stmt->execute();
        $stmt->close();
        return $db->affected_rows > 0;
    }

    public static function handleOptionsRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            // Set allowed methods and headers
            header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
            header('Access-Control-Allow-Headers: Content-Type');
            http_response_code(200);
            exit();
        }
    }

    private static $dbHost = 'localhost'; // Tu host de la base de datos
    private static $dbUser = 'root';   // Tu nombre de usuario de la base de datos
    private static $dbPass = ''; // Tu contraseña de la base de datos
    private static $dbName = 'carros'; // Tu nombre de la base de datos

    private static function connectDB() {
        $db = new mysqli(self::$dbHost, self::$dbUser, self::$dbPass, self::$dbName);

        if ($db->connect_error) {
            die("Error de conexión a la base de datos: " . $db->connect_error);
        }

        return $db;
    }

    public static function updatePartial($id, $data) {
        $db = self::connectDB(); // Replace with your database connection code

        // Prepare the SQL query
        $query = "UPDATE carros SET ";
        $updates = [];

        if (isset($data->Marca)) {
            $updates[] = "Marca = '{$data->Marca}'";
        }
        if (isset($data->Nombre)) {
            $updates[] = "Nombre = '{$data->Nombre}'";
        }
        if (isset($data->Origen)) {
            $updates[] = "Origen = '{$data->Origen}'";
        }
        if (isset($data->Modelo)) {
            $updates[] = "Modelo = '{$data->Modelo}'";
        }
        if (isset($data->Tipo)) {
            $updates[] = "Tipo = '{$data->Tipo}'";
        }

        $query .= implode(', ', $updates);
        $query .= " WHERE id = $id";

        // Execute the query
        $result = mysqli_query($db, $query);

        // Check for success
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}//end class Carros
?>
