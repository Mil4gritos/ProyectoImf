<?php require_once 'conexion.php' ?>
<?php require_once 'includes/libraryPhp.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald&family=Roboto+Condensed:wght@400&display=swap" rel="stylesheet">
    <link href="style/style.css" rel="stylesheet" integrity="" crossorigin="anonymous">
    <link href="style/queries.css" rel="stylesheet" integrity="" crossorigin="anonymous">
    <link  rel="icon" href="images/favicon.png" type="image/png" />
    <title>GestAnimal</title>
</head>

<body>
<div class="containerGeneral">
    <header>

        <nav class="navbar navbar-expand-md">
            <div class="container-fluid">

            <img src="images/GestAnimal-removebg-preview (2).png" class="logo" alt="Imagen logotipo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="layYesRegister.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="animales.php">Animales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="create.php">Gestión</a>
                        </li>
                    </ul>

                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="profile.php">Mi perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="close.php">Cerrar Sesión</a>
                    </ul>
                </div>

            </div>
        </nav>

    </header>
  

    <?php require_once 'includes/search.php' ?>
   