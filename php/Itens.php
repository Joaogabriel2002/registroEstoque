<?php
header('Content-Type: application/json');

require_once 'Conexao.php';

class Itens extends Conexao
{
    public function buscarDescricao($codigo)
    {
        try {
            $pdo = $this->conn;

            $stmt = $pdo->prepare("SELECT descricaoItem FROM itens WHERE codItem = :codigo");
            $stmt->bindParam(':codigo', $codigo, PDO::PARAM_STR);
            $stmt->execute();

            $descricao = $stmt->fetchColumn();

            if ($descricao) {
                return json_encode(['descricaoItem' => $descricao]);
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
