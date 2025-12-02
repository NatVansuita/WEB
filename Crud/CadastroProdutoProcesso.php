<?php 
session_start();
//verifica se algum campo ta vazio
if(empty($_POST['nome']) || empty($_POST['categoria']) || empty($_POST['preco']) || !isset($_POST['estoque'])){
    header("Location: CadastroProduto.php?error=faltando_dados&nome=".$_POST['nome']."&categoria=".$_POST['categoria']."&preco=".$_POST['preco']."&descricao=".$_POST['descricao']."&estoque=".$_POST['estoque']);
    exit;
}

//verica as condições
if (strlen($_POST['nome']) < 3 || strlen($_POST['nome']) > 100){
    header("Location: CadastroProduto.php?error=nome_invalido&nome=".$_POST['nome']."&categoria=".$_POST['categoria']."&preco=".$_POST['preco']."&descricao=".$_POST['descricao']."&estoque=".$_POST['estoque']);
    exit;
}

if ($_POST['preco'] <= 0){
    header("Location: CadastroProduto.php?error=preco_invalido&nome=".$_POST['nome']."&categoria=".$_POST['categoria']."&preco=".$_POST['preco']."&descricao=".$_POST['descricao']."&estoque=".$_POST['estoque']);
    exit;
}

if ($_POST['estoque'] < 0){
    header("Location: CadastroProduto.php?error=estoque_invalido&nome=".$_POST['nome']."&categoria=".$_POST['categoria']."&preco=".$_POST['preco']."&descricao=".$_POST['descricao']."&estoque=".$_POST['estoque']);
    exit;
}

require_once("Conexao.php");

$result = cadastra_produto($_POST['nome'], $_POST['categoria'], $_POST['preco'], $_POST['descricao'], $_POST['estoque']);

if($result){
    header("Location: ListaProdutos.php?success=cadastrado");
} else {
    header("Location: CadastroProduto.php?error=erro_cadastro");
}
exit;
?>