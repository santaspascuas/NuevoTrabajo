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