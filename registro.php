<?php
if (!empty($_POST["btnregistrar"]) || !empty($_POST["btnGuardar"])) {
    // Verificar si se está editando un registro
    if (!empty($_POST["id"])) {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $sexo = $_POST["sexo"];
        $fecha = $_POST["fecha"];
        $correo = $_POST["correo"];

        // Actualizar el registro
        $sql = $conexion->query("UPDATE personas SET Nombre='$nombre', Apellidos='$apellido', Sexo='$sexo', Fecha_nac='$fecha', Correo='$correo' WHERE ID=$id");

        if ($sql) {
            echo '<div class="alert alert-success"> Registro actualizado exitosamente</div>';
        } else {
            echo '<div class="alert alert-danger"> Error al actualizar el registro</div>';           
        }
    } else {
        // Código para registrar un nuevo registro
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $sexo = $_POST["sexo"];
        $fecha = $_POST["fecha"];
        $correo = $_POST["correo"];

        $sql = $conexion->query("INSERT INTO personas(Nombre, Apellidos, Sexo, Fecha_nac, Correo) VALUES ('$nombre', '$apellido', '$sexo', '$fecha', '$correo')");

        if ($sql) {
            echo '<div class="alert alert-success"> Registro exitoso</div>';
        } else {
            echo '<div class="alert alert-danger"> Error al registrar</div>';           
        }
    }
}

// Manejo de eliminación
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conexion->query("DELETE FROM personas WHERE ID = $id");
    header("Location: index.php"); // Redirigir a la página principal después de eliminar
    exit();
}
?>