<?php
session_start();
class util {

    public static function GuardarInformacao($codigo, $nome) {

        $_SESSION['codigo'] = $codigo;
        $_SESSION['nome'] = $nome;
    }

    public static function RetornaCodigoLogado() {

        return $_SESSION['codigo'];
    }

}
