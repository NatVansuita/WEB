<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Cafeteria</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #5D4037;
            padding: 20px;
        }

        .container {
            background: white;
            padding: 30px;
            width: 100%;
            max-width: 400px;
            margin: 20px auto;
            border: 1px solid #333;
        }

        h1 {
            text-align: center;
            color: #3E2723;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .error {
            background: #ffebee;
            color: #c62828;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #c62828;
        }

        label {
            display: block;
            color: #5D4037;
            margin-bottom: 5px;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #999;
            font-size: 14px;
        }

        .buttons {
            display: flex;
            gap: 10px;
        }

        button, .btn {
            flex: 1;
            padding: 10px;
            border: none;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }

        button {
            background: #D4AF37;
            color: #3E2723;
        }

        .btn {
            background: #8D6E63;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cadastro</h1>

        <?php
        if (isset($_GET['error'])) { //cria as mensagens de erros caso tenha
            echo '<div class="error">';
            switch ($_GET['error']) {
                case 'faltando_dados': echo 'Preencha todos os campos!'; break;
                case 'nome_invalido': echo 'Nome deve ter 10-50 caracteres.'; break;
                case 'email_invalido': echo 'Email deve ter no mínimo 15 caracteres.'; break;
                case 'senha_invalido': echo 'Senha deve ter 1-5 caracteres.'; break;
                case 'telefone_invalido': echo 'Telefone deve ter 10 dígitos.'; break;
                case 'data_invalido': echo 'Data de nascimento inválida.'; break;
            }
            echo '</div>';
        }
        ?>

        <form action="CadastroProcesso.php" method="POST">
            <label>Nome Completo:</label>
            <input type="text" name="nome" value="<?php echo isset($_GET['nome']) ? htmlspecialchars($_GET['nome']) : ''; ?>">

            <label>Email:</label>
            <input type="text" name="email" value="<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : ''; ?>">

            <label>Senha:</label>
            <input type="password" name="senha" value="<?php echo isset($_GET['senha']) ? htmlspecialchars($_GET['senha']) : ''; ?>">

            <label>Telefone:</label>
            <input type="text" name="telefone" value="<?php echo isset($_GET['telefone']) ? htmlspecialchars($_GET['telefone']) : ''; ?>">

            <label>Data de Nascimento:</label>
            <input type="date" name="dataNascimento" value="<?php echo isset($_GET['dataNascimento']) ? htmlspecialchars($_GET['dataNascimento']) : ''; ?>">

            <div class="buttons">
                <a href="Login.php" class="btn">Voltar</a>
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </div>
</body>
</html>