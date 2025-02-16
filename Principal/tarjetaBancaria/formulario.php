<?php

//  session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtiene el número de tarjeta con seguridad
    $numeroTarjeta = filter_input(INPUT_POST, 'numero_tarjeta', FILTER_SANITIZE_STRING);

    try {
        // Verificar que el número de tarjeta tenga entre 13 y 19 dígitos
       

        // Crear cliente SOAP
        $client = new SoapClient(null, [
            'location' => 'http://localhost/NuevoTrabajo/Principal/tarjetaBancaria/tarjeta.php',
            'uri'      => 'http://localhost/NuevoTrabajo/Principal/tarjetaBancaria',
            'trace'    => 1
        ]);

        // Validar tarjeta
        $esValida = $client->validarTarjeta($numeroTarjeta);

        // Generar el mensaje de respuesta
        if ($esValida) {
           $mensaje = "<p style='color: green;'> Tarjeta válida. Puede continuar con la compra.</p>";
        } else {
           $mensaje = "<p style='color: red;'> Tarjeta inválida. Verifique el número ingresado.</p>";
        }
    } catch (Exception $e) {
       $mensaje = "<p style='color: red;'> Error al conectar con el servicio SOAP: " . $e->getMessage() . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar Tarjeta Bancaria</title>
    <style>
            /* Estilos generales */
/* Estilos generales */
body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(to right, #8360c3, #2ebf91);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

form {
    background: rgba(255, 255, 255, 0.9);
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    width: 350px;
    text-align: center;
}

fieldset {
    border: none;
}

legend {
    font-size: 1.4em;
    font-weight: 600;
    color: #333;
    margin-bottom: 15px;
}

label {
    font-weight: 500;
    display: block;
    margin-bottom: 8px;
    color: #444;
}

input[type="text"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: 2px solid #ddd;
    border-radius: 8px;
    font-size: 1em;
    transition: border 0.3s;
}

input[type="text"]:focus {
    border-color: #2ebf91;
    outline: none;
}

input[type="submit"] {
    background: #2ebf91;
    color: #fff;
    padding: 12px;
    border: none;
    border-radius: 8px;
    width: 100%;
    cursor: pointer;
    font-size: 1em;
    transition: background 0.3s;
}

input[type="submit"]:hover {
    background: #1ea877;
}

/* Mensajes de validación */
span {
    display: block;
    text-align: center;
    margin-top: 15px;
    font-weight: bold;
    padding: 10px;
    border-radius: 8px;
}

span p {
    margin: 0;
}

span p[style*="color: green"] {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

span p[style*="color: red"] {
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}
    </style>
</head>
<body>
    <form method="POST" action="" autocomplete="off">
        <fieldset>
            <legend>Registrar Tarjeta Bancaria</legend>

            <label for="numero_tarjeta">Número de Tarjeta:</label><br>
            <input type="text" name="numero_tarjeta" id="numero_tarjeta" pattern="\d{13,19}" required
                   title="Ingrese un número de tarjeta válido (13-19 dígitos)"><br>
            <input type="submit" value="validar">
        </fieldset>
    </form>

    <!-- mMostramos mensajes de error o exito -->
    <?php if(!empty($mensaje)): ?>
        <span><?php echo $mensaje ?></span>
    <?php endif; ?>
</body>
</html>