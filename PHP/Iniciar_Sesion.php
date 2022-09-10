<?php

    session_start();

    include 'conexion.php';

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $validar_admi = mysqli_query($conexion, "SELECT * FROM administrador WHERE correo = '$correo' and contrasena = '$contrasena'" );
    $validar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo' and contrasena = '$contrasena'" );

    if(mysqli_num_rows ($validar_admi = $validar_admi) ){
        $_SESSION['administrador'] = $correo;
        header("location: ../Administrador.php"); 

        exit();
    }
    else if(mysqli_num_rows ($validar_usuario = $validar_usuario)){
        $_SESSION['usuarios'] = $correo;
        header("location: ../Usuario.php");

        exit();
    } 
    else{
        echo'
            <script>
                alert("El usuario no existe, por favor ingresar los datos correctamente");
                window.location = "../Login.php"
            </script>

        ';
        exit();
    }

    
    

?>