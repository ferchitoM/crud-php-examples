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
    <title>Document</title>
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
        height: 20rem;
        display: flex;
        flex-direction: column;
        padding: 0.5rem;
    }

    img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>

<body>
    <main>

        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($item = mysqli_fetch_assoc($result)) {
        ?>
                <article>
                    <label>Nombre: <?php echo $item['description'] ?></label>
                    <label>Documento: <a href="uploads/documents/<?php echo $item['document'] ?>">
                            ver archivo
                        </a></label>
                    <img src="uploads/images/<?php echo $item['image'] ?>">
                </article>

            <?php }
        } else { ?>
            <p>Ups! No hay datos todavía</p>
        <?php } ?>

    </main>
</body>

</html>