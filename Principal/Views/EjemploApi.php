<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Juegos</title>
    <style>
        
    /* Estilos para el formulario */
    #formulario {
        background-color: #f9f9f9;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        width: 400px;
        margin: 20px auto;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    #formulario label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    #formulario input {
        width: calc(100% - 20px);
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    /* Estilos para los contenedores de géneros y plataformas */
    #generosContainer, #plataformaContainer {
        margin-top: 10px;
        padding: 10px;
        border: 1px solid #e0e0e0;
        border-radius: 4px;
        background-color: #fff;
    }

    #generosContainer label, #plataformaContainer label {
        display: inline-block;
        background-color: #007bff;
        color: white;
        padding: 5px 10px;
        border-radius: 4px;
        margin: 5px;
        cursor: pointer;
        font-size: 14px;
    }

    #generosContainer input[type="checkbox"], #plataformaContainer input[type="checkbox"] {
        margin-right: 5px;
    }

    /* Estilos para el botón de búsqueda */
    button {
        background-color: #28a745;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background-color: #218838;
    }

    /* Estilos para el contenedor de resultados */
    #app, #detalles {
        width: 90%;
        margin: 20px auto;
        padding: 20px;
        background-color: #fdfdfd;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    #app div, #detalles div {
        margin-bottom: 10px;
    }

    h3 {
        text-align: center;
        color: #333;
    }
</style>
    </style>
