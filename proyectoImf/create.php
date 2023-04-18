<?php require_once 'includes/headerYesRegister.php'; ?>
<?php require_once 'includes/libraryPhp.php'; ?>

<section>

    <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
        <div class="container">
            <div class="row gx-lg-5 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h1 class="my-5 display-3 fw-bold ls-tight">
                        Añade una nueva entrada<br />
                    </h1>
                    <p style="color: hsl(217, 10%, 50.8%)">
                        Introduzca los datos del siguiente formulario
                        para agregar un nuevo registro en su
                        base de datos.
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0">

                    <div class="card">
                        <div class="card-body py-5 px-md-5">

                            <form method="POST" action="createRequest.php" enctype="multipart/form-data">

                                <div class="row">
                                    <!-- Nombre input -->
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="nameForm">Nombre</label>
                                            <input type="text" name="nameForm" class="form-control" />

                                        </div>

                                    </div>
                                    <!-- Edad input -->
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="yearForm">Edad</label>
                                            <input type="date" name="yearForm" class="form-control" />

                                        </div>

                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="typeForm">Raza</label>
                                        <input type="text" name="typeForm" class="form-control" />

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
                                    <label class="form-label" for="ImageForm">Imagen</label>
                                    <input type="file" name="ImageForm" class="form-control" />

                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="descriptionForm">Descripción</label>
                                    <textarea name="descriptionForm" class="form-control"></textarea>

                                </div>

                                <!--Se muestran avisos-->
                                <?php if (isset($_SESSION['complete'])) : ?>
                                    <p class="alert-exito"><?= $_SESSION['complete'] ?></p>
                                <?php elseif (isset($_SESSION['errors']['general'])) : ?>
                                    <p class="alert-error"><?= $_SESSION['errors']['general'] ?></p>
                                <?php endif; ?>



                                <!--Se muestran avisos si hay algún error-->
                                <?php if (isset($_SESSION['errors']['nameForm'])) : ?>
                                    <p class="alert-error"><?= $_SESSION['errors']['nameForm'] ?></p>
                                <?php endif; ?>

                                <?php if (isset($_SESSION['errors']['yearForm'])) : ?>
                                    <p class="alert-error"><?= $_SESSION['errors']['yearForm'] ?></p>
                                <?php endif; ?>
                                <?php if (isset($_SESSION['errors']['typeForm'])) : ?>
                                    <p class="alert-error"><?= $_SESSION['errors']['typeForm'] ?></p>
                                <?php endif; ?>


                                <?php if (isset($_SESSION['errors']['gender'])) : ?>
                                    <p class="alert-error"><?= $_SESSION['errors']['gender'] ?></p>
                                <?php endif; ?>

                                <?php if (isset($_SESSION['errors']['ImageForm'])) : ?>
                                    <p class="alert-error"><?= $_SESSION['errors']['ImageForm'] ?></p>
                                <?php endif; ?>

                                <?php if (isset($_SESSION['errors']['descriptionForm'])) : ?>
                                    <p class="alert-error"><?= $_SESSION['errors']['descriptionForm'] ?></p>
                                <?php endif; ?>


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