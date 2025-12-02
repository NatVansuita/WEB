<?php
session_start();
require_once("Conexao.php");

if (isset($_GET['id'])) {
    delete_produto($_GET['id']);
    header("Location: ListaProdutos.php?success=excluido");
} else {
    header("Location: ListaProdutos.php?error=id_invalido");
}
exit;
?>