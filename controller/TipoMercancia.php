<?php

require_once "modelos/Cotizacion.php";

class TipoMercancia {
    public static function cotizar($tipo) {
        $costoEnvio = Cotizacion::cotizarEnvio($tipo);
        return $costoEnvio;
    }
}

?>
