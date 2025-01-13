<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo Peliculas</title>
    <link rel="stylesheet" href="/TrabajoLuis/css/catalogo.css">
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="../../js/catalogo.js" defer></script>
</head>

<body>
    <div class="container">
        <header>
    <!-- //al no tener header te quedas en la ruta del controller -->
            <form action="controlador.php" method="post">
            <button type="submit" name="tmp_catalogo_btn_entrar_home"> <h1> Carrito</h1></button>
            <button type="submit" name="tmp_catalogo_btn_entrar_carrito"><img src="https://www.svgrepo.com/show/477419/shopping-cart-14.svg" width="20rem"></button>
            </form>
            <div class="search-container">
                <form action="catalogo.php" method="post">
                    <!-- boton para buscar los juegos por titulo -->
                    <input type="search" id="search" name="titulo" placeholder="Search Games...">
                </form>
                <button id="darkModeToggle" aria-label="Toggle dark mode">
                    <i data-lucide="moon"></i>
                </button>
            </div>
        </header>
        <main id="movieGrid">
            <!-- iteramos sobre el foreach , por cada elemento del array se mostraria la tarjeta cde cada juego.
            Mostramos datos como la imagen , tutulo , año etc. -->
            <?php 
                
                if (isset($_COOKIE['carrito'])) {
                    $carrito = json_decode($_COOKIE['carrito'], true);
                
                    foreach ($carrito as $juego) {
                        echo "<div class='movie-card'>";
                        echo "<img src='" . htmlspecialchars($juego['image']) . "' alt='" . htmlspecialchars($juego['title']) . "'>";
                        echo "<div class='movie-info'>";
                        echo "<h2>" . htmlspecialchars($juego['title']) . "</h2>";
                        echo "<p>Año: " . htmlspecialchars($juego['year']) . "</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>El carrito está vacío.</p>";
                }
                
            ?>

        </main>
    </div>
   
</body>

</html>