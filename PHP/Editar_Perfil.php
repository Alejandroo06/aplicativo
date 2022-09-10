<?php 

    include 'conexion.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Miscelanea Isabella</title>
    <link href="../CSS/Editar_Perfil.css" rel="stylesheet">
</head>
<body>


    
    <nav class="menu">
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <a href="../Usuario.php" class="enlace">
            <img src="../IMG/Miscelanea.jpg" alt="" class="logo">
        </a>
        <ul>    
            <h1>editar Perfil</h1>
        </ul> 
    </nav>
    <main>
        <form action="Proceso_Editar.php?id=<?php echo $fila['id'] ?>" method="POST">
            <br>
            <h2>editar perfil</h2>

            <input type="text" placeholder="Primer Nombre" name="primer_nombre">
            <input type="text" placeholder="Segundo Nombre" name="segundo_nombre">
            <input type="text" placeholder="Primer Apellido" name="primer_apellido">
            <input type="text" placeholder="Segundo Apellido" name="segundo_apellido">
            <input type="text" placeholder="Documento" name="documento">
            <input type="text" placeholder="Correo" name="correo">
            <input type="text" placeholder="Celular" name="celular">
            <input type="text" placeholder="Direccion" name="direccion">
            <input type="text" placeholder="Contraseña" name="contrasena">
            <button type="submit">actualizar perfil</button>
            <br>
            <br>
            <li ><a class="col" href="../Usuario.php">VOLVER</a></li>
        </form>
        
            
    </main>
    
</body>
</html>