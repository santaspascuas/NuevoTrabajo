<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo Peliculas</title>
    <link rel="stylesheet" href="/TrabajoLuis/css/catalogo.css">
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="../../js/catalogo.js" defer></script>
    <style>
     
    .filters {
        margin: 20px 0;
        padding: 15px;
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        background: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-top: 2rem;
    }

    .filters label {
        font-weight: bold;
        margin-right: 5px;
        color: #333;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }

    .filters select,
    .filters input {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
        transition: box-shadow 0.3s ease, border-color 0.3s ease;
    }

    .filters select:hover,
    .filters input:hover {
        border-color: #999;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
    }

    .filters button {
        padding: 8px 15px;
        font-size: 14px;
        background: #4caf50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s ease, transform 0.2s ease;
    }

    .filters button:hover {
        background: #45a049;
        transform: scale(1.05);
    }

    .filters button:active {
        background: #3e8e41;
        transform: scale(0.98);
    }
</style>

    
</head>

<body>
<div class="container">
        <header>
            <form action="controlador.php" method="post">
                <button type="submit" name="tmp_catalogo_btn_entrar_home">
                    <h1>Catalogo Juegos</h1>
                </button>
                <button type="submit" name="tmp_catalogo_btn_entrar_carrito">
                    <img src="https://www.svgrepo.com/show/477419/shopping-cart-14.svg" width="20rem">
                </button>
            </form>
            <div class="search-container">
                <form action="controlador.php" method="post">
                    <input type="search" id="search" name="titulo" placeholder="Search Games...">
                </form>
                <button id="darkModeToggle" aria-label="Toggle dark mode">
                    <i data-lucide="moon"></i>
                </button>
            </div>
        </header>

        <!-- Barra de Filtros -->
        <div class="filters">
            <label for="genre">Género:</label>
            <select id="genre">
                <option value="">Todos</option>
                <option value="Acción">Acción</option>
                <option value="Aventura">Aventura</option>
                <option value="Estrategia">Estrategia</option>
            </select>

            <label for="year">Año:</label>
            <select id="year">
                <option value="">Todos</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
            </select>

            <label for="title">Título:</label>
            <input type="text" id="title" placeholder="Buscar por título...">

            <button type="button" id="applyFilters">Aplicar Filtros</button>
        </div>

        <!-- Catálogo de Juegos -->
         
        <main id="movieGrid">
            <?php foreach ($juegos as $juego): ?>
                <div class="movie-card" 
                     id="<?php echo $juego["game_id"]; ?>" 
                     data-genre="<?php echo strtolower($juego['genre'] ?? ''); ?>" 
                     data-year="<?php echo date('Y', strtotime($juego['platforms'][0]['first_release_date'])); ?>" 
                     data-title="<?php echo strtolower($juego['title']); ?>">
                    <img src="<?php echo $juego['sample_cover']['image'] ?>" alt="<?php echo $juego['title'] ?>">
                    <div class="movie-info">
                        <h2><?php echo $juego['title'] ?></h2>
                        <p><?php echo date('Y', strtotime($juego['platforms'][0]['first_release_date'])); ?></p>
                    </div>
                </div>
                <div id="movieModal-<?php echo $juego["game_id"]; ?>" class="modal">
                    <div class="modal-content">
                        <span class="close" id="closeModal-<?php echo $juego["game_id"]; ?>">&times;</span>
                        <a href="index.php?pagina=juego">Jugar</a> 
                        <form action="controlador.php" method="post">
                            <input type="hidden" name="title" value="<?php echo $juego['title'] ?>">
                            <input type="hidden" name="year" value="<?php echo $juego['platforms'][0]['first_release_date'] ?>">
                            <input type="hidden" name="image" value="<?php echo $juego['sample_cover']['image'] ?>">
                            <input type="hidden" name="description" value="<?php echo $juego['description'] ?>">
                            <button type="submit" name="tmp_catalogo_btn_anadir_carrito">Añadir al carrito</button>
                        </form>
                        <h2 id="modalTitle"><?php echo $juego['title'] ?></h2>
                        <p id="modalYear"><?php echo $juego['platforms'][0]['first_release_date'] ?></p>
                        <img id="modalPoster" src="<?php echo $juego['sample_cover']['image'] ?>" alt="">
                        <p id="modalDescription"><?php echo $juego['description'] ?></p>
                    </div>
                </div>
            <?php endforeach ?>
        </main>
    </div>

    <script>
        //mecanismo de filter basandose en genero , año y titulo.
        document.getElementById('applyFilters').addEventListener('click', () => {
            const genre = document.getElementById('genre').value.toLowerCase();
            const year = document.getElementById('year').value;
            const title = document.getElementById('title').value.toLowerCase();

            const games = document.querySelectorAll('.movie-card');

            games.forEach(game => {
                const gameTitle = game.querySelector('h2').textContent.toLowerCase();
                const gameYear = game.querySelector('p').textContent;
                const gameGenre = game.dataset.genre;

                if (
                    (genre === '' || (gameGenre && gameGenre.includes(genre))) &&
                    (year === '' || gameYear.includes(year)) &&
                    (title === '' || gameTitle.includes(title))
                ) {
                    game.style.display = '';
                } else {
                    game.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>