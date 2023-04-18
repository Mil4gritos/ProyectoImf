<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/headerYesRegister.php' ?>


<?php

if(isset($_GET['id'])){

    $deleteAnimal_id = $_GET['id'];
    
    $sql = "DELETE FROM animales WHERE id = $deleteAnimal_id";
   
    $delete_animal = mysqli_query($db, $sql);
    $result = array();
        echo "Se ha borrado la ficha";

       
    die();
}

header ("Location: animales.php");


?>





<?php require_once 'includes/footer.php' ?>

