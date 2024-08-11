<?php
include 'conexion.php';

if (isset($_GET['id']) || isset($_POST['id'])) {
    $id = $_GET['id'] ?? $_POST['id'];

    $query = "SELECT * FROM data WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $item = mysqli_fetch_assoc($result);

        $description = $item['description'];
        $document = $item['document'];
        $image = $item['image'];
    }
}

//Si se dio click en el botón Eliminar
if (isset($_POST['delete'])) {
    if (!empty($_POST['id'])) {

        $id = $_POST['id'];

        //Eliminamos el archivo del servidor
        $eliminar_documento = "uploads/documents/$document";
        unlink($eliminar_documento);

        //Eliminamos la imagen del servidor
        $eliminar_imagen = "uploads/images/$image";
        unlink($eliminar_imagen);

        // Eliminamos el registro de la base de datos
        $query = " DELETE FROM data WHERE id = $id";

        //Si se eliminó de la base de datos el resultado será true:
        $exito_base_datos = mysqli_query($conn, $query);

        //Si todo salió bien redireccionamos a view_data.php
        if ($exito_base_datos) {
            header("Location: view_data.php?mensaje=Los datos se eliminaron con exito!");
        } else {
            header("Location: view_data.php?mensaje=Error: " . mysqli_error($conn));
        }
    }
}

//Función para crear un nombre único para el archivo
function generateUniqueId($filename)
{
    $fileExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $randomString = bin2hex(random_bytes(8));
    $uniqueId = date('YmdHis') . "_" . $randomString . "." . $fileExtension;
    return $uniqueId;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit data</title>
</head>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    form {
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        border: 1px solid #a4a4a4;
    }

    small {
        color: #a4a4a4;
    }

    footer {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-top: 1rem;
    }

    a {
        text-decoration: none;
        color: black;
    }
</style>

<body>
    <form action="delete.php" method="post" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?php echo $id ?>">

        <h3>Eliminar datos</h3>
        <label for="image">Realmente deseas eliminar el registro: "<?php echo $description ?>"?</label>
        </section>
        <footer>
            <br><button type="submit" name="delete">Eliminar</button>
            <button><a href="view_data.php">Cancelar</a></button>
        </footer>
    </form>

</body>

</html>