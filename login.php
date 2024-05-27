<?php
    session_start();
    require_once "config/conexion.php";

    $usuario = $_POST['usuario'];
    $password = $_POST['clave'];

    $password = hash('sha512', $password);

    $query= mysqli_query($conexion, "SELECT * FROM clientes WHERE usuario = '$usuario' and clave = '$password'");
    
    if (mysqli_num_rows($query) > 0)
    {
        $_SESSION['usuario']= $usuario;
        header("Location: home.php");
        exit;
       
    }
    else
    {
        echo '
            <script>
                alert("EL USUARIO NO EXISTE");
                window.location = "login.html";
            </script>
        '; 
        exit;
    }

    

?>
