<?php

require_once '../DAO/pessoaDAO.php';
require_once 'util.php';

/**
 * Description of PessoaController
 *
 * @author Tom
 */
class PessoaController {

    public function AlterarSenha($senha, $confirma_senha, $cod_usuario) {


        if (empty(trim($senha)) || empty(trim($confirma_senha))) {
            return 0;
        }

        if (strlen(trim($senha)) < 6) {
            return -3;
        }

        if (trim($senha) != trim($confirma_senha)) {
            return -4;
        }

        $obj = new pessoaDAO ();

        try {

            $obj->AlterarSenha($senha, $cod_usuario);

            return 1;
        } catch (Exception $exc) {

            return -1;
        }
    }

    public function InserirPessoa($nome_pessoa, $email, $senha, $confirmar_senha, $data_nascimento, $tel_fixo, $tel_cel, $data_ultima, $cod_cidade, $cod_tiposangue, $sexo_pessoa, $precisa_sangue, $status_usuario) {

        if (empty(trim($nome_pessoa)) || empty(trim($email)) || empty(trim($senha)) || empty(trim($data_nascimento)) || empty(trim($cod_cidade)) || empty(trim($sexo_pessoa)) || empty(trim($cod_tiposangue))) {
            return 0;
        }

        if (strlen(trim($nome_pessoa)) < 7) {
            return -2;
        }

        if (strlen(trim($senha)) < 6) {
            return -3;
        }

        if (trim($senha) != trim($confirmar_senha)) {
            return -4;
        }

        if (empty(trim($tel_cel)) && empty(trim($tel_fixo))) {
            return -5;
        }


        $objDao = new PessoaDAO();
        try {

            $data_nascimento = explode('/', $data_nascimento)[2] . '-' .explode('/', $data_nascimento)[1]. '-' .explode('/', $data_nascimento)[0];
            $data_ultima = explode('/', $data_ultima) [2] . '-' .explode('/', $data_ultima) [1] . '-' .explode('/', $data_ultima) [0];
            $codigo = $objDao->InserirPessoa(trim($nome_pessoa),trim($email),trim($senha),trim($data_nascimento),trim($tel_fixo),trim($tel_cel),trim($data_ultima), $cod_cidade, $sexo_pessoa, $cod_tiposangue, $precisa_sangue, $status_usuario);
            util::GuardarInformacao($codigo, $nome_pessoa);
            return 1;
        } catch (Exception $exc) {
          echo $exc->getMessage();
            return -1;
        }
    }

    public function AlterarPessoa($nome_pessoa, $email, $data_nascimento, $tel_fixo, $tel_cell, $data_ultima, $cod_cidade, $tipo_sangue, $sexo_pessoa, $precisa_sangue, $status_usuario, $cod_pessoa) {

        if (empty($nome_pessoa) || empty($email) || empty($data_nascimento) || empty($cod_cidade) || empty($sexo_pessoa) || ($tipo_sangue == '')) {

            return 0;
        }
        $objDao = new pessoaDAO();

        try {

            $objDao->AlterarPessoa($nome_pessoa, $email, $data_nascimento, $tel_fixo, $tel_cell, $data_ultima, $cod_cidade, $tipo_sangue, $sexo_pessoa, $precisa_sangue, $status_usuario, $cod_pessoa);

            return 1;
        } catch (Exception $exc) {
            echo $exc->getMessage();
            return -1;
        }
    }

    public function CarregarMinhasInformacoes($cod_pessoa) {

        $objDao = new pessoaDAO();
        return $objDao->CarregarMinhasInformacoes($cod_pessoa);
    }

    public function ListarCidades($cod_estado) {
        $objDao = new PessoaDAO();
        return $objDao->ListarCidades($cod_estado);
    }

    public function ListarTipoSangues() {
        $objDao = new PessoaDAO();
        return $objDao->ListarTipoSangues();
    }

    public function FiltrarPesquisa($tipo_pesquisa, $cod_cidade, $tipo_sangue) {

        if ($tipo_sangue == '' || $cod_cidade == '' || $tipo_sangue == '') {

            return 0;
        }

        $objDao = new pessoaDAO();
        return $objDao->FiltrarPesquisa($tipo_pesquisa, $cod_cidade, $tipo_sangue);
    }

    public function ValidarLogin($email, $senha) {

        if (trim($email) == '' || trim($senha) == '') {
            return 0;
        }

        try {
            $obj = new pessoaDAO();

            $usuario = $obj->ValidarLogin($email, $senha);

            //Verifica 

            if (count($usuario) > 0) {

                $cod = $usuario[0]['cod_pessoa'];
                $nome = $usuario[0]['nome_pessoa'];

                util::GuardarInformacao($cod, $nome);

                return 1;
            }

            return -2;
        } catch (Exception $ex) {
            return -1;
        }
    }

}
