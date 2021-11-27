<!DOCTYPE html>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/estilo_detalle.css">
    <title>Cesta</title>
</head>
<body>
    <div>
        <?php
            include "funciones.php";
        ?>

        <?php
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $producto = getProducto($id);
            echo '<div class="text-center mt-4 contenedor">';
            echo '<h1 class="mb-4">'.$producto["nombre"].'</h1>';
            echo '<img class="mb-3" height=225px src = imagenes/'.$producto["imagen"].'><br>';
            echo '<p>Especificaciones:</p>';
            echo '<ul class="list-group mb-3 text-start">';
            echo '<li class="list-group-item">Código: '.$producto["id"].'</li>';
            if (isset($producto["pantalla"])) {
                echo '<li class="list-group-item">Pantalla: '.$producto["pantalla"].'</li>';
            }
            echo '<li class="list-group-item">Precio: '.$producto["precio"].'$</li>';
            echo '</ul>';
            echo '<a href= cesta.php?id='.$producto["id"].'><img height=25px src="iconos/shopping-cart.png"></a>';
            echo '</div>';
        }
        ?>

        <a href="index.php"><input type="button" value="Volver" class="btn border-3 btn-dark shadow-sm mt-3 ms-5"></a>
    </div>
</body>