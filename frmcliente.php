<?php
require_once 'manipularcli.php';

$clientes = modificarcliente::listar();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ediciones Fares</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="contenedor-principal">

    <header class="encabezado">
        <h1>Ediciones Fares</h1>
    </header>

    <nav class="menu">
        <a href="frmcliente.php">Principal</a>
        <a href="#">Libros <i class="fa-solid fa-caret-down"></i></a>
        <a href="#">Inventario <i class="fa-solid fa-caret-down"></i></a>
        <a href="#">Contacto</a>
    </nav>

    <main class="contenido">

        <?php if (isset($_GET["msg"]) && $_GET["msg"] == "actualizado") { ?>
            <div class="alert alert-success p-2 small">Cliente actualizado correctamente.</div>
        <?php } ?>

        <?php if (isset($_GET["msg"]) && $_GET["msg"] == "eliminado") { ?>
            <div class="alert alert-danger p-2 small">Cliente eliminado correctamente.</div>
        <?php } ?>

        <div class="clientes-contenedor">

            <form class="formulario-cliente" action="guardarcli.php" method="post">
                <div class="titulo-formulario">Ingresar datos del cliente</div>
                <div class="formulario-contenido">
                    
                    <div class="form-group mb-2">
                        <label>Nombre</label>
                        <input type="text" name="cnomcliente" class="form-control form-control-sm" placeholder="Nombre del cliente" required>
                    </div>

                    <div class="form-group mb-2">
                        <label>Dirección</label>
                        <textarea name="cdireccion" class="form-control form-control-sm" rows="2" placeholder="Dirección"></textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 mb-2">
                            <label>Teléfono residencial</label>
                            <input type="text" name="ctelcasa" class="form-control form-control-sm" placeholder="Teléfono residencial">
                        </div>
                        <div class="form-group col-md-6 mb-2">
                            <label>Celular</label>
                            <input type="text" name="ccelular" class="form-control form-control-sm" placeholder="Teléfono celular">
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input type="email" name="cemail" class="form-control form-control-sm" placeholder="Correo electrónico">
                    </div>

                    <button type="submit" name="guardar" class="btn btn-fares">Guardar</button>
                </div>
            </form>

            <div class="clientes-registrados">
                <table class="table tabla-clientes">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th class="text-center">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($clientes) > 0) { ?>
                            <?php foreach ($clientes as $cliente) { ?>
                                <tr>
                                    <td><?php echo $cliente["idcli"]; ?></td>
                                    <td><?php echo htmlspecialchars($cliente["nomcli"]); ?></td>
                                    <td class="acciones">
                                        <a href="frmeditarcliente.php?id=<?php echo $cliente['idcli']; ?>" class="btn-accion btn-modificar" title="Editar">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <a href="eliminarcli.php?id=<?php echo $cliente['idcli']; ?>" class="btn-accion btn-eliminar" title="Eliminar" onclick="return confirm('¿Desea eliminar este cliente?');">
                                            <i class="fa-solid fa-user-xmark"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="3" class="text-center">No hay clientes registrados.</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>

    </main>

    <footer class="pie">
        Ediciones Fares
    </footer>

</div>

</body>
</html>