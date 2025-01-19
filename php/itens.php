<?php

require_once Conexao.php;

try {
    // Criar instância da classe Conexao
    $db = new Conexao();
    $pdo = $db->conn;

    // Verificar se o parâmetro 'codigo' foi enviado
    if (isset($_GET['codigo'])) {
        $codigo = $_GET['codigo'];

        // Preparar a consulta para buscar a descrição no banco
        $stmt = $pdo->prepare("SELECT descricaoItem FROM itens WHERE codItem = :codigo");
        $stmt->bindParam(':codigo', $codigo, PDO::PARAM_STR);
        $stmt->execute();

        // Obter a descrição
        $descricao = $stmt->fetchColumn();

        // Verificar se encontrou a descrição
        if ($descricao) {
            echo json_encode(['descricao' => $descricao]); // Retornar descrição encontrada
        } else {
            echo json_encode(['descricao' => 'Descrição não encontrada.']); // Nenhum resultado
        }
    } else {
        echo json_encode(['descricao' => 'Código não fornecido.']); // Parâmetro ausente
    }
} catch (PDOException $e) {
    echo json_encode(['descricao' => 'Erro ao conectar ao banco de dados.']);
}

?>
