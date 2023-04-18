<?php

//Función para mostrar aviso en el registro cuando los datos no son válidos

function errorAlert($errors, $field)
{
    $alert = '';
    if (isset($errors[$field]) && !empty($field)) {
        $alert = "<p>" . $errors[$field] . "</p";
    }
    return $alert;
}

//función para borrar los errores

function deleteError()
{
    $delete = false;

    if (isset($_SESSION['errors'])) {
        $_SESSION['errors'] = null;
        $delete=true;
    }

    if (isset($_SESSION['complete'])) {
        $_SESSION['complete'] = null;
        $delete=true;
    }
    //Si hay errores borro la sesión
    if (isset($_SESSION['error_login'])) {

        $_SESSION['error_login'] = null;

        $delete=true;
    }

    return $delete;
}

//Query para listar los animales de la bbdd
function listAnimals($conexion)
{
    $sql = "SELECT * FROM animales ORDER BY id ASC"; 

    $animals = mysqli_query($conexion, $sql);
    $result = array();

    if ($animals && mysqli_num_rows($animals) >= 1) {

        $result = $animals;
    }

    return $result;
}

//Función para mostar los datos comletos de la ficha del animal 
function detailAnimals($conexion,$id,$seach_animals = null)
{
    $sql = "SELECT * FROM animales WHERE id = $id";

    $detail_animals = mysqli_query($conexion, $sql);
    $result = array();

    if ($detail_animals && mysqli_num_rows($detail_animals) >= 1) {

        $result = mysqli_fetch_assoc($detail_animals);
    }

    return $result;
}


//Función para borrar los errores del formulario de nuevos registros 

function deleteErrorCreate()
{
    $delete = false;

    if (isset($_SESSION['errors'])) {
        $_SESSION['errors'] = null;
        $delete = true;
    }

    if (isset($_SESSION['complete'])) {
        $_SESSION['complete'] = null;
        $delete = true;
    }

    return $delete;
}







//Función para buscar

function searchAnimal($conexion,$seach_animals = null){


    if(!empty($seach_animals)){

    $sql = "SELECT * FROM animales WHERE nombre LIKE '%$seach_animals%' ORDER BY id ASC";

    $animals = mysqli_query($conexion, $sql);
    $result = array();
    
    if ($animals && mysqli_num_rows($animals) >= 1) {

        $result = $animals;
    }

    return $result;
}

}