<?php

class LibraryPhp
{


    //Función para mostrar aviso en el registro cuando los datos no son válidos

    public static function errorAlert($errors, $field)
    {
        $alert = '';
        if (isset($errors[$field]) && !empty($field)) {
            $alert = "<p>" . $errors[$field] . "</p";
        }
        return $alert;
    }

    //función para borrar los errores

    public static function deleteError()
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
        //Si hay errores borro la sesión
        if (isset($_SESSION['error_login'])) {

            $_SESSION['error_login'] = null;

            $delete = true;
        }

        return $delete;
    }

    //Función Query para listar los animales de la bbdd
    public static function listAnimals($conexion)
    {
        $nummberItems = 3;
        $pageInitial = 1;


        if (isset($_GET['page'])) {
            $pageInitial = $_GET['page'];
        } else {
            $pageInitial = 1;
        }

        $sql = "SELECT * FROM animales LIMIT " . (($pageInitial  - 1) * $nummberItems) . "," . $nummberItems;

        $animals = mysqli_query($conexion, $sql);

        $result = array();

        if ($animals && mysqli_num_rows($animals) >= 1) {

            $result = $animals;
        }

        return $result;
    }

    //Función para contar los registros

    public static function countAnimals($conexion)
    {

        // Cuento el número total de registros

        $sqlCount = "SELECT count(*) as num_animales FROM animales";

        //Ejecuto la consulta
        $maxItems = mysqli_query($conexion, $sqlCount);

        //Recojo el total de los registros
        $dataTotal = array();

        $dataTotal = mysqli_fetch_assoc($maxItems)['num_animales'];

        return $dataTotal;
    }



    //Función para mostrar los datos completos de la ficha del animal 
    public static function detailAnimals($conexion, $id)
    {

        $sql = "SELECT * FROM animales WHERE id = $id";

        $detail_animals = mysqli_query($conexion, $sql);
        $result = array();

        if ($detail_animals && mysqli_num_rows($detail_animals) >= 1) {

            $result = mysqli_fetch_assoc($detail_animals);
        }
        return $result;
    }

    //Función eliminar de la bd
    public static function delete($db, $id)
    {
        $sql = "DELETE FROM animales WHERE id = $id";

        $delete_animal = mysqli_query($db, $sql);
        $result = array();



        $result = $delete_animal;


        return $result;
    }





    //Función para borrar los errores del formulario de nuevos registros 

    public static function deleteErrorCreate()
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

    public static function searchAnimal($conexion, $seach_animals = null)
    {


        if (!empty($seach_animals)) {

            $sql = "SELECT * FROM animales WHERE nombre LIKE '%$seach_animals%' ORDER BY id ASC";

            $animals = mysqli_query($conexion, $sql);
            $result = array();

            if ($animals && mysqli_num_rows($animals) >= 1) {

                $result = $animals;
            }

            return $result;
        }
    }
};
