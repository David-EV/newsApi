<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google News API</title>
    <link rel="stylesheet" href="styles.css">
    <script src="main.js"></script>
</head>

<body>
    <!--barra de progreso al hacer scroll -->
    <div class="progress-container">
        <div class="progress-bar" id="myBar"></div>
    </div>
    <!------------------------------------ -->
    <section id="inicio">
        <div class="encabezado">
            <h2>Economía digital</h2>
            <p>Un concepto que se encuentra en pleno auge y que se basa en proporcionarnos de manera eficiente nuevos bienes y servicios al alcance de un clic.</p>
        </div>
        <?php
        $busqueda = "Economía digital";
        $url = 'http://newsapi.org/v2/everything?q=' . $busqueda . '&apiKey=627f4b23711643389817a89a172a4d03';
        $response = file_get_contents($url);
        $NewsData = json_decode($response);
        foreach ($NewsData->articles as $News) {
        ?>
            <div class="contenido">
                <div class="blog-post">
                    <div class="blog-post_img">
                        <?php
                        if (($News->urlToImage) == null) {
                        ?>
                            <img src="images/found.jpg" alt="News thumbnail">
                        <?php
                        } else {
                        ?>
                            <img src="<?php echo $News->urlToImage ?>" alt="News thumbnail">
                        <?php
                        }
                        ?>
                    </div>
                    <div class="blog-post_info">
                        <h1 class="blog-post_title"><?php echo $News->title ?></h1>
                        <h5 class="blog-post_description"><?php echo $News->description ?></h5>
                        <p class="blog-post_text"><?php echo $News->content ?></p>
                        <div class="blog-post_date">
                            <span>Autor: <?php echo $News->author ?></span>
                            <span>Publicado el: <?php echo $News->publishedAt ?></span>
                        </div>
                        <a href="<?php echo $News->url ?>" class="blog-post_cta">Leer Noticia</a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </section>
    <!-- boton para volver arriba -->
    <a href="#inicio"><img src="images/subir.png" class="boton-arriba" id="botonArriba"></a>
    <script>
        window.onscroll = function() {
            myFunction()
        };

        function myFunction() {
            var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var scrolled = (winScroll / height) * 100;
            document.getElementById("myBar").style.width = scrolled + "%";
        }
    </script>
</body>

</html>