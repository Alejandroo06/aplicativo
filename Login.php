<?php 

    session_start();

    if(isset($_SESSION['administrador'])){
        header("location: Administrador.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Register</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/Diseño-Login.css" >


</head>
<body>

        <main>


            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">Regístrarse</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form action="PHP/Iniciar_Sesion.php" method="POST" class="formulario__login">
                        <h2>Iniciar Sesión</h2>
                        <input type="text" placeholder="Correo Electronico" name="correo">
                        <input type="password" placeholder="Contraseña" name="contrasena">
                        <button>Entrar</button>
                    </form>

                    <!--Register-->
                    <form action="PHP/Registro_Usuario.php" method="POST" class="formulario__register">
                        <h2>Regístrarse</h2>
                        <input type="text" placeholder="Primer Nombre" name="primer_nombre" required>
                        <input type="text" placeholder="Segundo Nombre" name="segundo_nombre">
                        <input type="text" placeholder="Primer Apellido" name="primer_apellido" required>
                        <input type="text" placeholder="Segundo Apellido" name="segundo_apellido">
                        <input type="text" placeholder="Documento" name="documento" required>
                        <input type="text" placeholder="Correo Electronico" name="correo" required>
                        <input type="text" placeholder="Celular" name="celular" required>
                        <input type="text" placeholder="Dirección" name="direccion" required>
                        <input type="password" placeholder="Contraseña" name="contrasena" required>
                        <button>Regístrarse</button>
                    </form>
                </div>
            </div>

        </main>

        <script src="JS/script.js"></script>
</body>
</html>