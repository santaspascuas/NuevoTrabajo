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
                    <input type="search" id="search" name="titulo" placeholder="Search Games...">
                </form>
                <button id="darkModeToggle" aria-label="Toggle dark mode">
                    <i data-lucide="moon"></i>
                </button>
            </div>
        </header>
        <main id="movieGrid">
            <?php foreach ($juegos as $juego): ?>

                <div class="movie-card">
                    <img src="<?php echo $juego->getImage() ?>" alt="<?php echo $juego->getTitulo() ?>">
                    <div class="movie-info">
                        <h2><?php echo $juego->getTitulo() ?></h2>
                        <p><?php echo $juego->getYear() ?></p>
                    </div>
                </div>
                
            <?php endforeach ?>

        </main>
    </div>
   
</body>

</html>