</head>
<body>
    <form id="formulario"  method="post" action="../Controller/controlador.php" >
        <label for="tituloJuego">Título:</label>
        <input id="tituloJuego" name="tituloJuego" type="text" readonly><br>

        <label for="descripcion">Descripción:</label>
        <input id="descripcion" name="descripcion" type="text" readonly><br>

        <div id="generosContainer">
        <label for="descripcion">Generos:</label>
            <!-- Checkboxes se generarán aquí -->
        </div>

        <div id="plataformaContainer">
        <label for="descripcion">Plataforma:</label>
        <!-- Checkboxes se generarán aquí -->
        </div>

        <label for="mobyScore">Puntuación:</label>
        <input id="mobyScore" name="mobyScore" type="text" readonly><br>

        <button type="submit" class="submitBtn" name="tmp_admin_crearJuegos_apiEjemplo" value="CrearJuegos" >Añadir Juegos</button><br>



        
    </form>

    <label for="titulo">Buscar Juego:</label>
    <input id="titulo" type="text">
    <button onclick="buscarJuego()">Buscar</button>

    <div id="app"></div>
    <div id="detalles"></div>

    <script>
        const apiKey = 'moby_Ivjf8fphPEz3gLn9DVIcRsvNYgE';
        const formulario = document.querySelector('#formulario');

        // Función para buscar juegos
        function buscarJuego() {
            const titulo = document.getElementById('titulo').value.trim(); // Obtenemos el título del input
            
            if (!titulo) {
                alert('Por favor, introduce un título de juego.');
                return;
            }

            const url = `https://games.eduardojaramillo.click/v1/games?format=id&title=${encodeURIComponent(titulo)}&api_key=${apiKey}`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    console.log('Datos recibidos de la API:', data);

                    const appDiv = document.getElementById('app');
                    appDiv.innerHTML = ''; // Limpiar contenido previo

                    if (data.games) {
                        data.games.forEach(game => {
                            // Crear un contenedor para cada juego
                            const gameDiv = document.createElement('div');
                            gameDiv.innerHTML = `
                                <p><strong>ID del juego:</strong> ${game}</p>
                                <button onclick="mostrarDetalles('${game}')">Mostrar detalles</button>
                            `;
                            appDiv.appendChild(gameDiv);
                        });
                    } else {
                        appDiv.innerHTML = '<p>No se encontraron juegos.</p>';
                    }
                })
                .catch(error => {
                    console.error('Error al buscar el juego:', error);
                    alert('Hubo un error al buscar el juego. Por favor, intenta de nuevo.');
                });
        }

        // Función para mostrar detalles del juego
        function mostrarDetalles(id) {
            const urlDetalles = `https://games.eduardojaramillo.click/v1/games/${id}?api_key=${apiKey}`;

            fetch(urlDetalles)
                .then(response => response.json())
                .then(data => {
                    console.log('Detalles del juego:', data);

                    const detallesDiv = document.getElementById('detalles');
                    detallesDiv.innerHTML = `
                        <h3>Detalles del Juego</h3>
                        <p><strong>Título:</strong> ${data.title || 'N/A'}</p>
                        <p><strong>Descripción:</strong> ${data.description || 'N/A'}</p>
                        <p><strong>Géneros:</strong> ${data.genres
                            ? data.genres.map(g => g.genre_name).join(', ')
                            : 'N/A'}</p>
                        <p><strong>Plataformas:</strong> ${data.platforms
                            ? data.platforms.map(p => p.platform_name).join(', ')
                            : 'N/A'}</p>
                        <p><strong>Puntuación en MobyGames:</strong> ${data.moby_score || 'N/A'}</p>
                    `;

                    // Crear un objeto con los detalles del juego
                    const juegoObjeto = {
                        titulo: data.title || '',
                        descripcion: data.description || '',
                        generos: data.genres ? data.genres.map(g => g.genre_name) : [],
                        plataformas: data.platforms ? data.platforms.map(p => p.platform_name) : [],
                        mobyScore: data.moby_score || ''
                    };

                    // Insertar los valores del objeto en el formulario
                    formulario.querySelector('#tituloJuego').value = juegoObjeto.titulo;
                    formulario.querySelector('#descripcion').value = juegoObjeto.descripcion;
                    formulario.querySelector('#mobyScore').value = juegoObjeto.mobyScore;

                    // Insertar géneros como checkboxes
                    const generosContainer = formulario.querySelector('#generosContainer');
                    generosContainer.innerHTML = ''; // Limpiar contenido previo

                    const enunciado = document.createElement('label');
                    enunciado.textContent = 'Generos de los juegos: ';

                    generosContainer.appendChild(enunciado);
                    generosContainer.appendChild(document.createElement('br')); // Salto de línea

                    juegoObjeto.generos.forEach(genero => {
                        const label = document.createElement('label');
                        const checkbox = document.createElement('input');
                        checkbox.type = 'checkbox';
                        checkbox.value = genero;
                        checkbox.name = genero;
                        label.textContent = genero;
                        label.prepend(checkbox);
                        generosContainer.appendChild(label);
                        generosContainer.appendChild(document.createElement('br')); // Salto de línea
                    });

                    // Aqui vamos a genera las respuestas del json para la plataforma. 

                    const plataformaContainer = formulario.querySelector('#plataformaContainer'); // Aqui seleccionamos el dib de la plataforma.
                    plataformaContainer.innerHTML = ''; // Limpiar contenido previo
                    // Generams etiqueta antes de la creacion
                    const etiquetaForm = document.createElement('label');
                    etiquetaForm.textContent = 'Plataforma donde se distribuye: ';

                    plataformaContainer.appendChild(etiquetaForm);
                    plataformaContainer.appendChild(document.createElement('br')); // Salto de línea

                    juegoObjeto.plataformas.forEach(plataforma => {

                        const label = document.createElement('label');
                        const checkbox = document.createElement('input');
                        checkbox.type = 'checkbox';
                        checkbox.value = plataforma;
                        checkbox.name = plataforma;
                        label.textContent = plataforma;
                        label.prepend(checkbox);
                        plataformaContainer.appendChild(label);
                        plataformaContainer.appendChild(document.createElement('br')); // Salto de línea
                    });    

                    console.log('Objeto de detalles del juego:', juegoObjeto);
                })
                .catch(error => {
                    console.error('Error al cargar los detalles del juego:', error);
                    alert('Error al cargar los detalles del juego.');
                });
        }
    </script>
</body>
</html>
