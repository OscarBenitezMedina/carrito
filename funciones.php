<?php
    function getProductos() {
        $productos = [];
        if (file_exists("lista_productos.json")) {
            $datosEnJson = file_get_contents("lista_productos.json", true);
            $productos = json_decode($datosEnJson, true);
        }
        return $productos;
    }
    function getProducto($id)
    {
        $productos = [];
        $p = [];
        if (file_exists("lista_productos.json")) {
            $datosEnJson = file_get_contents("lista_productos.json", true);
            $productos = json_decode($datosEnJson, true);
            foreach ($productos as $p) {
                if ($p["id"] == $id) {
                    $producto = $p;
                    }
            }
        }
        return $producto;
    }
    function filtrado ($datos) {
        $datos = trim($datos);
        $datos = stripslashes($datos);
        $datos = htmlspecialchars($datos);

        return $datos;
    }
    function leerUsuarios()
    {
        $usuarios = [];
        if (file_exists("usuarios.json")) {
            $datosEnJson = file_get_contents("usuarios.json", true);
            $usuarios = json_decode($datosEnJson, true);
        }

        return $usuarios;
    }
    function usuarioValido($nombreUsuario, $password) {
        $datosUsuarios=leerUsuarios();
        foreach ($datosUsuarios as $usuario) {
            if ($usuario['usuario'] == $nombreUsuario && md5($password)) {
                return true;
            }
        }
        return false;
    }
    function datosUsuario ($login) {
        $datos = leerUsuarios();
        foreach ($datos as $usuario) {
            if ($usuario['usuario'] == $login) {
                return $usuario;
            }
        }

    }
/*
    Carrito de la compra. Añadir producto a la cesta.

<?php
    session_start();
?>

<?php

// array de la cesta de la compra.

// ["cod-1" => 4, "cod-2" => 6]


$codigo = $_GET["codigo"];

$carrito = isset($_SESSION["carrito"]) ? $_SESSION["carrito"] : [];

if (isset($carrito[$codigo])) {
    $carrito[$codigo] += 1;
} else {
    $carrito[$codigo] = 1;
}


$_SESSION["carrito"] = $carrito;

print_r($_SESSION["carrito"]);

?>

<a href="index.php">Seguir comprando</a>


// pagina inicial
<a href="http://localhost:63342/sesiones/addcarrito.php?codigo=cod-10">añadir cesta</a>
*/
?>