<?php

class Cotizacion {
    public static function cotizarEnvio($tipo) {
        switch ($tipo) {
            case 'sobre':
                return self::cotizarSobre();
            case 'paqueteS':
                return self::cotizarPaqueteS();
            case 'paqueteM':
                return self::cotizarPaqueteM();
            case 'paqueteL':
                return self::cotizarPaqueteL();
            default:
                return 0;
        }
    }

    private static function cotizarSobre() {
        return 7.0;
    }

    private static function cotizarPaqueteS() {
        return 10.0;
    }

    private static function cotizarPaqueteM() {
        return 20.0;
    }

    private static function cotizarPaqueteL() {
        return 30.0;
    }
}


?>
