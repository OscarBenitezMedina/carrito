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
    <div>
        <?php
        if (isset($_GET["usuario"])) {
            $usuario = $_GET["usuario"];
        } else {
            $usuario = "";
        }
        ?>
        <h1>Catálogo</h1>
        <div>
            <a href="login.php"><input type="button" value="Login" class="btn border-2"></a>
            <a href="cesta.php"><input type="button" value="Acceder al carrito" class="btn border-2"></a>
        </div>
        <div>
            <?php
                include "funciones.php";
                $productos = getProductos();
                foreach ($productos as $producto) {
                    echo '<div>';
                    echo '<a href= detalle.php?id='.$producto["id"].'><img height=225px src = imagenes/'.$producto["imagen"].'></a><br>';
                    echo $producto["nombre"].'<br>';
                    echo '<a href= cesta.php?id='.$producto["id"].'><img height=25px src="iconos/shopping-cart.png"></a>';
                    echo '</div>';
                }
            ?>
        </div>
    </div>
</body>
</html>
