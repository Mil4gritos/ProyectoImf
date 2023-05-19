<?php
//Conexión con la base de datos
class Conexion
{

    //private $server = '127.0.0.1';
    //private $username = 'root';
    //private $password = '0Lucifer';
    //private $database = 'proyectoDawSql';
    //private $db = mysqli_connect($server,$username,$password,$database);


    //Consulta codificacion caracteres

    public static function conectar()
    {
        $db = new mysqli('127.0.0.1', 'root', '0Lucifer', 'proyectoDawSql');
        $db->query(("SET NAMES 'utf8'"));

        return $db;
    }
    //Inicia la sesión
    public static function session()
    {

        return session_start();
    }
};
