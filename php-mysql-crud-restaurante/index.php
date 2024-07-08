<?php
    //Importamos la conexión a la base de datos y el controlador
    include('config/conexion.php');
    include('controllers/platillosController.php');
    
    session_start();
    $_SESSION['css_folder'] = "";

    //incluimos todo el encabezado html desde el archivo header.php
    include('includes/header.php');
?>

<!-- Header -->
<header id="header">
    <div class="intro">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="intro-text">
                        <h1>Banquete</h1>
                        <h1>Bolaños</h1>
                        <p>Reservaciones: (722) 654-3210</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Features Section -->
<div id="features" class="text-center">
    <div class="container">
        <!--Mostrar los banquetes con sus respectivos platillos-->
        <div class="section-title">
            <h2> Nuestros platillos </h2>
        </div>
        <div class="row">
            <?php
                $lista = listar_platillos($conn);
                if (mysqli_num_rows($lista) > 0) {
                    while ($item = mysqli_fetch_array($lista)) {
            ?>
            <div class="col-xs-12 col-sm-4">
                <div class="features-item">
                    <h3>
                        <b><?php echo $item["codigo"] ?></b>
                    </h3>
                    <?php 
                        $ruta = "assets/img/platillos/".$item["imagen"];
                        echo "<img src='".$ruta."' class='img-responsive'>";
                    ?>
                    <h3>
                        <?php echo $item["descripcion"] ?>
                    </h3>
                    <p> Precio del platillo: $
                        <?php echo $item["precio_venta"]; ?>
                    </p>
                </div>
            </div>

            <?php
                    } // end while platillos
                } else {
                    echo '<h3 style = "color:#FF0000">¡Ups nuestros Chef aún no terminan de preparar nuestros platillos</h3>';
                    echo '<br>';
                }
            ?>
        </div>
        <div class="section-title">
            <h2> Nuestro Menu </h2>
            <br>
                <?php 
                    $lista = listar_tabla($conn);
                    if (mysqli_num_rows($lista) > 0) {
                ?>
                <h5>NOTA: Cada platillo corresponde al tipo de banquete que se muestra en la siguiente tabla y el precio de banquete varea de acuerdo a los platillos que se muestran arriba</h5>
        </div>
        <div class="row">
            <table id="t01">
                <style>
                    table {
                        width: 100%;
                    }

                    table,
                    th,
                    td {
                        border: 1px solid black;
                        border-collapse: collapse;
                    }

                    th,
                    td {
                        padding: 15px;
                        text-align: left;
                    }

                    #t01 tr:nth-child(even) {
                        background-color: #eee;
                    }

                    #t01 tr:nth-child(odd) {
                        background-color: #fff;
                    }

                    #t01 th {
                        background-color: black;
                        color: white;
                    }
                </style>
                <tr>
                    <th>Tipo de Banquete</th>
                    <th>Descripción</th>
                    <th>Código</th>
                </tr>
                    <?php
                        while ($item = mysqli_fetch_array($lista)) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $item["categoria"] ?>
                        </td>
                        <td>
                            <?php echo $item["descripcion"] ?>
                        </td>
                        <td>
                            <?php echo $item["codigo"] ?>
                        </td>
                    </tr>
                    <?php 
                        } 
                        } else {
                            echo '<h3 style="color:#FF0000">¡Ups nuestros Chef aún no terminan de preparar nuestros platillos</h3>';
                        }
                    ?>
            </table>
        </div>
    </div>
</div>

<!-- Gallery Section -->
<div id="gallery">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-6 col-md-3">
                <div class="gallery-item'> <img src='assets/img/gallery/01.jpg' class='img-responsive' alt='"></div>
            </div>
            <div class="col-xs-6 col-md-3">
                <div class="gallery-item'> <img src='assets/img//gallery/02.jpg' class='img-responsive' alt='">
                </div>
            </div>
            <div class="col-xs-6 col-md-3">
                <div class="gallery-item'> <img src='assets/img//gallery/03.jpg' class='img-responsive' alt='">
                </div>
            </div>
            <div class="col-xs-6 col-md-3">
                <div class="gallery-item'> <img src='assets/img//gallery/04.jpg' class='img-responsive' alt='">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team Section -->
<div id="team">
    <div class="container">
        <div id="row">
            <div class="col-md-6">
                <div class="col-md-10 col-md-offset-1">
                    <div class="section-title">
                        <h2>Conoce a nuestros Chef</h2>
                    </div>
                    <p>David Millet comenzó su formación en el mundo gastronómico a los 15 años en las cocinas del
                        Liceo Hotelero de Yzeure, Francia. Su trayectoria profesional le ha llevado a trabajar en
                        algunos de los fogones más importantes de Francia: el Restaurante La Divellec, el Hotel
                        Rosalp o el famoso restaurante de la Torre Eiffel, Jules Verne..</p>
                    <p>En Toluca el chef ha capitaneado las cocinas del Banquete Bolaños, en el que ha permanecido
                        desde 2018 en el cual ha trasmitido sus conocimientos adquiridos desde su experiencia y
                        carrera profesional.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="team-img">
                    <img src="assets/img/chef.jpg">
                </div>
            </div>
        </div>
    </div>
</div>
<div id="contact" class="text-center">
    <div class="container text-center">
        <div class="col-md-4">
            <h3>Reservaciones</h3>
            <div class="contact-item">
                <p>Por favor contactanos</p>
                <p>(722) 654-3210</p>
            </div>
        </div>
        <div class="col-md-4">
            <h3>Nuestra dirección</h3>
            <div class="contact-item">
                <p>4321 Ixtlahuaca,</p>
                <p>Toluca, Estado de México 26485</p>
            </div>
        </div>
        <div class="col-md-4">
            <h3>Horario de apertura</h3>
            <div class="contact-item">
                <p>Lunes-Viernes: 10:00 AM - 11:00 PM</p>
                <p>Sabado-Domingo: 11:00 AM - 02:00 PM</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="section-title text-center">
            <h3>¡Si quieres recibir nuestras promociones, suscribete!</h3>
        </div>
        <div class="section-title text-center">
            <button type="submit" class="btn btn-custom btn-lg">
                <a href="suscripcion.php">Suscribirse</a>
            </button>
        </div>
    </div>
</div>

<?php 
    //incluimos todo el pie de página html con el archivo footer.php
    include('includes/footer.php'); 
?>
