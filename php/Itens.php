<?php
header('Content-Type: application/json');

require_once 'Conexao.php';

class Itens extends Conexao
{
    public function buscarDescricao($codigo)
    {
        try {
            $pdo = $this->conn;

            // Modifiquei a consulta para pegar tanto o idItem quanto a descricaoItem
            $stmt = $pdo->prepare("SELECT idItem, descricaoItem FROM itens WHERE codItem = :codigo");
            $stmt->bindParam(':codigo', $codigo, PDO::PARAM_STR);
            $stmt->execute();

            // Pegando os dois valores (idItem e descricaoItem)
            $item = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($item) {
                return json_encode([
                    'id' => $item['idItem'],       // Retorna o id do item
                    'descricaoItem' => $item['descricaoItem'] // Retorna a descrição do item
                ]);
            } else {
                return json_encode(['descricaoItem' => 'Descrição não encontrada.']);
            }
        } catch (PDOException $e) {
            return json_encode(['descricaoItem' => 'Erro ao conectar ao banco de dados.']);
        }
    }
}

if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    $db = new Itens();
    echo $db->buscarDescricao($codigo);
} else {
    echo json_encode(['descricaoItem' => 'Código não fornecido.']);
}


?>
