<?php require_once 'includes/headerYesRegister.php'; ?>
<?php require_once 'includes/libraryPhp.php'; ?>

<div class="row container-fluid p-5 justify-content-center" id="tableData">

    <?php
    //Listamos/mostramos los animales de la bbdd tabla animales
    $animals = listAnimals($db);
    $dataTotal = countAnimals($db);
    $paginaInit = 1;
    $nummberItems = 3;

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
            <?php

            // Si existe el parametro page
            if (isset($_GET['page'])) {
                $paginaInit = $_GET['page'];
                //Si no lo inicio en 1
            } else {
                $paginaInit = 1;
            };

            if ($paginaInit > 1) {
            ?>
                <li class="page-item disabled">
                    <a href="animales.php?page=<?php echo $_GET['page'] - 1; ?>"><button class="btn btn-primary btn-lg btn-block mb-4">Anterior</button></a>

                <?php
                // Sino deshabilito el botón
            } else { ?>
                    <a href="#"><button disabled class="btn btn-primary btn-lg btn-block mb-4">Anterior</button></a>
                <?php }
                ?>
                <?php

                // Si existe la paginacion 
                if (isset($_GET['page'])) {
                 
                    // Si el numero de registros actual no es superior al maximo
                    if ((($paginaInit) * $nummberItems) < $dataTotal) {
                ?>
                <li class="page-item">
                    <a href="animales.php?page=<?php echo $_GET['page'] + 1; ?>"><button class="btn btn-primary btn-lg btn-block mb-4">Siguiente</button></a>
                <?php
                        // Sino deshabilito el botón
                    } else {
                ?>
                    <a href="#"><button disabled class="btn btn-primary btn-lg btn-block mb-4">Siguiente</button></a>
                <?php
                    }
                ?>

            <?php
                    // Sino deshabilito el botón
                } else {
                    $paginaInit = 1;
            ?>
                <a href="animales.php?page=1"><button class="btn btn-primary btn-lg btn-block mb-4">Siguiente</button></a>
                </li>
            <?php
                }
            ?>



        </ul>
    </nav>
</div>
<?php require_once 'includes/footer.php'; ?>