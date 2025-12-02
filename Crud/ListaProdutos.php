<?php
session_start();
require_once("Conexao.php");
$produtos = select_produtos();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Cafeteria</title>
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

        .header {
            background: white;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
        }

        h1 {
            color: #3E2723;
            font-size: 20px;
            display: inline-block;
        }

        .btn {
            float: right;
            padding: 8px 15px;
            background: #D4AF37;
            color: #3E2723;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
        }

        table {
            width: 100%;
            background: white;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background: #5D4037;
            color: white;
        }

        .categoria {
            background: #D4AF37;
            color: #3E2723;
            padding: 3px 8px;
            font-size: 12px;
            font-weight: bold;
        }

        .preco {
            color: #D4AF37;
            font-weight: bold;
        }

        .estoque-baixo {
            color: #c62828;
        }

        .acoes a {
            padding: 5px 10px;
            text-decoration: none;
            font-size: 13px;
            margin-right: 5px;
        }

        .editar {
            background: #8D6E63;
            color: white;
        }

        .excluir {
            background: #c62828;
            color: white;
        }

        .empty {
            text-align: center;
            padding: 40px;
            background: white;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Produtos</h1>
        <a href="CadastroProduto.php" class="btn">+ Novo</a>
        <div style="clear: both;"></div>
    </div>

    <?php if (empty($produtos)): ?>
        <div class="empty">
            <p>Nenhum produto cadastrado</p>
        </div>
    <?php else: ?>
        <table>
            <tr>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($produtos as $p): ?>
                <tr>
                    <td><?php echo htmlspecialchars($p['nome']); ?></td>
                    <td><span class="categoria"><?php echo htmlspecialchars($p['categoria']); ?></span></td>
                    <td class="preco">R$ <?php echo number_format($p['preco'], 2, ',', '.'); ?></td>
                    <td class="<?php echo $p['estoque'] <= 10 ? 'estoque-baixo' : ''; ?>">
                        <?php echo $p['estoque']; ?>
                    </td>
                    <td><?php echo htmlspecialchars($p['descricao']); ?></td>
                    <td class="acoes">
                        <a href="EditarProduto.php?id=<?php echo $p['id']; ?>" class="editar">Editar</a>
                        <a href="ExcluirProduto.php?id=<?php echo $p['id']; ?>" class="excluir" 
                           onclick="return confirm('Excluir?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>