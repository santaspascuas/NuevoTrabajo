
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

/* Estilos globales */
body {
    font-family: 'Roboto', sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 20px;
    color: #333;
}

h3 {
    text-align: center;
    font-size: 24px;
    color: #333;
    font-weight: 600;
    margin-bottom: 20px;
}

/* Contenedores de géneros y plataformas */
#generosContainer, #plataformaContainer {
    margin-top: 20px;
    padding: 15px;
    border-radius: 8px;
    background: linear-gradient(145deg, #f0f0f0, #dcdcdc);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

#generosContainer label, #plataformaContainer label {
    display: inline-block;
    background-color: #007bff;
    color: white;
    padding: 8px 12px;
    border-radius: 6px;
    margin: 5px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s;
}

#generosContainer label:hover, #plataformaContainer label:hover {
    background-color: #0056b3;
}

#generosContainer input[type="checkbox"], #plataformaContainer input[type="checkbox"] {
    margin-right: 8px;
    transition: transform 0.3s;
}

#generosContainer input[type="checkbox"]:checked, #plataformaContainer input[type="checkbox"]:checked {
    transform: scale(1.1);
}

/* Estilos para el botón de búsqueda */
button {
    background-color: #28a745;
    color: white;
    padding: 12px 30px;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s, transform 0.3s;
    margin-top: 20px;
}

button:hover {
    background-color: #218838;
    transform: translateY(-2px);
}

/* Contenedor de resultados */
#app, #detalles {
    width: 90%;
    margin: 30px auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
}

#app div, #detalles div {
    margin-bottom: 15px;
}

/* Estilo de las tarjetas de juego */
#app {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.card {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 250px;
    overflow: hidden;
    text-align: center;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-8px);
    box-shadow: 0 6px 14px rgba(0, 0, 0, 0.2);
}

.card img {
    width: 100%;
    height: auto;
    transition: opacity 0.3s ease;
}

.card img:hover {
    opacity: 0.8;
}

.card-body {
    padding: 15px;
    background-color: #f9f9f9;
    color: #555;
    display:none;
}

.card-title {
    font-size: 18px;
    font-weight: bold;
    margin: 0;
    color: #333;
}

.card-description {
    font-size: 14px;
    color: #777;
    margin: 10px 0;
}

/* Media queries para adaptar el diseño en pantallas pequeñas */
@media (max-width: 768px) {
    #app {
        flex-direction: column;
        align-items: center;
    }

    .card {
        width: 90%;
    }

    button {
        width: 100%;
    }
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
    
    <form id="boton"  method="post" action="../Controller/controlador.php" >
    <label for="titulo">Buscar Juego:</label>
        <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Prince of Persian">
        <button type="submit" class="submitBtn" name="tmp_admin_inyectar_juego" value="InyectarJuego" >Buscar Juego: </button><br>
    </form>



    <div id="app"></div>

    <script defer>

let x = <?php if(isset($_SESSION['infojuegos'])) echo $_SESSION['infojuegos']; ?>
// Hemos creado una session para poder usar la variable.
// Se linkea con una variable de javasscrip para luego hacer un recorrido.


const formulario = document.getElementById('formulario');
const appDiv = document.getElementById('app');
appDiv.innerHTML = ''; // Limpiar contenido previo



console.log(x.games);

// Zona de pruebas

