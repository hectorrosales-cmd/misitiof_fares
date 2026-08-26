<?php
/*
    Archivo: eliminarcli.php

    Recibe el id del cliente por GET (desde frmcliente.php)
    y hace uso de la clase modificarcliente para eliminarlo.
*/

require_once 'manipularcli.php';

if (isset($_GET["id"]) && !empty($_GET["id"])) {

    $id = (int) $_GET["id"];

    modificarcliente::eliminar($id);

    header('Location: frmcliente.php?msg=eliminado');
    die();
}

header('Location: frmcliente.php');
die();
?>
