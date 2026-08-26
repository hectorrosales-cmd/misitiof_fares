<?php
/*
    Archivo: frmeditarcliente.php

    Recibe el id del cliente por GET (desde frmcliente.php),
    busca sus datos con modificarcliente::buscar()
    y muestra un formulario precargado que envía los cambios
    a actualizarcli.php
*/

require_once 'manipularcli.php';

if (!isset($_GET["id"]) || empty($_GET["id"])) {
    header('Location: frmcliente.php');
    die();
}

$id = (int) $_GET["id"];

$cliente = modificarcliente::buscar($id);

if (!$cliente) {
    header('Location: frmcliente.php');
    die();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Ediciones Fares - Editar cliente</title>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="contenedor-principal">

    <!-- ENCABEZADO -->
    <header class="encabezado">

        <h1>Ediciones Fares</h1>

    </header>


    <!-- MENÚ -->
    <nav class="menu">

        <a href="frmcliente.php">Principal</a>

        <a href="#">Libros</a>

        <a href="#">Inventario</a>

        <a href="#">Contacto</a>

    </nav>


    <!-- CONTENIDO -->
    <main class="contenido">

        <div class="clientes-contenedor">

            <!-- FORMULARIO DE EDICIÓN -->
            <form class="formulario-cliente"
                  action="actualizarcli.php"
                  method="post">

                <div class="titulo-formulario">

                    Editar datos del cliente

                </div>


                <div class="formulario-contenido">


                    <div class="form-row">

                        <div class="form-group col-md-4">

                            <label>Código</label>

                            <input type="text"
                                   name="ccodigo"
                                   class="form-control"
                                   value="<?php echo $cliente['idcli']; ?>"
                                   readonly>

                        </div>


                        <div class="form-group col-md-8">

                            <label>Nombre</label>

                            <input type="text"
                                   name="cnombre"
                                   class="form-control"
                                   value="<?php echo htmlspecialchars($cliente['nomcli']); ?>"
                                   required>

                        </div>

                    </div>


                    <div class="form-group">

                        <label>Dirección</label>

                        <textarea name="cdireccion"
                                  class="form-control"
                                  rows="3"><?php echo htmlspecialchars($cliente['direccion']); ?></textarea>

                    </div>


                    <div class="form-row">

                        <div class="form-group col-md-6">

                            <label>Teléfono residencial</label>

                            <input type="text"
                                   name="ctelresi"
                                   class="form-control"
                                   value="<?php echo htmlspecialchars($cliente['telres_cli']); ?>">

                        </div>


                        <div class="form-group col-md-6">

                            <label>Celular</label>

                            <input type="text"
                                   name="ctelcel"
                                   class="form-control"
                                   value="<?php echo htmlspecialchars($cliente['telcel_cli']); ?>">

                        </div>

                    </div>


                    <div class="form-group">

                        <label>Email</label>

                        <input type="email"
                               name="cemail"
                               class="form-control"
                               value="<?php echo htmlspecialchars($cliente['email_cli']); ?>">

                    </div>


                    <button type="submit"
                            name="actualizar"
                            class="btn btn-fares">

                        Actualizar

                    </button>

                    <a href="frmcliente.php" class="btn btn-secondary">

                        Cancelar

                    </a>

                </div>

            </form>

        </div>

    </main>


    <!-- PIE -->
    <footer class="pie">

        Ediciones Fares

    </footer>


</div>

</body>

</html>
