<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo Peliculas</title>
    <link rel="stylesheet" href="/TrabajoLuis/css/catalogo.css">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body>
    <div class="container">
        <header>
            <h1>
                <a href="index.php?paginas=index" style="text-decoration: none; color: inherit;">Catalogo Juegos</a> <button><img src="https://www.svgrepo.com/show/477419/shopping-cart-14.svg" width="20rem"></button>
            </h1>
            <div class="search-container">
                <form action="catalogo.php" method="post">
                    <input type="search" id="search" name="titulo" placeholder="Search movies...">
                </form>
                <button id="darkModeToggle" aria-label="Toggle dark mode">
                    <i data-lucide="moon"></i>
                </button>
            </div>
        </header>
        <main id="movieGrid">
            <?php foreach ($juegos as $juego): ?>

                <div class="movie-card" id="<?php echo $juego["game_id"]; ?>">
                    <img src="<?php echo $juego['sample_cover']['image'] ?>" alt="<?php echo $juego['title'] ?>">
                    <div class="movie-info">
                        <h2><?php echo $juego['title'] ?></h2>
                        <p><?php echo $juego['platforms'][0]['first_release_date'] ?></p>
                    </div>
                </div>
                <div id="movieModal-<?php echo $juego["game_id"]; ?>" class="modal">
                    <div class="modal-content">
                        <span class="close" id="closeModal-<?php echo $juego["game_id"]; ?>">&times;</span>
                        <a href="index.php?pagina=juego">Jugar</a>
                        <h2 id="modalTitle"><?php echo $juego['title'] ?></h2>
                        <p id="modalYear"><?php echo $juego['platforms'][0]['first_release_date'] ?></p>
                        <img id="modalPoster" src="<?php echo $juego['sample_cover']['image'] ?>" alt="">
                        <p id="modalDescription"><?php echo $juego['description'] ?></p>
                    </div>
                </div>
            <?php endforeach ?>

        </main>
    </div>
    <script src="../js/catalogo.js"></script>
</body>

</html>