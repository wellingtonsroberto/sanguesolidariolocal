<?php

require_once 'Conexao.class.php';

/**
 * Description of pessoaDAO
 * Classe responsavel em dar manutenção ao USECASE AdministraPessoa
 * @author Tom
 */
class pessoaDAO extends Conexao {
// A função "extends" é a herança entre uma classe e outra.

    /** @var PDOStatement */
    private $inserir;

    /** @var PDOStatement */
    private $alterar;

    /** @var PDOStatement */
    private $consultar;

    /** @var PDO */
    private $con;

    public function AlterarSenha($nova_senha, $cod_usuario) {

        $this->con = parent::getConexao();

        $this->alterar = 'UPDATE tb_pessoa SET senha_pessoa = ? WHERE cod_pessoa = ?';

        $this->alterar = $this->con->prepare($this->alterar);

        $this->alterar->bindValue(1, $nova_senha);
        $this->alterar->bindValue(2, $cod_usuario);

        $this->alterar->execute();
    }

    public function InserirPessoa($nome_pessoa, $email, $senha, $data_nascimento, $tel_fixo, $tel_cell, $data_ultima, $cod_cidade, $sexo_pessoa, $tipo_sangue, $precisa_sangue, $status_pessoa) {

        //1 Passo: Receber a conecao configurada

        $this->con = parent::getConexao();

        //2 Passo: Montar o SQL

        $this->inserir = 'INSERT INTO tb_pessoa '
                . '('
                . 'nome_pessoa, '
                . 'email_pessoa,'
                . 'senha_pessoa,'
                . 'data_nascimento,'
                . 'telefone_pessoa,'
                . 'celular_pessoa,'
                . 'ultima_doacao,'
                . 'cod_cidade,'
                . 'sexo_pessoa,'
                . 'cod_tiposangue,'
                . 'precisa_sangue,'
                . 'status_pessoa'
                . ')'
                . ' VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';

        //3 Passo: Preparar para executar
        $this->inserir = $this->con->prepare($this->inserir);

        //4 Passo:  Linkar valores referentes a "?"

        $this->inserir->bindValue(1, $nome_pessoa);
        $this->inserir->bindValue(2, $email);
        $this->inserir->bindValue(3, $senha);
        $this->inserir->bindValue(4, $data_nascimento);
        $this->inserir->bindValue(5, $tel_fixo);
        $this->inserir->bindValue(6, $tel_cell);
        $this->inserir->bindValue(7, $data_ultima);
        $this->inserir->bindValue(8, $cod_cidade);

        $this->inserir->bindValue(9, $sexo_pessoa);
        $this->inserir->bindValue(10, $tipo_sangue);
        $this->inserir->bindValue(11, $precisa_sangue);
        $this->inserir->bindValue(12, $status_pessoa);


        //5 passo: Executar
        $this->inserir->execute();
        return $this->con->lastInsertId();
    }

    public function AlterarPessoa($nome_pessoa, $email, $data_nascimento, $tel_fixo, $tel_cell, $data_ultima, $cod_cidade, $tipo_sangue, $sexo_pessoa, $precisa_sangue, $status_usuario, $cod_pessoa) {

        $this->con = parent::getConexao();

        $this->alterar = 'UPDATE tb_pessoa'
                . " SET nome_pessoa = ?, "
                . "   email_pessoa = ?,"
                . "   data_nascimento = ?,"
                . "   telefone_pessoa = ?,"
                . "   celular_pessoa = ? ,"
                . "   ultima_doacao = ?,"
                . "   cod_cidade = ?,"
                . "   sexo_pessoa = ?,"
                . "   cod_tiposangue = ?,"
                . "   precisa_sangue = ?,"
                . "status_pessoa = ? "
                . "WHERE cod_pessoa = ?";




        $this->alterar = $this->con->prepare($this->alterar);


        $this->alterar->bindValue(1, $nome_pessoa);
        $this->alterar->bindValue(2, $email);
        $this->alterar->bindValue(3, $data_nascimento);
        $this->alterar->bindValue(4, $tel_fixo);
        $this->alterar->bindValue(5, $tel_cell);
        $this->alterar->bindValue(6, $data_ultima);
        $this->alterar->bindValue(7, $cod_cidade);
        $this->alterar->bindValue(8, $sexo_pessoa);
        $this->alterar->bindValue(9, $tipo_sangue);
        $this->alterar->bindValue(10, $precisa_sangue);
        $this->alterar->bindValue(11, $status_usuario);
        $this->alterar->bindValue(12, $cod_pessoa);






        $this->alterar->execute();
    }

