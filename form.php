<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h1>Cadastro de Produtos</h1>
    <form action="cadastro_produto.php" method="post">
        <label for="produto">Produto:</label><br>
        <input type="text" id="produto" name="produto" required><br><br>

        <label for="qtd">Quantidade:</label><br>
        <input type="number" id="qtd" name="qtd" required><br><br>

        <label for="preco">Preco:</label><br>
        <input type="text" id="preco" name="preco" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>