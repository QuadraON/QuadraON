<?php
# Objetivo: Enum com os tipos de quadra disponíveis

class QuadraTipo {

    public static string $SEPARADOR = "|";

    const GRAMADO = "GRAMADO";
    const SINTETICO = "SINTETICO";
    const QUADRA = "QUADRA";
    const AREIA = "AREIA";

    public static function getAllAsArray(): array {
        return [
            self::GRAMADO,
            self::SINTETICO,
            self::QUADRA,
            self::AREIA,
        ];
    }

    public static function isValid(string $tipo): bool {
        return in_array($tipo, self::getAllAsArray());
    }
}