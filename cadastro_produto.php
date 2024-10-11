<?php
include 'conexao.php';

$produto = isset($_POST['produto']) ? $_POST['produto'] : null;
$qtd = isset($_POST['qtd']) ? $_POST['qtd'] : null;
$preco = isset($_POST['preco']) ? floatval($_POST['preco']) : null; 

if ($pdo) {
    try {
        $sql = "INSERT INTO tbProduto(produto, qtd, preco) VALUES (:produto, :qtd, :preco)";
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute([
            ':produto' => $produto,
            ':qtd' => $qtd,
            ':preco' => $preco
        ]);

        if ($stmt->rowCount() > 0) {
            echo "Produto cadastrado com sucesso.";
        } else {
            echo "Erro: nenhum produto foi cadastrado.";
        }
    } catch (PDOException $e) {
        echo "Erro ao cadastrar: " . $e->getMessage();
    }
} else {
    echo "Erro: conexão não estabelecida.";
}
?>
