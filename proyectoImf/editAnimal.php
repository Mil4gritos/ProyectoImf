<?php require_once 'includes/headerYesRegister.php'; ?>
<?php require_once 'includes/libraryPhp.php'; ?>

<?php
    //Listamos/mostramos los animales de la bbdd tabla animales
    $detail_animals = detailAnimals($db, $_GET['id']);
  
    ?>

<section class="">

    <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
        <div class="container">
            <div class="row gx-lg-5 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h1 class="my-5 display-3 ls-tight">
                        Editando la ficha de: <br />
<?=$detail_animals['nombre']?></h1>
                    <p style="color: hsl(217, 10%, 50.8%)">
                      Rellene los campos del siguiente formulario
                      para actualizar los datos de este animal.
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0">

                    <div class="card">
                        <div class="card-body py-5 px-md-5">

                            <form method="POST" action="createRequest.php?Edit=<?=$detail_animals['id']?>" enctype="multipart/form-data">

                                <div class="row">
                                    <!-- Nombre input -->
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="form3Example1">Nombre</label>
                                            <input type="text" name="form3Example1" class="form-control" value="<?=$detail_animals['nombre']?>"/>

                                        </div>

                                    </div>
                                    <!-- Edad input -->
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="form3Example2">Edad</label>
                                            <input type="date" name="form3Example2" class="form-control" value="<?=$detail_animals['edad']?>"/>


                                        </div>

                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3">Raza</label>
                                        <input type="text" name="form3Example3" class="form-control" value="<?=$detail_animals['raza']?>"/>


                                    </div>

                                </div>

                                <!-- Género input -->
                                <div class="form-outline mb-4">
                                    <select class="form-select" aria-label="Default select example" name="gender">
                                        <option selected>Seleccione el género del animal</option>
                                        <option value="Hembra">Hembra</option>
                                        <option value="Macho">Macho</option>
                                    </select>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example5">Imagen</label>
                                    <input type="file" name="form3Example5" class="form-control"/>

                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example6">Descripción</label>
                                    <textarea name="form3Example6" class="form-control"><?=$detail_animals['descripcion']?></textarea>

                                </div>

                                <!--Se muestran avisos si hay algún error-->
                                <?php if (isset($_SESSION['complete'])) : ?>
                                    <p class="alert alert-exito"><?= $_SESSION['complete'] ?></p>
                                <?php elseif (isset($_SESSION['errors'])) : ?>
                                    <p class="alert alert-error"><?= $_SESSION['errors']?></p>
                                <?php endif; ?>

                                <?php echo isset($_SESSION['errors']) ? errorAlert($_SESSION['errors'], 'form3Example1') : ''; ?>
                                <?php echo isset($_SESSION['errors']) ? errorAlert($_SESSION['errors'], 'form3Example2') : ''; ?>
                                <?php echo isset($_SESSION['errors']) ? errorAlert($_SESSION['errors'], 'form3Example3') : ''; ?>
                                <?php echo isset($_SESSION['errors']) ? errorAlert($_SESSION['errors'], 'gender') : ''; ?>
                                <?php echo isset($_SESSION['errors']) ? errorAlert($_SESSION['errors'], 'form3Example5') : ''; ?>
                                <?php echo isset($_SESSION['errors']) ? errorAlert($_SESSION['errors'], 'form3Example6') : ''; ?>

                                <!-- Submit button -->

                                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block mb-4">
                                    Guardar
                                </button>

                            </form>
                            <!--Borrado de errores para que no se queden almacenados-->
                            <?php deleteErrorCreate(); ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jumbotron -->
</section>
<?php require_once 'includes/footer.php'; ?>