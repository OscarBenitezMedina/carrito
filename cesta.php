<!DOCTYPE html>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/estilo_cesta.css">
    <title>Cesta</title>
</head>
<body>
    <div>
        <div class="mt-3 text-center">
            <h1>Carrito de la compra</h1>
        </div>
        <?php
            include "funciones.php";
            $productos = getProductos();
            session_start();
            $total = [];
        ?>
        <?php
            if (isset($_SESSION["usuario"])) {
                if (isset($_GET['id'])) {
                    $nuevo = $_GET['id'];
                    
                    if (!isset($_SESSION[$nuevo])) {
                        $_SESSION[$nuevo] = 1;
                    }
                    else {
                        $accion = $_GET['valor'];
                        if ($accion == 'poner') {
                        ++$_SESSION[$nuevo];
                        } else {
                            --$_SESSION[$nuevo];
                        }
                        if ($_SESSION[$nuevo] == 0) {
                            unset($_SESSION[$nuevo]);
                        }
                    }  
                }
                echo '<div class="d-flex justify-content-start flex-wrap">';
                $carrito = $_SESSION;
                foreach ($carrito as $key => $value) {
                    if ($key != $_SESSION["usuario"]) {
                        foreach ($productos as $producto) {
                            if ($producto["id"] == $key) {
                                echo '<div class="d-flex justify-content-start mb-3 ms-3 contenedor">';
                                echo '<div class="me-3 contenedor_imagen">';
                                echo '<img height=225px src = imagenes/'.$producto["imagen"].'>';
                                echo '</div>';
                                echo '<div class="mt-3 border rounded border-2 border-dark p-3 contenedor_mini text-center">';
                                echo $producto["nombre"].'<br>';
                                echo "Cantidad: ".$value.'<br>';
                                echo "<div class='mt-1 mb-1'>";
                                echo '<a href= cesta.php?id='.$producto["id"].'&valor=poner><img class="me-3" height=25px src="iconos/boton-circular-plus.png"></a>';
                                echo '<a href= cesta.php?id='.$producto["id"].'&valor=borrar><img height=25px src="iconos/minus.png"></a><br>';
                                echo "</div>";
                                $total_producto = costeProducto($producto["precio"], $_SESSION[$producto["id"]]);
                                echo 'Total: '.$total_producto.'$<br>';
                                echo '</div>';
                                echo '</div>';
                                array_push($total, $total_producto);
                            } 
                        }
                        
                    }
                }
                echo "</div>";
                if (count($carrito) > 1) {
                    $compra = totalCompra($total);
                    echo '<div class=" mt-5 ms-5">';
                    echo '<div class="border rounded border-2 border-dark p-3 contenedor text-center">';
                    echo 'Total de la compra: '.$compra.'$<br>';
                    $gastosEnvio = $compra + 5;
                    if ($compra > 100 ) {
                        $gastosEnvio = $compra;
                    }
                    echo 'Compra + gastos de envío: '.$gastosEnvio.'$ <br>';
                    echo '</div>';
                    echo '<div class="text-center mb-3">';
                    echo '<a href= confirmacion.php><input type="button" class="btn border-3 btn-dark shadow-sm mt-3 me-3" value="Tramitar compra"></a>';
                } else {
                    echo '<div class="ms-3">';
                    echo 'El carrito está vacío';
                    echo '</div>';
                }
                    
            } else {
                    echo '<div class="ms-3">';
                    echo "<p>Para añadir artículos al carrito inicie sesión</p>"; 
                    echo '</div>';
                }
            ?>
                    <a href="index.php"><input type="button" value="Volver" class="btn border-3 btn-dark shadow-sm mt-3"></a>
                </div>
            </div>
    </div>
</body>
</html>
