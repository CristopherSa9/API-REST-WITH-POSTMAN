<!DOCTYPE html>
<html>
<!-- Scripts de JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="module" > import {
        initializeApp
      } from "https://www.gstatic.com/firebasejs/10.1.0/firebase-app.js";
      import {createUserWithEmailAndPassword,
        getAuth, signOut, 
        signInWithEmailAndPassword
      } from "https://www.gstatic.com/firebasejs/10.1.0/firebase-auth.js";
      
      const firebaseConfig = {
        apiKey: "AIzaSyC5FqTzj2l-OApnteH1yLCunKetRaKf61k",
          authDomain: "login-soa.firebaseapp.com",
          projectId: "login-soa",
          storageBucket: "login-soa.appspot.com",
          messagingSenderId: "746339217777",
          appId: "1:746339217777:web:13ad22587641e104aac6d0"
      };
      
      const app = initializeApp(firebaseConfig);
      const auth = getAuth(app);

      auth.onAuthStateChanged((user) => {
        if (user) {
            console.log("Usuario autenticado:", user);
        } else {
            console.log("Usuario no autenticado");
            window.location.href = "login.html";
        }
    });


    // Cerrar sesión
    $(document).on('click', '#logoutBtn', function(event) {
        event.preventDefault();
        signOut(auth)
            .then(() => {
                console.log("Sesión cerrada");
            })
            .catch((error) => {
                console.error("Error al cerrar sesión:", error);
            });
    });

       </script>

<head>
    <meta charset="utf-8" />
    <title>Control de Productos</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/api_soa/sesion-perra.php">Inventario de Vehiculos</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/api_soa/nuevo.php">Agregar Vehiculo</a>
                </li>
            </ul>
            <button id="logoutBtn" class="btn btn-primary rounded"> Cerrar Sesion </button>
        </div>
    </nav>

    <br>

    <!-- Tabla de datos -->
    <div class="container text-center">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Origen</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody id="carros">

            </tbody>
    </div>

    <tbody>
        <?php
        require_once "models/peticiones_carro.php";

        $carros = Carros::getAll();

        foreach ($carros as $carro) {
            echo "<tr>";
            echo "<td>{$carro['id']}</td>";
            echo "<td>{$carro['Marca']}</td>";
            echo "<td>{$carro['Nombre']}</td>";
            echo "<td>{$carro['Origen']}</td>";
            echo "<td>{$carro['Modelo']}</td>";
            echo "<td>{$carro['Tipo']}</td>";
            echo "<td>";
            echo "<a href='editar_carro.php?id={$carro['id']}' class='btn btn-primary'>Editar</a>";
            echo "<a href='eliminar_carro.php?id={$carro['id']}' class='btn btn-danger ml-2'>Eliminar</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>