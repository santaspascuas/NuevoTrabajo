<?php
class TarjetaService {
    /**
     * Expone la validación de tarjeta al servicio SOAP.
     */
    public function validarTarjeta($numeroTarjeta) {
        // Si el número de tarjeta está vacío, devuelve falso :v
        if (empty($numeroTarjeta)) {return false;}

        return $this->luhnCheck($numeroTarjeta);
    }

    /**
     * Algoritmo de Luhn para validar tarjetas de bancarias.
     */
    private function luhnCheck($numeroTarjeta) {
        // Limpiamos, dejando solo caracteres númericos.
        $numeroTarjeta = preg_replace('/\D/', '', $numeroTarjeta);

        // Inicializamos variables
        $longitud = strlen($numeroTarjeta);
        $suma = 0;
        $par = false;

        // Recorremos la tarjeta
        for ($i = $longitud - 1; $i >= 0; $i--) {
            $digito = (int) $numeroTarjeta[$i];

            if ($par) {
                $digito *= 2;
                if ($digito > 9) {
                    $digito -= 9;
                }
            }

            $suma += $digito;
            $par = !$par;
        }

        return ($suma % 10 === 0);
    }
}

// Verifica si SoapServer está disponible en PHP
if (!class_exists('SoapServer')) {
    die("Error: SOAP no está habilitado en el servidor.");
}

try {
    // Configuración del servidor SOAP
    $server = new SoapServer(null, ['uri' => 'http://localhost/NuevoTrabajo/Principal/tarjetaBancaria/']);
    $server->setClass('TarjetaService');
    $server->handle();
} catch (Exception $e) {
    throw new Exception( "Error en el servidor SOAP.");
}
?>