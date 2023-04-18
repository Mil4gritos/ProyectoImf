<?php require_once 'includes/headerYesRegister.php' ?>
<?php require_once 'includes/libraryPhp.php' ?>

<?php if (isset($_SESSION['usuario'])) : ?>

  
    <!-- Jumbotron -->
    <div id="containerHome" >
      <div class="container" id="card-header">

        <div class="card text-center">
          <div class="card-header" id="usuarioLogueado">
            <h2>Bienvenido, <?= $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellidos']; ?></h2>
          </div> <!--principal-->
          <div class="card-body">
           
            <p class="card-text">Seleccione una opción del menú superior</p>
            <img src="images/GestAnimal-removebg-preview (2).png" alt="Imagen logotipo">

          </div>
        </div>
      </div>

      <?php endif; ?>

     
     


      <?php require_once 'includes/footer.php' ?>
    