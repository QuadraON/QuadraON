<?php
#Nome do arquivo: UsuarioTipo.php
#Objetivo: classe Enum para os papeis de permissões do model de Usuario

class UsuarioTipo {

    public static string $SEPARADOR = "|";

    const ADMINISTRADOR = "ADM";
    const LOCADOR = "LOCADOR";
    const LOCATARIO = "LOCATARIO";

    public static function getAllAsArray() {
        return [UsuarioTipo::ADMINISTRADOR, UsuarioTipo::LOCADOR, UsuarioTipo::LOCATARIO];
    }

}

