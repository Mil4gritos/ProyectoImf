<?php

//Iniciar sesión y conexión a bd
include require_once 'includes/conexion.php';


//Recogemos los datos del formulario

if (isset($_POST)) {

    //Borro las sesiones anteriores con algún error

    if(isset($_SESSION['error_login'])){
        session_unset($_SESSION['error_login']);
    }

    //si no tenemos sesión la establecemos
    if (!isset($_SESSION)) 
        session_start();
    }

    //Recogemos el dato email en la variable email, con trim limpio los espacios
    $email = trim($_POST['emailForm']);
    //Recogemos el dato password en la variable pass
    $pass = $_POST['passForm'];

    //Consulta para comprobar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";

    //query con la conexion a la bbdd y la consulta
    $loginQuery = mysqli_query($db, $sql);

    if ($loginQuery && mysqli_num_rows($loginQuery) == 1) {

        /*    while($usuario = mysqli_fetch_assoc($loginQuery)){
            var_dump($usuario);
        
            echo '<br>'.$usuario['nombre'].'<br>';
            echo $usuario['apellidos'];
        }
*/

        $usuario = mysqli_fetch_assoc($loginQuery);
        

        //Comporbación de contraseña 
        $passVerify = password_verify($pass, $usuario['password']);

        if ($passVerify) {

            //Sesión con datos de usuario logueado
            $_SESSION['usuario'] = $usuario;

            header('location:layYesRegister.php');
          
        } else {
            //fallos enviar sesion con fallo
            $_SESSION['error_login'] = "Login incorrecto";
              header('Location:login.php');
        }
    } else {
        //mensaje de error
        $_SESSION['error_login']= "Login incorrecto";
          header('Location:login.php');
    }

//redirigir al index
//header('location:layConRegistro.php');
