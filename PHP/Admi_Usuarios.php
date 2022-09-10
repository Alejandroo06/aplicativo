<?php

    session_start();

    if(!isset($_SESSION['administrador'])){
        echo '
            <script>
                alert("Por favor inice sesión");
                window.location = "../Login.php"
            </script>    
        ';
        session_destroy();
        die();
    }

    include 'conexion.php';
    //SELECT * FROM usuarios
    $sql="SELECT * FROM usuarios";
    $resultado=mysqli_query($conexion,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Miscelanea Isabella</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/ADMI/Admi_Usuarios.css">
    <script type="text/JavaScript">
        function confirmar(){
            return confirm('¿Estas seguro de eliminar este Usuario?, se eliminaran todos los datos');
        }
    </script>
</head>
<body>
   <nav class="menu">
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <a href="../Administrador.php" class="enlace">
            <img src="../IMG/Miscelanea.jpg" alt="" class="logo">
        </a>
        <ul>
            <li><a href="#">administrar usuarios</a></li>
            <li><a href="#">administrar pedidos</a></li>
            <li><a href="Inventario.php">inventario</a></li>
            <li><a href="Cerrar_Sesion.php">cerrar sesion</a></li>
        </ul>
        
    </nav>


    <h1>LISTA DE USUARIOS</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Primer Nombre</th>
            <th>Segundo Nombre</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th> 
            <th>Documento</th>
            <th>Correo</th>
            <th>Celular</th>
            <th>Dirección</th>
        </tr>
        <tbody>
            <?php 
                while($fila=mysqli_fetch_assoc($resultado)){
            
            ?>
            <tr>
                <td><?php echo $fila['id'] ?></td>
                <td><?php echo $fila['primer_nombre'] ?></td>
                <td><?php echo $fila['segundo_nombre'] ?></td>
                <td><?php echo $fila['primer_apellido'] ?></td>
                <td><?php echo $fila['segundo_apellido'] ?></td>
                <td><?php echo $fila['documento'] ?></td>
                <td><?php echo $fila['correo'] ?></td>
                <td><?php echo $fila['celular'] ?></td>
                <td><?php echo $fila['dirección'] ?></td>
                <td >
                    <div class="jk"><?php echo "<a href='Eliminar.php?id=".$fila['id']."' onclick='return confirmar()'>ELIMINAR</a>";?></div>

                </td>
            </tr>
            <?php 
                }
            ?>

            </tbody>
    </table>
    

    
</body>
</html>