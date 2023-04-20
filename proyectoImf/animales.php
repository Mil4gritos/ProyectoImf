<?php require_once 'includes/headerYesRegister.php'; ?>
<?php require_once 'includes/libraryPhp.php'; ?>


<div class="row container-fluid p-5 justify-content-center" id="tableData">

    <?php
    //Listamos/mostramos los animales de la bbdd tabla animales
    $animals = listAnimals($db);
    $nummberItems = 10;
    $pageInitial = 1;
   
    //Comprobacion de que el array que nos mostrará los animales no está vacío
    if (!empty($animals)) : foreach ($animals as $animal) : ?>


            <div class="card m-4" style="width: 18rem;" onmouseover="zoom(this)" onmouseout="outZoom(this)">
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

    <?php endforeach;
    endif; ?>
   



    <!--Paginació<n-->

    <nav aria-label="Page navigation ">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
           
            
            <li class="page-item">
                <a class="page-link">Next</a>
            </li>
        </ul>
    </nav>
</div>
<?php require_once 'includes/footer.php'; ?>