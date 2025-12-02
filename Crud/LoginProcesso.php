<?php
session_start();
require_once("Conexao.php");

if (empty($_POST['email']) || empty($_POST['senha'])) {
    header("Location: Login.php?error=faltando_dados&email=" . urlencode($_POST['email']));
    exit;
}

$email = $_POST['email'];
$senha = $_POST['senha'];
$usuarios = select_usuarios();
$achou = false;

foreach ($usuarios as $u) {
    if ($email == $u['email'] && $senha == $u['senha']) {
        $_SESSION['usuario_logado'] = $u;
        $achou = true;
        header("Location: ListaProdutos.php");
        exit;
    }
}

if (!$achou) {
    header("Location: Login.php?error=Dados_incorretos&email=" . urlencode($email));
    exit;
}
?>