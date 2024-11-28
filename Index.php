<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9028645a2a.js" crossorigin="anonymous"></script>
    <style>
        .btn-small {
            padding: 5px 10px;
            font-size: 0.8rem;
        }
        form {
    background-color: #f8f9fa; 
    padding: 10px;
    border-radius: 8px; 
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}
    </style>
</head>
<body>
    <h1 class="text-center">Crud Personas</h1>
    <div class="container-fluid row" >
        <form class="col-4 p-3" method="POST">
            <h3 class="text-center text-secondary">Registrar de Personas</h3>
            <?php
                include "modelo/conexion.php";
                include "controlador/registro.php";

                // Cargar datos para editar
                if (isset($_GET['edit'])) {
                    $id = $_GET['edit'];
                    $result = $conexion->query("SELECT * FROM personas WHERE ID = $id");
                    $row = $result->fetch_object();
                }
            ?>
            <div class="mb-3" >
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= isset($row) ? $row->Nombre : '' ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellido" value="<?= isset($row) ? $row->Apellidos : '' ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Sexo</label>
                <input type="text" class="form-control" name="sexo" value="<?= isset($row) ? $row->Sexo : '' ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fecha" value="<?= isset($row) ? $row->Fecha_nac : '' ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo</label>
                <input type="email" class="form-control" name="correo" value="<?= isset($row) ? $row->Correo : '' ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
            <button type="submit" class="btn btn-success" name="btnGuardar" value="ok">Guardar</button>
            <input type="hidden" name="id" value="<?= isset($row) ? $row->ID : '' ?>">
        </form>
        <div class="col-8 p-4" >
            <table class="table">
                <thead class="bg-info">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Fecha Nacimiento</th>
                        <th scope="col">Correo</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "modelo/conexion.php";
                    $sql = $conexion->query("SELECT * FROM personas");
                    while ($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <td><?= $datos->ID ?></td>
                            <td><?= $datos->Nombre ?></td>
                            <td><?= $datos->Apellidos ?></td>
                            <td><?= $datos->Sexo ?></td>
                            <td><?= $datos->Fecha_nac ?></td>
                            <td><?= $datos->Correo ?></td>
                            <td class="text-center">
                                <a href="?edit=<?= $datos->ID ?>" class="btn btn-warning btn-small"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                                <a href="?delete=<?= $datos->ID ?>" class="btn btn-danger btn-small"><i class="fa-solid fa-trash"></i> Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>