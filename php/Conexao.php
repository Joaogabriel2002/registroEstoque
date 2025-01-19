<?php
class Conexao {
    private $dbname = "estoque";
    private $user = "root";
    private $password = "";
    private $host = "localhost";
    public $conn;
    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo json_encode(['descricao' => 'Erro de conexão: ' . $e->getMessage()]);
            exit;
        }
    }
}
try {

    $db = new Conexao();
    $pdo = $db->conn;

    if (isset($_GET['codigo'])) {
        $codigo = $_GET['codigo'];

        $stmt = $pdo->prepare("SELECT descricaoItem FROM itens WHERE codItem = :codigo");
        $stmt->bindParam(':codigo', $codigo, PDO::PARAM_STR);
        $stmt->execute();

        $descricao = $stmt->fetchColumn();

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