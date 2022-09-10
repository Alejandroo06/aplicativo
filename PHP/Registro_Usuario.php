<?php 
    
    include 'conexion.php';

    $primer_nombre = $_POST['primer_nombre'];
    $segundo_nombre = $_POST['segundo_nombre'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $documento = $_POST['documento'];
    $correo= $_POST['correo'];
    $celular = $_POST['celular'];
    $direccion = $_POST['direccion'];   
    $contrasena = $_POST['contrasena'];

    //contraseña oculta
    //$contrasena = hash('sha512', $contrasena);

    $query = "INSERT INTO usuarios(primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, documento, correo, celular, dirección, contrasena) 
            VALUES('$primer_nombre', '$segundo_nombre', '$primer_apellido', '$segundo_apellido', '$documento', '$correo', '$celular', '$direccion', '$contrasena')";
    
    //verificación de documento

    $verificar_documento = mysqli_query($conexion, "SELECT * FROM usuarios WHERE documento = '$documento' ");

    if(mysqli_num_rows($verificar_documento) > 0){
        echo'
            <script>
                alert("Este documento ya esta registrado, por favor intentarlo de nuevo");
                window.location = "../Login.php";
            </script>
        ';
        exit();
    }

    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo' ");

    if(mysqli_num_rows($verificar_correo) > 0){
        echo'
            <script>
                alert("Este correo ya esta registrado, por favor intentarlo de nuevo");
                window.location = "../Login.php";
            </script>
        ';
        exit();
    }

    $verificar_celular = mysqli_query($conexion, "SELECT * FROM usuarios WHERE celular = '$celular' ");

    if(mysqli_num_rows($verificar_celular) > 0){
        echo'
            <script>
                alert("Este celular ya esta registrado, por favor intentarlo de nuevo");
                window.location = "../Login.php";
            </script>
        ';
        exit();
    }

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script>
               alert("Te has registrado correctamente");
               window.location = "../Login.php";
            </script>   
        ';
    }else{
        echo '
        <script>
           alert("Por favor intentalo de nuevo");
           window.location = "../Login.php";
        </script>   
        ';
    }

    

?>

