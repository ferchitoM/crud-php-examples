<?php
include 'conexion.php';
$query = "SELECT * FROM data ORDER BY id ASC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View data</title>
</head>
<style>
    main {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        gap: 2rem;
        margin: 0 5rem;
    }

    article {
        width: 20rem;
        height: 30rem;
        display: flex;
        flex-direction: column;
        padding: 0.5rem;
    }

    label {
        margin-bottom: 0.5rem;
    }

    img {
        width: 100%;
        height: 80%;
        object-fit: cover;
    }

    footer {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-top: 1rem;
    }

    button a {
        text-decoration: none;
        color: black;
    }
</style>

<body>
    <main>

        <?php if (isset($_GET['mensaje'])) { ?>
            <h3><?php echo $_GET['mensaje'] ?></h3>
        <?php } ?>

        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($item = mysqli_fetch_assoc($result)) {
        ?>
                <article>
                    <label>Descripción: <?php echo $item['description'] ?></label>
                    <label>Documento: <button><a href="uploads/documents/<?php echo $item['document'] ?>">
                                👁️ ver archivo
                            </a></button>
                    </label>
                    <img src="uploads/images/<?php echo $item['image'] ?>">
                    <footer>
                        <button><a href="edit.php?id=<?php echo $item['id'] ?>">Editar ✏️</a></button>
                        <button><a href="delete.php?id=<?php echo $item['id'] ?>">Eliminar 🗑️</a></button>
                    </footer>
                </article>

            <?php }
        } else { ?>
            <p>Ups! No hay datos todavía</p>
        <?php } ?>

    </main>
</body>

</html>