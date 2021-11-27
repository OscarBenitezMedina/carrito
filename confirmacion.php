<!DOCTYPE html>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/estilo_confirmacion.css">
    <title>Confirmación</title>
</head>
<body>
    <div class="d-flex flex-row">
        <div class="ms-5 mt-3 contenedor">
            <h2>Formulario de tramitación de compra</h2>
            <form action="fin_compra.php" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="name" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="password" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="direction" class="form-label">Dirección:</label>
                    <input type="text" class="form-control" id="direction" required>
                </div>
                <div class="mb-3">
                    <label for="tarjeta" class="form-label">Nº de tarjeta:</label>
                    <input type="text" class="form-control" id="tarjeta" required>
                </div>
                <div class="mb-3">
                    <label for="CVV" class="form-label">CVV:</label>
                    <input type="text" class="form-control" id="CVV" required>
                </div>
                <input type="submit"  onclick="location." class="btn border-3 btn-dark shadow-sm mt-3" name="comprar" value="comprar"/>
                <a href="index.php"><input type="button" value="Volver" class="btn border-3 btn-dark shadow-sm mt-3 ms-3"></a>
            </form>
        </div>
        <div class="ms-5 mt-5 d-flex flex-wrap">
            <?php
                $total = [];
                echo '<ul class="list-group text-start">';
                include "funciones.php";
                $productos = getProductos();
                session_start();
                $carrito = $_SESSION;
                foreach ($carrito as $key => $value) {
                    if ($key != $_SESSION["usuario"]) {
                        foreach ($productos as $producto) {
                            if ($producto["id"] == $key) {
                                echo '<li class="list-group-item">';
                                echo '<div class="d-flex justify-content-start">';
                                echo '<div class="me-3">';
                                echo '<img height=50px src = imagenes/'.$producto["imagen"].'>';
                                echo '</div>';
                                echo $producto["nombre"].'<br>';
                                echo "Cantidad: ".$value;
                                $total_producto = costeProducto($producto["precio"], $_SESSION[$producto["id"]]);
                                array_push($total, $total_producto);
                                echo '</li>';
                            } 
                        }
                            
                    }
                }
                $compra = totalCompra($total);
                echo '<li class="list-group-item">Total: '.$compra.'$</li>';
                echo '</ul>';
                
            ?>
        </div>
    </div>
</body>