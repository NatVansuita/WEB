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
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        h1 {
            color: #3E2723;
            font-size: 24px;
        }

        .btn {
            padding: 10px 20px;
            background: #D4AF37;
            color: #3E2723;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            font-size: 14px;
        }

        .btn:hover {
            background: #C5A028;
        }

        table {
            width: 100%;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #5D4037;
            color: white;
            font-weight: bold;
        }

        tr:hover {
            background: #f9f9f9;
        }

        .categoria {
            display: inline-block;
            padding: 4px 8px;
            background: #D4AF37;
            color: #3E2723;
            border-radius: 3px;
            font-size: 12px;
            font-weight: bold;
        }

        .preco {
            color: #D4AF37;
            font-weight: bold;
        }

        .estoque-baixo {
            color: #c62828;
            font-weight: bold;
        }

        .estoque-ok {
            color: #2e7d32;
        }

        .acoes {
            display: flex;
            gap: 10px;
        }

        .acoes a {
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 13px;
            font-weight: bold;
        }

        .editar {
            background: #8D6E63;
            color: white;
        }

        .excluir {
            background: #c62828;
            color: white;
        }

        .editar:hover {
            background: #6D4C41;
        }

        .excluir:hover {
            background: #b71c1c;
        }

        .empty {
            text-align: center;
            padding: 60px;
            background: white;
            border-radius: 8px;
            color: #666;
        }

        @media (max-width: 768px) {
            table {
                font-size: 12px;
            }
            
            th, td {
                padding: 8px;
            }

            .header {
                flex-direction: column;
                gap: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>☕ Produtos da Cafeteria</h1>
        <a href="CadastroProduto.php" class="btn">+ Novo Produto</a>
    </div>

    <?php if (empty($produtos)): ?>
        <div class="empty">
            <h2>Nenhum produto cadastrado</h2>
            <p>Clique em "Novo Produto" para começar</p>
        </div>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $p): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($p['nome']); ?></td>
                        <td><span class="categoria"><?php echo htmlspecialchars($p['categoria']); ?></span></td>
                        <td class="preco">R$ <?php echo number_format($p['preco'], 2, ',', '.'); ?></td>
                        <td class="<?php echo $p['estoque'] <= 10 ? 'estoque-baixo' : 'estoque-ok'; ?>">
                            <?php echo $p['estoque']; ?> un.
                        </td>
                        <td><?php echo htmlspecialchars($p['descricao']); ?></td>
                        <td>
                            <div class="acoes">
                                <a href="EditarProduto.php?id=<?php echo $p['id']; ?>" class="editar">Editar</a>
                                <a href="ExcluirProduto.php?id=<?php echo $p['id']; ?>" class="excluir" 
                                   onclick="return confirm('Excluir este produto?')">Excluir</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>