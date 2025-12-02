<?php
session_start();
require_once("Conexao.php");
$produto = select_produto($_GET['id']);

if (!$produto) {
    header("Location: ListaProdutos.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border: 1px solid #ddd;
        }

        h1 {
            color: #3E2723;
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
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #999;
            font-size: 14px;
            font-family: Arial, sans-serif;
        }

        textarea {
            min-height: 80px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
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
        <h1>Editar Produto</h1>

        <?php
        if (isset($_GET['error'])) { // da a mensagen de erro coso algo de errado
            echo '<div class="error">';
            switch ($_GET['error']) {
                case 'faltando_dados': echo 'Preencha todos os campos obrigatórios!'; break;
                case 'nome_invalido': echo 'Nome deve ter 3-100 caracteres.'; break;
                case 'preco_invalido': echo 'Preço deve ser maior que zero.'; break;
                case 'estoque_invalido': echo 'Estoque não pode ser negativo.'; break;
            }
            echo '</div>';
        }
        ?>

        <form action="EditarProdutoProcesso.php" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($produto['id']); ?>">

            <label>Nome do Produto:</label>
            <input type="text" name="nome" value="<?php echo htmlspecialchars($produto['nome']); ?>">

            <label>Categoria:</label>
            <select name="categoria">
                <option value="">Selecione...</option>
                <option value="Cafés" <?php echo ($produto['categoria'] == 'Cafés') ? 'selected' : ''; ?>>Cafés</option>
                <option value="Bebidas Quentes" <?php echo ($produto['categoria'] == 'Bebidas Quentes') ? 'selected' : ''; ?>>Bebidas Quentes</option>
                <option value="Bebidas Frias" <?php echo ($produto['categoria'] == 'Bebidas Frias') ? 'selected' : ''; ?>>Bebidas Frias</option>
                <option value="Doces" <?php echo ($produto['categoria'] == 'Doces') ? 'selected' : ''; ?>>Doces</option>
                <option value="Salgados" <?php echo ($produto['categoria'] == 'Salgados') ? 'selected' : ''; ?>>Salgados</option>
                <option value="Sobremesas" <?php echo ($produto['categoria'] == 'Sobremesas') ? 'selected' : ''; ?>>Sobremesas</option>
            </select>

            <label>Preço (R$):</label>
            <input type="number" name="preco" step="0.01" value="<?php echo htmlspecialchars($produto['preco']); ?>">

            <label>Descrição:</label>
            <textarea name="descricao"><?php echo htmlspecialchars($produto['descricao']); ?></textarea>

            <label>Estoque (unidades):</label>
            <input type="number" name="estoque" value="<?php echo htmlspecialchars($produto['estoque']); ?>">

            <div class="buttons">
                <a href="ListaProdutos.php" class="btn">Cancelar</a>
                <button type="submit">Salvar</button>
            </div>
        </form>
    </div>
</body>
</html>