<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Cafeteria</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #5D4037;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
        }

        .logo {
            width: 50px;
            height: 50px;
            background: #D4AF37;
            border-radius: 50%;
            margin: 0 auto 20px;
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
            border-radius: 4px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        label {
            display: block;
            color: #5D4037;
            margin-bottom: 5px;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #D4AF37;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #D4AF37;
            color: #3E2723;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #C5A028;
        }

        .link {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
            color: #666;
        }

        .link a {
            color: #D4AF37;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo"></div>
        <h1>Sol Dourado</h1>

        <?php
        if (isset($_GET['error'])) {
            echo '<div class="error">';
            if ($_GET['error'] == 'faltando_dados') echo 'Preencha todos os campos!';
            if ($_GET['error'] == 'Dados_incorretos') echo 'Email ou senha incorretos!';
            echo '</div>';
        }
        ?>

        <form action="LoginProcesso.php" method="POST">
            <label>Email:</label>
            <input type="text" name="email" value="<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : ''; ?>">

            <label>Senha:</label>
            <input type="password" name="senha">

            <button type="submit">Entrar</button>
        </form>

        <div class="link">
            Não tem conta? <a href="Cadastro.php">Cadastre-se</a>
        </div>
    </div>
</body>
</html>