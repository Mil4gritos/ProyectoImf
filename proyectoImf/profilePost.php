<?php

 
//Comprobación de que llegan los datos del formulario
if (isset($_POST)) {

//Establecemos coxexión solo si tengo datos mediante post
 require_once 'includes/conexion.php';
 //Sesión
Conexion::session();
 //Conexión database
$db=Conexion::conectar();

 //Incluyo archivo de funciones php ibraryPhp.php
 require_once 'includes/libraryPhp.php';

   

    //Se recogen los valores del formulario de registro
    //Con mysqli_real_escape_string escapo los datos tomando los datos como string por si hubiera comillas 
    //Así evito que den errores en la bbdd, también por seguridad

    $name = isset($_POST['nameForm']) ? mysqli_real_escape_string($db,$_POST['nameForm']) : false;
    $surname = isset($_POST['surnameForm']) ? mysqli_real_escape_string($db,$_POST['surnameForm']) : false;
    $email = isset($_POST['emailForm']) ? mysqli_real_escape_string($db,trim($_POST['emailForm'])) : false;
    


    //Array de errores del formulario 
    $errors = array();


    //Validar datos antes de guardarlos en la base de datos

    //Nombre
    if (!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)) {

        $ValidateN = true;
    } else {
        $ValidateN = false;
        $errors['nameForm'] = "El nombre no es válido";
    }
    //Apellidos
    if (!empty($surname) && !is_numeric($surname) && !preg_match("/[0-9]/", $surname)) {

        $ValidateS = true;
    } else {
        $ValidateS = false;
        $errors['surnameForm'] = "Los apellidos no son validos";
    }
    //Email
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $ValidateE = true;
    } else {
        $ValidateE = false;
        $errors['emailForm'] = "El email no es válido";
    }
    
    //Comprobación de que no existe ningún error antes de grabar en la base de datos

    $addUser = false;
    if (count($errors) == 0) {

        $user =$_SESSION['usuario'];
        
        $sqlUpdate = "UPDATE usuarios SET ".
        "nombre = '$name',".
        "apellidos = '$surname',".
        "email = '$email'".
        "WHERE id = ".$user['id'];

        //S comprueba que el email no está registrado en la bbdd

        
        $sql="SELECT id,email FROM usuarios WHERE email='$email'";
        
        $isset_Email= mysqli_query($db,$sql);
        $isset_user= mysqli_fetch_assoc($isset_Email);

        if($isset_user['id']==$user['id'] || empty($isset_user)){

        //UPDATE USUARIO EN LA TABLA USUARIOS DE LA BBDD

        $update = mysqli_query($db, $sqlUpdate);
     

        if ($update) {
            $_SESSION['usuario']['nameForm']=$name;
            $_SESSION['usuario']['surnameForm']=$surname;
            $_SESSION['usuario']['emailForm']=$email;

            $_SESSION['complete'] = "Tus datos se han actualizado correctamente";
            
            header('Location:profile.php');

        } else {
            $_SESSION['errors']['general'] = "Error al actulizar tus datos";
        
        }
    }else{
        $_SESSION['errors']['general'] = "El usuario ya existe";
    }
  
    } else {
        $_SESSION['errors'] = $errors;

        header('Location:profile.php');
    }
}
