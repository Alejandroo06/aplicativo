<?php 
    
    include 'conexion.php';

    $nombre_producto = $_POST['nombre_producto'];
    $cantidad = $_POST['cantidad'];
    $descripción = $_POST['descripción'];
    $foto=addslashes(file_get_contents($_FILES['foto']['tmp_name']));
    $categorias = $_POST['categorias'];
    $sub_categorias = $_POST['sub_categorias'];
    $precio = $_POST['precio']; 
   
    $query = "INSERT INTO producto(nombre_producto, cantidad, descripción,foto, categorias, sub_categorias, precio) 
                VALUES('$nombre_producto', '$cantidad', '$descripción','$foto', '$categorias', '$sub_categorias', '$precio')";
    $ejecutar = mysqli_query($conexion,$query);


    if($ejecutar){
        echo '
            <script>
               alert("Has registrado el producto");
               window.location = "Inventario.php";
            </script>   
        ';
    }else{
        echo '
        <script>
           alert("Por favor intentalo de nuevo");
           window.location = "Registro_Producto.php";
        </script>   
        ';
    }

    mysqli_close($Conexion);


   

   
?>