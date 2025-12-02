<?php
session_start();
require_once("Conexao.php");

if (empty($_POST["nome"]) || empty($_POST["categoria"]) || empty($_POST["preco"]) || !isset($_POST["estoque"])) {
    header("Location: EditarProduto.php?id=" . $_POST['id'] . "&error=faltando_dados");
    exit;
}

$id = $_POST["id"];
$nome = $_POST["nome"];
$categoria = $_POST["categoria"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$estoque = $_POST["estoque"];

if (strlen($nome) < 3 || strlen($nome) > 100){
    header("Location: EditarProduto.php?id=" . $id . "&error=nome_invalido");
    exit;
}

if ($preco <= 0){
    header("Location: EditarProduto.php?id=" . $id . "&error=preco_invalido");
    exit;
}

if ($estoque < 0){
    header("Location: EditarProduto.php?id=" . $id . "&error=estoque_invalido");
    exit;
}

update_produto($id, $nome, $categoria, $preco, $descricao, $estoque);
header("Location: ListaProdutos.php?success=atualizado");
exit;
?>