<?php require_once 'includes/headerYesRegister.php'; ?>
<?php require_once 'includes/libraryPhp.php'; ?>
<div class="row container-fluid p-5 justify-content-center">

    <?php
    //Conexión database
$db=Conexion::conectar();

    //Listamos/mostramos los animales de la bbdd tabla animales
    $detail_animals = LibraryPhp::detailAnimals($db, $_GET['id']);


    if (!isset($detail_animals['id'])) {
        header("Location:animales.php");
    }
    ?>

    <section>
        <div class="container" id="container" style="background-color: rgba(0,0,0,.03);">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <h2 >Ficha de:
                   <strong> <?= $detail_animals['nombre'] ?></strong>
                </h2>

            </div>
            <div class="card block p-4" id="container-detail">
                <div class="col-lg-8 mb-2" id="imgDeatil">
                    <img class="card-img-top p-2"  src="images/<?php echo $detail_animals['foto']; ?>" alt="Card image cap">

                </div>

                <div class="col-lg-8 mb-4">
                    <ul class="row p-4">
                        <li><strong class>Raza:</strong> <?= $detail_animals['raza'] ?></li>
                        <li><strong class>Edad: </strong> <?= $detail_animals['edad'] ?></li>
                        <li><strong class>Sexo: </strong> <?= $detail_animals['sexo'] ?></li>
                    
                        <li id="description"><strong class="col-md-6 mb-4" >Descripción: </strong> <?= $detail_animals['descripcion'] ?></p>
                    </ul>
                </div>


                <div class="col-4-md-6 mb-4 p-2">
                    <a href="editAnimal.php?id=<?= $detail_animals['id'] ?>">
                        <button id="btnDetail" type="submit" name="submit" class="btn btn-secondary btn-lg btn-block mb-4">
                            Editar Ficha
                        </button></a>
                    <a href="deleteAnimal.php?id=<?= $detail_animals['id'] ?>">
                        <button id="btnDetail" type="submit" name="submit" class="btn btn-secondary btn-lg btn-block mb-4">
                            Eliminar Ficha
                        </button></a>



                </div>
            </div>

        </div>
    </section>
</div>

<?php require_once 'includes/footer.php'; ?>