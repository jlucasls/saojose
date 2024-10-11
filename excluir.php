<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    if ($pdo) {
        try {
            $sql = "DELETE FROM tbProduto WHERE id_prod = :id"; 
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':id' => $id]);

            if ($stmt->rowCount() > 0) {
                echo "Produto excluído com sucesso.";
            } else {
                echo "Erro: nenhum produto encontrado com esse ID.";
            }
        } catch (PDOException $e) {
            echo "Erro ao excluir: " . $e->getMessage();
        }
    } else {
        echo "Erro: conexão não estabelecida.";
    }
} else {
    echo "Erro: ID do produto não fornecido.";
}
?>

<a href="listarProd.php">Voltar para a lista de produtos</a>