    public function CarregarMinhasInformacoes($cod_pessoa) {

        $this->con = parent :: getConexao();
        $this->consultar = "SELECT nome_pessoa,"
                . "email_pessoa,"
                . "data_nascimento,"
                . "telefone_pessoa,"
                . "celular_pessoa,"
                . "ultima_doacao,"
                . "cod_cidade,"
                . "sexo_pessoa,"
                . "tb_pessoa.cod_tiposangue,"
                . "nome_tipo,"
                . "precisa_sangue,"
                . "status_pessoa from tb_pessoa INNER JOIN tb_tiposangue ON tb_pessoa.cod_tiposangue = tb_tiposangue.cod_tiposangue "
                . "WHERE cod_pessoa = ?";

        $this->consultar = $this->con->prepare($this->consultar);

        $this->consultar->bindValue(1, $cod_pessoa);

        //Configura o resultado da pequisa em formato de array (CHAVE (Nome da Coluna) + VALOR(registro))
        $this->consultar->setFetchMode(PDO::FETCH_ASSOC);

        $this->consultar->execute();

        return $this->consultar->fetchAll();
    }

    public function ListarCidades($cod_estado) {

        $this->Con = parent::getConexao();

        $this->Consultar = 'SELECT nome_cidade, cod_cidade, cod_estado FROM tb_cidade WHERE cod_estado = ?';

        $this->Consultar = $this->Con->prepare($this->Consultar);

        $this->Consultar->bindValue(1, $cod_estado);

        $this->Consultar->setFetchMode(PDO::FETCH_ASSOC);

        $this->Consultar->execute();

        return $this->Consultar->fetchAll();
    }

    public function ListarTipoSangues() {

        $this->Con = parent::getConexao();

        $this->Consultar = 'SELECT cod_tiposangue, nome_tipo FROM tb_tiposangue';

        $this->Consultar = $this->Con->prepare($this->Consultar);

        $this->Consultar->setFetchMode(PDO::FETCH_ASSOC);

        $this->Consultar->execute();

        return $this->Consultar->fetchAll();
    }

    public function FiltrarPesquisa($tipo_pesquisa, $cod_cidade, $tipo_sangue) {

        $this->con = parent::getConexao();

        $this->consultar = 'SELECT nome_pessoa,'
                . ' email_pessoa,'
                . ' telefone_pessoa,'
                . ' celular_pessoa,'
                . ' url_foto, '
                . 'nome_cidade,'
                . 'nome_tipo '
                . ' FROM tb_pessoa INNER JOIN tb_cidade ON tb_pessoa.cod_cidade = tb_cidade.cod_cidade '
                . ' INNER JOIN tb_tiposangue ON tb_tiposangue.cod_tiposangue = tb_pessoa.cod_tiposangue '
                . ' WHERE precisa_sangue = ? '
                . ' AND tb_pessoa.cod_cidade = ?'
                . ' AND tb_pessoa.cod_tiposangue = ?';
        $this->consultar = $this->con->prepare($this->consultar);

        $this->consultar->bindValue(1, $tipo_pesquisa);
        $this->consultar->bindValue(2, $cod_cidade);
        $this->consultar->bindValue(3, $tipo_sangue);

        $this->consultar->setFetchMode(PDO::FETCH_ASSOC);

        $this->consultar->execute();

        return $this->consultar->fetchAll();
    }

    public function ValidarLogin($email, $senha) {
    
        $this->con = parent::getConexao();
        
        $this->consultar = 'SELECT cod_pessoa, nome_pessoa FROM tb_pessoa WHERE email_pessoa = ? AND senha_pessoa = ?';
        
        $this->consultar = $this->con->prepare($this->consultar);
        
        $this->consultar->bindValue(1, $email);
        $this->consultar->bindValue(2, $senha);
        
        $this->consultar->setFetchMode(PDO::FETCH_ASSOC);
        
        $this->consultar->execute();
        
        return $this->consultar->fetchAll();
                
        
    }

}
