<?php require_once 'includes/conexion.php'; 
//Conexión database
$db=Conexion::conectar();?>
<?php require_once 'includes/headerYesRegister.php' ?>


<?php

if (isset($_GET['id'])) {
    
    $detail_animals = LibraryPhp::detailAnimals($db, $_GET['id']);

?>

    <!-- Jumbotron -->
    <div id="containerHome">
        <div class="container" id="card-header">

            <div class="card text-center">
                <div class="card-header" id="usuarioLogueado">
                    <h2>Se ha borrado la ficha de : <?= $detail_animals['nombre'] ?></h2>
                </div> <!--principal-->
               
            </div>
        </div>

    </div>
    <?php require_once 'includes/footer.php' ?>


    <?php


    $deleteAnimal_id = LibraryPhp::delete($db, $_GET['id']);
    
    ?>

<?php
    die();
}

header("Location: animales.php");

?>


