<?php

//Comprobación de que llegan los datos del formulario
if (isset($_POST)) {

    //Establecemos coxexión solo si tengo datos mediante post
    require_once 'includes/conexion.php';
    require_once 'includes/libraryPhp.php';
    //require_once 'create.php';


}


//Se recogen los valores del formulario de registro
//Con mysqli_real_escape_string escapo los datos tomando los datos como string por si hubiera comillas 
//Así evito que den errores en la bbdd, también por seguridad
$name = isset($_POST['nameForm']) ? mysqli_real_escape_string($db, trim($_POST['nameForm'])) : false;
$age = isset($_POST['yearForm']) ? mysqli_real_escape_string($db, trim($_POST['yearForm'])) : false;
$species = isset($_POST['typeForm']) ? mysqli_real_escape_string($db, trim($_POST['typeForm'])) : false;
$gender = isset($_POST['gender']) ? mysqli_real_escape_string($db, $_POST['gender']) : false;
$description = isset($_POST['descriptionForm']) ? mysqli_real_escape_string($db, trim($_POST['descriptionForm'])) : false;

//Array de errores del formulario 
$errors = array();

//VALIDACIONES//

//Nombre
if (!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)) {

    $ValidateN = true;
} else {
    $ValidateN = false;
    $errors['nameForm'] = "El nombre no es válido";
}

//Edad
if (empty($age)) {

    $ValidateA = false;
    $errors['yearForm'] = "Debe seleccionar la fecha de nacimiento aproximada del animal";
}

//Especie
if (!empty($species) && !is_numeric($species) && !preg_match("/[0-9]/", $species)) {

    $ValidateS = true;
} else {

    $ValidateS = false;
    $errors['typeForm'] = "La raza no es válida";
}

//VALIDAR RADIOS GENERO

//Género
if (empty($gender)) {

    $ValidateG = false;
    $errors['gender'] = "Debe seleccionar el género del animal";
}

//Imagen

$img =  $_FILES['ImageForm'];
$nameImg = $img['name'];
$type = $img['type'];
$temp = $img['tmp_name'];
$full_path = $img['full_path'];
$uploadImg = '/Applications/XAMPP/xamppfiles/htdocs/proyectoImf/images/';
$addImg = $uploadImg . $nameImg;




if (empty($img)) {

    $errors['ImageForm'] = "Debe introducir una imagen del animal";
} else {

    if ($type == "image/jpg" || $type == "image/jpeg" ||  $type == "image/gif" || $type == "image/png") {

        if (!file_exists($uploadImg)) {

            mkdir($uploadImg, 0777, true);

            move_uploaded_file($temp, $addImg);
           

        } else {
            move_uploaded_file($temp, $addImg);
        }


        $img = mysqli_real_escape_string($db, $nameImg);
        // $_SESSION['complete'] = "Registro completado con éxito";

    } else {

        $errors['ImageForm'] = "Formatos permitidos (jpg; jpeg; gif; png)";
    }
}

//Descripción
if (empty($description)) {

    $ValidateD = false;
    $errors['descriptionForm'] = "Debe introducir una descripción";
}



//Comprobación de que no existe ningún error antes de grabar en la base de datos

$addAnimal = false;
if (count($errors) == 0) {

    if (isset($_GET['Edit'])) {

        $animalId = $_GET['Edit'];

        $sql = "UPDATE animales SET
         nombre = '$name',
         edad ='$age',
         raza ='$species',
         sexo ='$gender',
         foto ='$img',
         descripcion ='$description' WHERE id ='$animalId'";

        $update = mysqli_query($db, $sql);

        if ($update) {

            $addAnimal = true;
            $_SESSION['complete'] = "Los datos se han editado correctamente";

        } else {
            $_SESSION['errors'] = $errors;
            header('Location:editAnimal.php');
        }
    } else {

        $sql = "INSERT INTO animales VALUES(NULL,'$name','$age','$species','$gender','$img','$description')";


        //INSERT EN LA TABLA ANIMALES DE LA BBDD

        $insert = mysqli_query($db, $sql);

        if ($insert) {
          $addAnimal = true;
            $_SESSION['complete'] = "Los datos se han insertado correctamente";
            header('Location:create.php');
            
         
        } else {
            $_SESSION['errors'] = $errors;
            header('Location:create.php');
        }
    }


   
    $_SESSION['complete'] = "Los datos se han insertado correctamente";
    header('Location:create.php');

} else {

    $_SESSION['errors'] = $errors;
   
    header('Location:create.php');
   
}
