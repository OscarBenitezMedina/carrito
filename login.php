<!DOCTYPE html>

<html lang="es">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/estilos_login.css">
    <title>Login</title>
</head>
<body class="text-center">
    <?php 
        include "funciones.php";

        if(isset($_REQUEST["login"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
            if(empty($_POST["name"])){
                $errores[] = "El nombre es requerido";
            }
            if(empty($_POST["password"])){
                $errores[] = "La contraseña es requerida";
            }
            if(empty($errores)) {
                $usuario = filtrado($_POST["name"]);
                $clave = filtrado($_POST["password"]);
                if (usuarioValido($usuario, $clave)) {
                    session_start();
                    $_SESSION["usuario"] = $usuario;
                    header("Location: index.php");
                } else {
                    echo "<script>alert(\"Nombre de usuario o contraseña incorrectos!!\")</script>";
                }
            }
        }

        if(isset($errores)){
                    foreach ($errores as $error){
                        echo "<li>$error</li>";
                    }
                }
    ?>

    <div class="container">
        <div class="justify-content d-flex">
            <div class="card">
                <div class="card-header">
                    <h1>Login</h1>
                </div>
                <div class="card-body">
                    <form id="basic-form" action="login.php" method="POST">
                        <div class="input-group form-group mb-3">
                            <input id="name" name="name" type="text" class="form-control" placeholder = "Usuario">
                        </div>
                        <div class="input-group form-group mt-3">
                            <input id="password" type="password" name="password" class="form-control" placeholder = "Contraseña">
                        </div>
                        <div class="form-group mt-3 p-5">
                             <button  type="submit" name="login" class="btn border-2 me-3">Login</button>
                        </div>
                        <div class="input-group">
                            <?php
                                if(isset($errores)){
                                    foreach ($errores as $error){
                                        echo "<li>$error</li>";
                                    }
                                }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>