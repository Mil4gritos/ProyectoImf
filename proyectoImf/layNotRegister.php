<!--NO SE USA, PERO DEJO EL CÓDIGO POR SI QUIERO REUTILIZARLO -->

<?php require_once 'includes/headerNotRegister.php'; ?>
<?php require_once 'includes/loginPost.php'; ?>

<?php Conexion::session();?>

<?php if(isset($_SESSION['usuario'])) : ?>
<div class="block">
    <h2><?=$_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidos'];?></h2>
</div>
<?php endif;?>
<?php require_once 'includes/footer.php';?>