<?php require_once 'includes/headerNotRegister.php'; ?>
<?php require_once 'includes/libraryPhp.php'; ?>
<!--Sessión-->
<?php Conexion::session();?>

<section>
    <!-- Jumbotron -->
    <div id="container-items" class="px-4 py-5 px-md-5 text-center text-lg-start" >
        <div class="container" id="container" style="background-color: rgba(0,0,0,.03);">
            <div class="row gx-lg-5 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h1 class="my-5 display-3 ls-tight">
                        Iniciar sesión<br />
                       
                    </h1>
                    <p id="color">
                        Ingrese sus datos en el formulario para ingresar en la aplicación
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card">
                        <div class="card-body py-5 px-md-5">
                            <form method="POST" action="loginPost.php">
                                <!-- 2 column grid layout with text inputs for the first and last names -->

                                <?php if (isset($_SESSION['error_login'])) : ?>
                                        <p class="alert-error"><?= $_SESSION['error_login'] ?></p>
                                    <?php endif; ?>

                                <!-- Email input -->
                                    <div class="form-outline mb-4">
                                    <label class="form-label" for="emailForm">Email</label>
                                        <input type="email" name="emailForm" class="form-control" required />
                                      
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                    <label class="form-label" for="passForm">Contraseña</label>
                                        <input type="password" name="passForm" class="form-control" required />
                                       
                                    </div>

                                  
                                   
                                    <!-- Submit button -->

                                    

                                    <button type="submit" class="btn btn-primary btn-block mb-4">
                                        Acceder
                                    </button>

                            </form>
                            <?php LibraryPhp::deleteError(); ?>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Jumbotron -->
</section>
<!-- Section: Design Block --><?php require_once 'includes/footer.php' ?>