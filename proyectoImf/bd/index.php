<?php

echo "<h1>holaaaaa</h1>";


//Conectar a la bd


$conexion = mysqli_connect("127.0.0.1","root","0Lucifer","proyectoDawSql");

//Comprobar si hay conexion

if(mysqli_connect_errno()){

    echo "Error en la conexión de la bd".mysqli_connect_error();

}else{

    echo "Conexión establecida";
}
//Consulta codificacion caracteres

mysqli_query($conexion,"SET NAMES 'utf8'");

//consulta select desde php

$query =mysqli_query($conexion,"SELECT * FROM usuarios");

echo"<br>";       //recorre las filas de la bd
while($usuario = mysqli_fetch_assoc($query)){
    var_dump($usuario);

    echo '<br>'.$usuario['nombre'].'<br>';
    echo $usuario['apellidos'];
}

//insert en la bd desde php
$sql= "INSERT INTO usuarios VALUES (NULL,'Andrés','Lopez','andres@yahoo.es','holaMundo')";

$insert = mysqli_query($conexion,$sql);

if($insert){

    echo "datos insertados";
}else{

    echo "error:".mysqli_connect_error($conexion);
}