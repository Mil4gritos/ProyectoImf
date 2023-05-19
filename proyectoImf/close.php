<?php
require_once 'includes/conexion.php';
Conexion::session();

if (isset($_SESSION['usuario'])) {
    session_destroy();
}
header("Location:login.php");
