
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
#generosContainer, #plataformaContainer,#generosContenedor {
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
    <label for="tituloid">id:</label>
    <input id="tituloid" name="tituloid" type="text" readonly><br>

        <label for="tituloJuego">Título:</label>
        <input id="tituloJuego" name="tituloJuego" type="text" readonly><br>

        <label for="tituloJuego">Descripcion:</label>
        <input id="descripcion" name="descripcion" type="text" readonly><br>


        <label for="plataformaid">Desarrollador:</label>
        <input type="text" id="plataformaid" name="plataformaid" type="text" ><br>

        <div id="plataformaContainer">
        <label for="descripcion">Distribuidor:</label>
        <!-- Checkboxes se generarán aquí -->
        </div>

        <div id="generosContainer">
        <label for="descripcion">Año:</label>
        <!-- Checkboxes se generarán aquí -->
        </div>

        <div id="generosContenedor">
        <label for="descripcion">Generos:</label>
        <!-- Checkboxes se generarán aquí los generos -->
        </div>


        <label for="mobyScore">Url:</label>
        <input id="mobyScore" name="mobyScore" type="text" readonly><br>

        <label for="mobyScore">Url_Imagen:</label>
        <input id="urlImagen" name="urlImagen" type="text" readonly><br>

        <!-- Añadir un input para tipo fichero y aqui -->

        <label for="mobyScore">Archivos Juegos:</label>
        <input type="file" name="fichero">

        <button type="submit" class="submitBtn" name="tmp_admin_crearJuegos_apiEjemplo" value="CrearJuegos" >Añadir Juegos</button><br>
    </form>
    
      <!-- Voy a poner aqui el boton que sea distinto-->

    <form id="boton"  method="post" action="../Controller/controlador.php" >
    <label for="titulo">Buscar Juego:</label>
        <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Prince of Persian">
        <button type="submit" class="submitBtn" name="tmp_admin_buscar_juego_api" value="InyectarJuego" >Buscar Juego: </button><br>
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
        id:juego.game_id||'',
        titulo: juego.title || '',
        descripcion: juego.description || '',
        // Aqui al ser un array de los generos usamos map con una combinacion de ternario
        generos: juego.genres ? juego.genres.map(indice => indice.genre_name) : [],
        // Esto hace que puedas meterte dentro y obtener los nombres de los juegos.
        puntuacion: juego.moby_score || '',
        //Genero la plataforma
        plataforma: juego.platforms ? juego.platforms.map(plat => ({
            id_plat:plat.platform_id,
            nombre: plat.platform_name,
            ano: plat.first_release_date,
        })): [],
        url:juego.moby_url||'',
        imagen:juego.sample_cover.image
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
            formulario.elements['tituloid'].value = juegosArray[indice].id;
            formulario.elements['tituloJuego'].value = juegosArray[indice].titulo;
            formulario.elements['mobyScore'].value = juegosArray[indice].url;
            formulario.elements['urlImagen'].value = juegosArray[indice].imagen;
            formulario.elements['descripcion'].value = juegosArray[indice].descripcion;

            // Seleccionamos el contenedor de géneros
            
            const generDiv = document.getElementById('generosContenedor');
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
            console.log(indice);
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
                

           // let seleccionCarta = juegosArray[indice];
            // vamos a seleccionar el contenedor de las plataformas.
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
            // Plasmamos las plataformas
            for(let plataforma of seleccionCarta.plataforma){
                const labelplataforma = document.createElement('label');
                const checkbox = document.createElement('input');

                checkbox.type = 'checkbox';
                checkbox.value = plataforma.nombre;
                checkbox.name = "plataforma";

                labelplataforma.textContent = plataforma.nombre;
                labelplataforma.htmlFor = plataforma.nombre;

                generaPlat.appendChild(checkbox);
                generaPlat.appendChild(labelplataforma);
                generaPlat.appendChild(document.createElement('br'));
            }

            // Otro contenedor para el ano
            // vamos a seleccionar el contenedor de las plataformas.
            const generaAno = document.getElementById('generosContainer');
            // Limpiamos el contenedor de Anos para evitar duplicados
            generaAno.innerHTML = '';
            const labelano = document.createElement('label');
            labelano.textContent = 'Años de los juegos: ';
            generaAno.appendChild(labelano);
            generaAno.appendChild(document.createElement('br'));

            //Vamos a plasmar los años
            for(let plataforma of seleccionCarta.plataforma){
                const labelAno = document.createElement('label');
                const checkboxAno = document.createElement('input');
                
                checkboxAno.type = 'checkbox';
                checkboxAno.value = plataforma.ano;
                checkboxAno.name = "anios";
                
                labelAno.textContent = plataforma.ano;
                labelAno.htmlFor = plataforma.ano;

                generaAno.appendChild(checkboxAno);
                generaAno.appendChild(labelAno);
                generaAno.appendChild(document.createElement('br'));
            }

        });
    }
    // Deberia poner a escuchar tambien a los inputs generados y ya luego llamo a la funcion

});







/** IMPORTANTE */
//La api  de luis no puede utilizar params sino que debes de inyectar las variables de forma dinamica con los templates.

const apiKey = 'moby_Ivjf8fphPEz3gLn9DVIcRsvNYgE';
const BASE_URL = 'https://games.eduardojaramillo.click/v1/games';

/*--Planteamos las variables que vamos a utilizar que son la url basica de los endpoints y la clave--*/

// Ya tengo la solicion pero primero voy a enfrentarme al reto yo solo//

//Primero crear una funcion asyn con wait


/*
async function buscarDesarrollador(titulo, plataforma) {
  try {
    if (!titulo || !plataforma) {
      throw new Error('Los parámetros título y plataforma son obligatorios.');
    }

    const url = `${BASE_URL}/${titulo}/platforms/${plataforma}?api_key=${apiKey}`;
    const response = await fetch(url, {
      method: 'GET',
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${apiKey}`,
      },
    });

    if (response.status === 429) {
      const retryAfter = response.headers.get('Retry-After') || 5;
      console.warn(`Rate limit alcanzado. Reintentando en ${retryAfter} segundos...`);
      await delay(retryAfter * 1000);
      return buscarDesarrollador(titulo, plataforma);
    }

    if (!response.ok) {
      throw new Error(`Error: ${response.status} - ${response.statusText}`);
    }

    const data = await response.json();
    return data;
  } catch (error) {
    console.error('Hubo un problema con la solicitud:', error.message);
  }
}

function delay(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

// Llamar a la función
buscarDesarrollador('1', '6').then(data => {
  if (data) {
    console.log('Datos obtenidos correctamente:', data);
  }
});



*/


//Ha cargado. Necesito saber como se ha hecho y 


</script>

</body>
</html>
