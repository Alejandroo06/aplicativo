<?php

    session_start();

    if(!isset($_SESSION['usuarios'])){
        echo '
            <script>
                alert("Por favor inice sesión");
                window.location = "Login.php"
            </script>    
        ';
        session_destroy();
        die();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Miscelanea Isabella</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/Diseño-Admi.css">
   

</head>
<body>
   <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <a href="#" class="enlace">
            <img src="IMG/Miscelanea.jpg" alt="" class="logo">
        </a>
        <ul>
            <li><a href="#">productos</a></li>
            <li><a href="#">anchetas</a></li>
            <li><a href="#">%ofertas</a></li>
            <li><a href="PHP/Editar_Perfil.php">perfil</a></li>
            <li><a href="PHP/Cerrar_Sesion.php">cerrar sesion</a></li>
        </ul>
    </nav>
    <section></section>
</body>
</html>