<?php
include 'conexion.php';

if (isset($_POST['create'])) {
    if (!empty($_POST['description']) && !empty($_FILES['document']) && !empty($_FILES['image'])) {
        $description = $_POST['description'];
        $document = $_FILES['document'];
        $image = $_FILES['image'];

        //Copiamos el archivo al servidor
        $carpeta_destino = 'uploads/documents/';
        $nuevo_nombre_documento = generateUniqueId($document['name']);
        $ubicacion = $carpeta_destino . $nuevo_nombre_documento;
        //Si se copió correctamente el resultado será true:
        $exito_documento = move_uploaded_file($document['tmp_name'], $ubicacion);

        //Copiamos la imagen al servidor
        $carpeta_destino = 'uploads/images/';
        $nuevo_nombre_imagen = generateUniqueId($image['name']);
        $ubicacion = $carpeta_destino . $nuevo_nombre_imagen;
        //Si se copió correctamente el resultado será true:
        $exito_imagen = move_uploaded_file($image['tmp_name'], $ubicacion);

        // Si todo fue exitoso insertamos todo en la base de datos
        if ($exito_documento && $exito_imagen) {
            $query = "INSERT INTO data (description, document, image) 
                  VALUES ('$description', '$nuevo_nombre_documento', '$nuevo_nombre_imagen')";

            //Si se guardó en la base de datos el resultado será true:
            $exito_base_datos = mysqli_query($conn, $query);
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <form action="new.php" method="post" enctype="multipart/form-data">
        <h3>Insertar nuevo dato</h3>
        <section>
            <label for="description">Description: </label>
            <input type="text" name="description">
        </section>
        <section>
            <label for="document">Archivo: </label>
            <input type="file" name="document" accept=".doc, .docx, .pdf, .mp4, .mpeg">
        </section>
        <section>
            <label for="image">Imagen: </label>
            <input type="file" name="image" accept=".jpg, .jpeg, .png, .gif, .bmp, .tiff, .webp">
        </section>
        <footer>
            <br><button type="submit" name="create">Crear nuevo</button>
            <button><a href="view_data.php">Listar datos</a></button>
        </footer>

        <?php
        //Confirmamos si el proceso fue exitoso
        if (isset($exito_base_datos)) {
            if ($exito_base_datos) { ?>
                <p>Los datos se han guardado con exito!</p>
            <?php
            } else { ?>
                <p>Error: <?php echo mysqli_error($conn) ?></p>
        <?php
            }
        } ?>
    </form>
</body>

</html>