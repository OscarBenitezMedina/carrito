<!DOCTYPE html>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/estilos_login.css">
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

            echo '<div>';
            echo '<img height=225px src = imagenes/'.$producto["imagen"].'><br>';
            echo $producto["nombre"].'<br>';
            echo $producto["id"].'<br>';
            echo '<a href= cesta.php?id='.$producto["id"].'><img height=25px src="iconos/shopping-cart.png"></a>';
            echo '</div>';
        }
        ?>
        <a href="index.php"><input type="button" value="Volver" class="btn border-2"></a>
    </div>
</body>