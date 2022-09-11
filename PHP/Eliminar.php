<?php 

    $id =  $_GET['id'];
    include 'conexion.php';

    $sql="DELETE FROM usuarios WHERE id='".$id."'";
    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
        echo "<script languaje='JavaScript'>
                alert ('El usuario se elimino correctamente de la Base de Datos');
                window.location = 'Admi_usuarios.php'
             </script>";
    } 
    else{
        echo "<script languaje='JavaScript'>
            alert ('Los datos NO se eliminaron de la Base de Datos');
            window.location = 'Admi_usuarios.php'
        </script>";
    }   

?>