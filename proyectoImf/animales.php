<?php require_once 'includes/headerYesRegister.php'; ?>
<?php require_once 'includes/libraryPhp.php'; ?>

<div class="row container-fluid p-5 justify-content-center">

    <?php
    //Listamos/mostramos los animales de la bbdd tabla animales
    $animals = listAnimals($db);
    //Comprobacion de que el array que nos mostrará los animales no está vacío
    if (!empty($animals)) : while ($animal = mysqli_fetch_assoc($animals)) : ?>


            <div class="card m-4" style="width: 18rem;">
                <!--Aquí guardo la imagen que suba el usuario-->
                <img class="card-img-top p-2" src="images/<?php echo $animal['foto']; ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?= $animal['nombre'] ?></h5>
                    <p>Raza: <?= $animal['raza'] ?></p>
                    <p>Edad: <?= $animal['edad'] ?></p>
                    <p>Sexo: <?= $animal['sexo'] ?></p>
                  
                </div>
                
                <!--Ruta del animal más su id para ver la ficha de este animal-->
                <a href="detailAnimal.php?id=<?= $animal['id'] ?>">
                    <button type="submit" name="submit" class="btn btn-secondary btn-lg btn-block mb-4">
                        Ver Ficha
                    </button></a>
            </div>

    <?php endwhile;
    endif; ?>

</div>
<?php require_once 'includes/footer.php'; ?>