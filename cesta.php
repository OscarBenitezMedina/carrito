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
            $productos = getProductos();
            session_start();
        ?>
        <?php
            if (isset($_SESSION["usuario"])) {
                $carrito = $_SESSION;
                print_r($carrito);
                foreach ($carrito as $articulo) {
                    if ($articulo != $_SESSION["usuario"]) {
                        foreach ($productos as $producto) {
                            if ($producto["id"] == $articulo) {
                                 echo '<div>';
                                echo '<a href= detalle.php?id='.$producto["id"].'><img height=225px src = imagenes/'.$producto["imagen"].'></a><br>';
                                echo $producto["nombre"].'<br>';
                                echo '<button  type="submit" name="borrar" class="btn border-2 me-3">borrar</button>';
                                echo '</div>';
                            } 
                        }
                        if (isset($_GET["borrar"])) {
                            #unset($_SESSION[]);
                        }
                    }
                }
            
            } else {
                echo "Para añadir artículos al carrito inicie sesión";
            }
            
            ?>
        <a href="index.php"><input type="button" value="Volver" class="btn border-2"></a>
        
    </div>
</body>

