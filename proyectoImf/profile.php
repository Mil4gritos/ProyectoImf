<?php require_once 'includes/headerYesRegister.php'; ?>
<?php require_once 'includes/libraryPhp.php'; ?>
<!--Sessión-->
<?php Conexion::session();?>


<section >

  <div id="container-items" class="px-4 py-5 px-md-5 text-center text-lg-start">
    <div class="container" id="container" style="background-color: rgba(0,0,0,.03);">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0" id="divTexto">
          <h2 class="my-5 display-3 ls-tight">
            Mis datos<br />
            <span class="text-primary"></span>
          </h2>
          <p style="color: hsl(217, 10%, 50.8%)">
            Rellene este formulario para actualizar sus datos.
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">

          <div class="card">
            <div class="card-body py-5 px-md-5">

              <form method="POST" action="profilePost.php">

                <div class="row">
                  <!-- Nombre input -->
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <label class="form-label" for="nameForm">Nombre</label>
                      <input type="text" name="nameForm" class="form-control" value="<?= $_SESSION['usuario']['nombre']; ?>" />

                    </div>

                  </div>
                  <!-- Apellidos input -->
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <label class="form-label" for="surnameForm">Apellidos</label>
                      <input type="text" name="surnameForm" class="form-control" value="<?= $_SESSION['usuario']['apellidos']; ?>" />


                    </div>

                  </div>

                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="emailForm">Email</label>
                  <input type="email" name="emailForm" class="form-control" value="<?= $_SESSION['usuario']['email']; ?>" />


                </div>



                <!--Se muestran avisos si hay algún error-->
                <?php if (isset($_SESSION['complete'])) : ?>
                  <p class="alert-exito"><?= $_SESSION['complete'] ?></p>

                <?php elseif (isset($_SESSION['errors']['general'])) : ?>
                  <p class="alert-error"><?= $_SESSION['errors']['general'] ?></p>

                <?php endif; ?>

                   <!--Se muestran avisos si hay algún error-->
                <?php if (isset($_SESSION['errors']['nameForm'])) : ?>
                  <p class="alert-error"><?= $_SESSION['errors']['nameForm'] ?></p>
                <?php endif; ?>

                <?php if (isset($_SESSION['errors']['surnameForm'])) : ?>
                  <p class="alert-error"><?= $_SESSION['errors']['surnameForm'] ?></p>
                <?php endif; ?>
                <?php if (isset($_SESSION['errors']['emailForm'])) : ?>
                  <p class="alert-error"><?= $_SESSION['errors']['emailForm'] ?></p>
                <?php endif; ?>




                <!-- Submit button -->

                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block mb-4">
                  Actualizar
                </button>
              </form>
              <!--Borrado de errores para que no se queden almacenados-->
              <?php LibraryPhp::deleteError(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>


<?php require_once 'includes/footer.php'; ?>