<?php
if (isset($_POST['btnOk'])) {

    $nome = $_POST['nome_usuario'];

    if (empty($nome)) {
        echo 'Preencher o campo NOME';
    } else {
        echo 'O nome digitado eh: ' . $nome;
    }
} else {
    echo 'Nao foi clicado';
}
?>

<form method="post" action="post_get.php">

    <input type="text" name="nome_usuario" id="nome_usuario" maxlength="45">
    <button name="btnOk" id="btnOk">Enviar</button>

</form>

