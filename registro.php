<?php

    require_once "config/conexion.php"; 

    $nombre = $_POST['nombre'];
    $email = $_POST['correo'];
    $us = $_POST['usuario'];
    $password = $_POST['clave'];

    //Encriptar Contraseña
    $password= hash('sha512', $password);

    $query = "INSERT INTO clientes(nombre, email, usuario, clave) VALUES ('$nombre', '$email', '$us', '$password')"; 

    //verificar que los datos no se repitan en BD.

    $verificar_correo= mysqli_query($conexion, "SELECT * FROM clientes WHERE email='$email'");
    if(mysqli_num_rows($verificar_correo) > 0 ){
       echo '
            <script>
                alert("ESTE CORREO YA SE ENCUENTRA REGISTRADO, POR FAVOR INGRESE OTRO CORREO");
                window.location="login.html";
            </script> 
       ';
       exit();
    }

    $verificar_us= mysqli_query($conexion, "SELECT * FROM clientes WHERE usuario ='$us'");
    if(mysqli_num_rows($verificar_us) > 0 ){
       echo '
            <script>
                alert("ESTE USUARIO YA SE ENCUENTRA REGISTRADO, POR FAVOR INGRESE UN USUARIO DISTINTO");
                window.location="login.html";
            </script> 
       ';
       exit();
    }

    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar){
        echo '<script> alert("USUARIO REGISTRADO EXITOSAMENTE")
        window.location="login.html"; </script>';

    } else {
        echo '<script> alert("OOPS! OCURRIO UN ERROR INTENTALO DE NUEVO")
        window.location="login.html"; </script>';
    }

    mysqli_close($conexion);
?>
