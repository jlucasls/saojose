<?php
include 'conexao.php';

$sql = "SELECT * FROM tbProduto";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleTb.css">
    <title>Listagem de Produtos</title>
</head>
<body>
<h2>Listagem de Produtos</h2>

<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Quantidade</th>
            <th>Preço</th>
        </tr>
    </thead> 
    <tbody>
        <?php foreach ($produtos as $produto): ?>
        <tr>
            <td><?php echo htmlspecialchars($produto['produto']); ?></td>
            <td><?php echo htmlspecialchars($produto['qtd']); ?></td>
            <td><?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<tbody>
    <?php foreach ($produtos as $produto): ?>
    <tr>
        <td><?php echo htmlspecialchars($produto['produto']); ?></td>
        <td><?php echo htmlspecialchars($produto['qtd']); ?></td>
        <td><?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
        <td>
            <form action="excluir_produto.php" method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo $produto['id_prod']; ?>">
                <input type="submit" value="Excluir" onclick="return confirm('Tem certeza que deseja excluir este produto?');">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</tbody>


</body>
</html>
