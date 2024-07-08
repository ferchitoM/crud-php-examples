<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Banquete Bolaños</title>
    <meta name='description' content=''>
    <meta name='author' content=''>

    <!-- Favicons
===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  == -->
    <!--<link rel = 'shortcut icon' href = 'img/favicon.ico' type = 'image/x-icon'>-->
    <link rel='apple-touch-icon' href='assets/img/apple-touch-icon.png'>
    <link rel='apple-touch-icon' sizes='72x72' href='assets/img/apple-touch-icon-72x72.png'>
    <link rel='apple-touch-icon' sizes='114x114' href='assets/img/apple-touch-icon-114x114.png'>

    <!-- Bootstrap -->
    <link rel='stylesheet' type='text/css' href='assets/css/shared/bootstrap.css'>
    <link rel='stylesheet' type='text/css' href='assets/css/shared/font-awesome.css'>

    <!-- Stylesheet
===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  == -->
    <link rel='stylesheet' type='text/css' href='assets/css/index/style.css'>

    <?php  
        if ($_SESSION['css_folder'] != "") 
            echo "<link rel='stylesheet' type='text/css' href='assets/css/".$_SESSION['css_folder']."'>";
    ?>
    <link href='https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Rochester' rel='stylesheet'>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <!-- Navigation
    ==========================================-->
    <nav id="menu" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1"> 
                    <span class="sr-only">Toggle navigation</span> 
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> <span class="icon-bar"></span> 
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="#features" class="page-scroll">Banquetes</a></li>
                    <li><a href="#team" class="page-scroll">Chef</a></li>
                    <li><a href="#contact" class="page-scroll">Contacto</a></li>
                    <li><a href="suscripcion.php" class="page-scroll">Suscribirse</a></li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>