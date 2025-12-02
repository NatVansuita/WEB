<?php 
session_start();

if(empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['senha']) || empty($_POST['telefone']) || empty($_POST['dataNascimento'])){
    header("Location: Cadastro.php?error=faltando_dados&nome=".$_POST['nome']."&email=".$_POST['email']."&senha=".$_POST['senha']."&telefone=".$_POST['telefone']."&dataNascimento=".$_POST['dataNascimento']);
    exit;
}

if (strlen($_POST['nome']) < 10 || strlen($_POST['nome']) > 50){
    header("Location: Cadastro.php?error=nome_invalido&nome=".$_POST['nome']."&email=".$_POST['email']."&senha=".$_POST['senha']."&telefone=".$_POST['telefone']."&dataNascimento=".$_POST['dataNascimento']);
    exit;
}

if (strlen($_POST['email']) < 15){
    header("Location: Cadastro.php?error=email_invalido&nome=".$_POST['nome']."&email=".$_POST['email']."&senha=".$_POST['senha']."&telefone=".$_POST['telefone']."&dataNascimento=".$_POST['dataNascimento']);
    exit;
}

if (strlen($_POST['senha']) < 1 || strlen($_POST['senha']) > 5){
    header("Location: Cadastro.php?error=senha_invalido&nome=".$_POST['nome']."&email=".$_POST['email']."&senha=".$_POST['senha']."&telefone=".$_POST['telefone']."&dataNascimento=".$_POST['dataNascimento']);
    exit;
}

if (strlen(trim($_POST['telefone'])) != 10){
    header("Location: Cadastro.php?error=telefone_invalido&nome=".$_POST['nome']."&email=".$_POST['email']."&senha=".$_POST['senha']."&telefone=".$_POST['telefone']."&dataNascimento=".$_POST['dataNascimento']);
    exit;
}

$dataHoje = date('Y-m-d');
if (strtotime($_POST['dataNascimento']) >= strtotime($dataHoje)){
    header("Location: Cadastro.php?error=data_invalido&nome=".$_POST['nome']."&email=".$_POST['email']."&senha=".$_POST['senha']."&telefone=".$_POST['telefone']."&dataNascimento=".$_POST['dataNascimento']);
    exit;
}

require_once("Conexao.php");

$resultado = cadastra_usuario($_POST['email'], $_POST['nome'], $_POST['senha'], $_POST['telefone'], $_POST['dataNascimento']);

if ($resultado) {
    echo "<script>alert('Usuário cadastrado com sucesso! Faça login para acessar o sistema.');window.location='Login.php';</script>";
} else {
    echo "<script>alert('Erro: Esse email já está cadastrado!');window.location='Cadastro.php';</script>";
}
exit;
?>