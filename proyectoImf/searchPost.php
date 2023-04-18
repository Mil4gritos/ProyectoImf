<?php require_once 'includes/headerYesRegister.php'; ?>
<?php require_once 'includes/libraryPhp.php'; ?>

<?php

if (!isset($_POST['search'])) {

    header("Location:animales.php");
} 

?>


<div class="row container-fluid p-5 justify-content-center">

    <?php

    //Listamos/mostramos los animales de la bbdd tabla animales
    $animals = searchAnimal($db, $_POST['search']);
    //Comprobacion de que el array que nos mostrará los animales no está vacío
    if (!empty($animals)) : while ($animal = mysqli_fetch_assoc($animals)) : ?>


            <div class="card" style="width: 18rem;">
                <!--Aquí guardo la imagen que suba el usuario-->
                <img class="card-img-top p-2" src="images/<?php echo $animal['foto']; ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?= $animal['nombre'] ?></h5>
                    <p>Raza: <?= $animal['raza'] ?></p>
                    <p>Edad: <?= $animal['edad'] ?></p>
                    <p>Sexo: <?= $animal['sexo'] ?></p>

                </div>
                <a href="detailAnimal.php?id=<?= $animal['id'] ?>">
                    <button type="submit" name="submit" class="btn btn-secondary btn-lg btn-block mb-4">
                        Ver Ficha
                    </button></a>
            </div>

        <?php endwhile;
       
     endif; 
      //Comprobacion de que el array que nos mostrará los animales no está vacío
    if (empty($animals)):?>


            <div class="card">
                <!--Aquí guardo la imagen que suba el usuario-->
            
                <div class="card-body">
                <h5 class="card-title">El animal no existe en la base de datos</h5>
                </div>
              
            </div>

     
       
        <?php endif; ?>




</div>
<?php require_once 'includes/footer.php'; ?>