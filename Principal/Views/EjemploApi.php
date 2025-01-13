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
    
    <form id="boton"  method="post" action="../Controller/controlador.php" >
    <label for="titulo">Buscar Juego:</label>
        <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Prince of Persian">
        <button type="submit" class="submitBtn" name="tmp_admin_crear_usuario" value="CrearUsuario" >Buscar Juego: </button><br>
    </form>






    <div id="app"></div>
    <div id="detalles"></div>






</body>
</html>
