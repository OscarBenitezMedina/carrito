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
                $carrito = $_SESSION;
                foreach ($carrito as $key => $value) {
                    if ($key != $_SESSION["usuario"]) {
                        foreach ($productos as $producto) {
                            if ($producto["id"] == $key) {
                                echo '<div>';
                                echo '<a href= detalle.php?id='.$producto["id"].'><img height=225px src = imagenes/'.$producto["imagen"].'></a><br>';
                                echo $producto["nombre"].'<br>';
                                echo "Cantidad: ".$value;
                                echo '<a href= cesta.php?id='.$producto["id"].'&valor=poner>Poner</a><br>';
                                echo '<a href= cesta.php?id='.$producto["id"].'&valor=borrar>Quitar</a>';
                                $total_producto = costeProducto($producto["precio"], $_SESSION[$producto["id"]]);
                                echo 'Total: '.$total_producto.'$<br>';
                                echo '</div>';
                                array_push($total, $total_producto);
                            } 
                        }
                        
                    }
                }
                if (count($carrito) > 1) {
                    $compra = totalCompra($total);
                    echo 'Total de la compra: '.$compra.'$<br>';
                    $gastosEnvio = $compra + 5;
                    if ($compra > 100 ) {
                        $gastosEnvio = $compra;
                    }
                    echo 'Compra + gastos de envío: '.$gastosEnvio.'$';
                    echo '<a href= confirmacion.php>Tramitar compra</a>';
                } else {
                    echo 'El carrito está vacío';
                }
                    
            } else {
                    echo "Para añadir artículos al carrito inicie sesión"; 
                }
            ?>
        <a href="index.php"><input type="button" value="Volver" class="btn border-2"></a>
        
    </div>
</body>
</html>