const juegosArray = [];
if(x.games){
    // Creamos un array donde guardaremos el objetp
    for(const juego of x.games){

    const gameDiv = document.createElement('div');
    gameDiv.classList.add('card');
    if (juego.sample_cover && juego.sample_cover.image) {
    // Verificar si hay géneros y generar la lista como una cadena
    // Uso map porque es lo que puedo usar para.
    // Recorres con MAP LOS ARRAYS Y TE DEVUELVE EN FORMATO TEXTO CON JOIN

    const plataforma = juego.platforms
        ? juego.platforms.map(plat => plat.platform_name).join(',')
        : 'N/A';

    const genres = juego.genres 
        ? juego.genres.map(indice => indice.genre_name).join(', ') 
        : 'N/A';

    //Necesitamos otra descomposicion con for para las plataformas
    gameDiv.innerHTML = `
        <img src="${juego.sample_cover.image}" alt="${juego.title}">
        <h3 class="card-title">${juego.title}</h3>
        <div class="card-body">
            <p class="card-description">${juego.description}</p>
            <p class="card-description">Genres: ${genres}</p>
            <p class="card-description">${juego.moby_score}</p>
            <p class="card-description">Plataforma: ${plataforma}</p>
        </div>
    `;
    // Creo que voy a hacer aqui la creación de un objeto dinamico para los juegos.
    const juegoObjeto = {
        titulo: juego.title || '',
        descripcion: juego.description || '',
        // Aqui al ser un array de los generos usamos map con una combinacion de ternario
        generos: juego.genres ? juego.genres.map(indice => indice.genre_name) : [],
        // Esto hace que puedas meterte dentro y obtener los nombres de los juegos.
        puntuacion: juego.moby_score || '',
        //Genero la plataforma
        plataforma: juego.platforms ? juego.platforms.map(plat => plat.platform_name) : []
    };
    juegosArray.push(juegoObjeto); // Guardamos el objeto en un array
        // Guardamos una referencia al índice del juego en el array para luego recuperarlo
    gameDiv.dataset.gameId = juegosArray.length - 1; // Asociamos el índice del juego en el array

    // Agregar el nuevo div al contenedor
    appDiv.appendChild(gameDiv);
}
 
}
}else{
    appDiv.innerHTML = '<p>No se encontraron juegos.</p>';
}

// Zona de pruebas
console.log(juegosArray[2]);




//Vamos primero a seleccionar una card
let carta = document.querySelectorAll('.card'); // Tenemos todos  los divs
// Vamos a ponerlos a escuchar cuando hagas click.
// Al ser un selector total nos devuleve una especie de lista.
// Es una especie de objeto

//console.log(carta);

document.addEventListener("DOMContentLoaded", function () {
    for (let cartaElemento of carta) {
        cartaElemento.addEventListener("click", function () {
            let indice = parseInt(this.dataset.gameId);
              // Actualizamos los campos del formulario con los datos del juego seleccionado
            formulario.elements['tituloJuego'].value = juegosArray[indice].titulo;
            formulario.elements['descripcion'].value = juegosArray[indice].descripcion;
            formulario.elements['mobyScore'].value = juegosArray[indice].puntuacion;

            // Seleccionamos el contenedor de géneros
            const generDiv = document.getElementById('generosContainer');
            if (!generDiv) {
                console.error("El contenedor con el ID 'generosContainer' no existe en el HTML.");
                return; // Detenemos la ejecución si no existe
            }

            // Limpiamos el contenedor de géneros para evitar duplicados
            generDiv.innerHTML = '';

            const etiquetas = document.createElement('label');
            etiquetas.textContent = 'Géneros del juego: ';
            generDiv.appendChild(etiquetas);
            generDiv.appendChild(document.createElement('br'));

            let seleccionCarta = juegosArray[indice];
            if (!seleccionCarta || !Array.isArray(seleccionCarta.generos)) {
                console.error("No se encontraron géneros para el juego seleccionado.");
                return;
            }

            for (let genero of seleccionCarta.generos) {
                const labelJuego = document.createElement('label');
                const checkbox = document.createElement('input');

                checkbox.type = 'checkbox';
                checkbox.value = genero;
                checkbox.name = "generos";

                labelJuego.textContent = genero;
                labelJuego.htmlFor = genero;

                generDiv.appendChild(checkbox);
                generDiv.appendChild(labelJuego);
                generDiv.appendChild(document.createElement('br'));
            }

            // vamos a seleccionar el contenedor de los generos.
            const generaPlat = document.getElementById('plataformaContainer');

            // Confirmamos si existe y sino existe

            if(!generaPlat){
                console.error("El contenedor con el ID 'generosContainer' no existe en el HTML.");
                return; // Detenemos la ejecución si no existe
            }
            // Limpiamos el contenedor de Plataformas para evitar duplicados
            generaPlat.innerHTML = '';
            const labelPlataforma = document.createElement('label');
            labelPlataforma.textContent = 'Plataforma de los juegos: ';
            generaPlat.appendChild(labelPlataforma);
            generaPlat.appendChild(document.createElement('br'));
            if (!seleccionCarta || !Array.isArray(seleccionCarta.plataforma)) {
                console.error("No se encontraron plataformas para el juego seleccionado.");
                return;
            }

            // aqui empezariamos a realizar el for de la plataforma

            console.log(seleccionCarta.plataforma);





        });







    }
});







</script>

</body>
</html>
