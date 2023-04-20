<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/headerYesRegister.php' ?>


<?php

if (isset($_GET['id'])) {
    //Listamos/mostramos los animales de la bbdd tabla animales
    $detail_animals = detailAnimals($db, $_GET['id']);

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


    $deleteAnimal_id = $_GET['id'];
    $sql = "DELETE FROM animales WHERE id = $deleteAnimal_id";

    $delete_animal = mysqli_query($db, $sql);
    $result = array();
    ?>

<?php
    die();
}

header("Location: animales.php");

?>


