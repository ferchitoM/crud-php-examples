<?php
include 'conexion.php';

if (isset($_GET['id']) || isset($_POST['id'])) {
    $id = $_GET['id'] ?? $_POST['id'];

    $query = "SELECT * FROM data WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $item = mysqli_fetch_assoc($result);

        //Preparamos los datos a mostrar en el formulario
        $id = $item['id'];
        $edit_description = $item['description'];
        $edit_document = $item['document'];
        $edit_image = $item['image'];
    }
}

//Si se dio click en el botón Editar
if (isset($_POST['edit'])) {
    if (!empty($_POST['description'])) {
        $edit_description = $_POST['description'];

        $exito_documento = true;
        $exito_imagen = true;

        //Copiamos el archivo al servidor en caso de haber seleccionado uno nuevo
        if (!empty($_FILES['document']["name"])) {

            //Eliminamos el archivo anterior
            $eliminar_documento = "uploads/documents/$edit_document";
            unlink($eliminar_documento);

            //Copiamos al servidor el nuevo archivo
            $document = $_FILES['document'];
            $carpeta_destino = 'uploads/documents/';
            $edit_document = generateUniqueId($document['name']);
            $ubicacion = $carpeta_destino . $edit_document;

            //Si se copió correctamente el resultado será true:
            $exito_documento = move_uploaded_file($document['tmp_name'], $ubicacion);
        }

        //Copiamos la imagen al servidor en caso de haber seleccionado una nueva
        if (!empty($_FILES['image']["name"])) {

            //Eliminamos la imagen anterior
            $eliminar_imagen = "uploads/images/$edit_image";
            unlink($eliminar_imagen);

            //Copiamos al servidor la nueva imagen
            $image = $_FILES['image'];
            $carpeta_destino = 'uploads/images/';
            $edit_image = generateUniqueId($image['name']);
            $ubicacion = $carpeta_destino . $edit_image;

            //Si se copió correctamente el resultado será true:
            $exito_imagen = move_uploaded_file($image['tmp_name'], $ubicacion);
        }

        // Si todo fue exitoso insertamos todo en la base de datos
        if ($exito_documento && $exito_imagen) {
            $query = "UPDATE data SET 
                      description = '$edit_description', 
                      document = '$edit_document', 
                      image = '$edit_image' 
                      WHERE id = $id";

            //Si se guardó en la base de datos el resultado será true:
            $exito_base_datos = mysqli_query($conn, $query);

            //Si todo salió bien redireccionamos a view_data.php
            if ($exito_base_datos) {
                header("Location: view_data.php?mensaje=Los datos se han actualizado con exito!");
            } else {
                header("Location: view_data.php?mensaje=Error: " . mysqli_error($conn));
            }
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

    label {
        display: inline-block;
        width: 6rem;
    }

    a {
        text-decoration: none;
        color: black;
    }
</style>

<body>
    <form action="edit.php" method="post" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?php echo $id ?>">

        <h3>Editar dato</h3>
        <section>
            <label for="description">Description: </label>
            <input type="text" name="description" value="<?php echo $edit_description ?>">
        </section>
        <section>
            <label for="document">Archivo: </label>
            <input type="file" name="document" value="uploads/documents/<?php echo $edit_document ?>" accept=".doc, .docx, .pdf, .mp4, .mpeg">
        </section>
        <section>
            <label for="image">Imagen: </label>
            <input type="file" name="image" value="uploads/images/<?php echo $edit_image ?>" accept=".jpg, .jpeg, .png, .gif, .bmp, .tiff, .webp">
        </section>
        <footer>
            <br><button type="submit" name="edit">Actualizar</button>
            <button><a href="view_data.php">Listar datos</a></button>
        </footer>
    </form>

</body>

</html>