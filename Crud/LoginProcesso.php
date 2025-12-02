<?php
session_start();
require_once("Conexao.php");

if (empty($_POST['email']) || empty($_POST['senha'])) { // se tiver vazio ele retorna um error
    header("Location: Login.php?error=faltando_dados&email=" . urlencode($_POST['email']));
    exit;
}

//coloca as informações em variaveis
$email = $_POST['email'];
$senha = $_POST['senha'];
$usuarios = select_usuarios(); //Busca todos os usuários do banco
$achou = false;

foreach ($usuarios as $u) { //verifica se as informações estão no banco, se sim vai para listaPrud.
    if ($email == $u['email'] && $senha == $u['senha']) {
        $_SESSION['usuario_logado'] = $u;
        $achou = true;
        header("Location: ListaProdutos.php");
        exit;
    }
}

if (!$achou) {
    header("Location: Login.php?error=Dados_incorretos&email=" . urlencode($email)); //se não da error
    exit;
}
?>