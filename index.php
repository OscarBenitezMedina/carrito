<!DOCTYPE html>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/estilos_login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
    <title>Catalogo</title>
</head>
<body>
    <div class="mt-4 ms-4">
        <?php
        if (isset($_GET["usuario"])) {
            $usuario = $_GET["usuario"];
        } else {
            $usuario = "";
        }
        ?>
        <h1 class="text-center mb-3 me-5">Store</h1>
        <div class="text-center mb-5 ms-5 justify-content-center">
            <a href="login.php"><input type="button" value="Login" class="btn border-3 btn-dark shadow-sm me-5"></a>
            <a href="cesta.php"><input type="button" value="Acceder al carrito" class="btn border-3 btn-dark shadow-sm me-5"></a>
            <a href="logout.php"><input type="button" value="Cerrar sesión" class="btn border-3 btn-dark shadow-sm me-5"></a>
        </div>
        <div class="d-flex flex-wrap justify-content-center justify-content-around me-4 mb-5">
            <?php
                include "funciones.php";
                $productos = getProductos();
                foreach ($productos as $producto) {
                    echo '<div class="border border-1 rounded p-4 shadow mt-3">';
                    echo '<a href= detalle.php?id='.$producto["id"].'><img class="mb-2" height=225px src = imagenes/'.$producto["imagen"].'></a><br>';
                    echo '<div class="row text-center">';
                    echo '<div class="col">';
                    echo '<p>'.$producto["nombre"].'</p>';
                    echo '</div>';
                    echo '<div class="col">';
                    echo '<p>'.$producto["precio"].'$</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="row">';
                    echo '<div class="col text-center">';
                    echo '<a href= cesta.php?id='.$producto["id"].'><img height=25px src="iconos/shopping-cart.png"></a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            ?>
        </div>
    </div>
</body>
</html>
