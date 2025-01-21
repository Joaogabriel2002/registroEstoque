<?php
require_once "../php/Usuario.php";
require_once "../php/ajusteEstoque.php";
$usuario = new Usuario();

$usuarios = $usuario->consultarUsuarios();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario_id = isset($_POST['usuario']) ? $_POST['usuario'] : null;
    $idItem = isset($_POST['idItem']) ? $_POST['idItem'] : null;
    $lote = isset($_POST['lote']) ? $_POST['lote'] : null;
    $qtdContagem = isset($_POST['contagem']) ? $_POST['contagem'] : null;
    $possuiLote = isset($_POST['verificaLote']) ? $_POST['verificaLote'] : null;

    
    if ($usuario_id && $idItem && $qtdContagem !== null) {
        $ajusteEstoque = new ajusteEstoque();
        $ajusteEstoque->setUsuario_id($usuario_id);
        $ajusteEstoque->setIdItem($idItem);
        $ajusteEstoque->setLote($lote);
        $ajusteEstoque->setQtdContagem($qtdContagem);
        $ajusteEstoque->setPossuiLote($possuiLote);

        // Abrindo ajuste
        $novoAjuste = $ajusteEstoque->abrirAjuste();
      
    } else {
  
        echo "Erro: Alguns dados não foram enviados corretamente.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajuste de Estoque</title>
    <script src="../js/script.js" defer></script>
</head>
<body style="background-color: gray;">
    <div class="container">
        <h1>Ajuste de Estoque</h1>
        <form action="ajusteEstoque.php" method="POST">
            <h3>Preencha as informações abaixo:</h3>
            <div class="form-group">
                <label for="usuario">Usuário Solicitante:</label>
                <select name="usuario" id="usuario">
                    <option value=""></option>
                    <?php
                        if (!empty($usuarios)) {
                            foreach ($usuarios as $row) {
                                echo "<option value='{$row['id']}'>{$row['nomeUsuario']}</option>";
                            }
                        } else {
                            echo "<option value=''>Nenhum usuário disponível</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="codigo">Código do Item:</label>
                <input type="text" id="codigo" name="codigo" oninput="buscarDescricao()">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" id="descricao" name="descricao" readonly>
                <input type="hidden" id="idItem" name="idItem">
            </div><p>
               

            <div class="form-group">
                <label for="verificaLote">Possui Lote?</label>
                <select name="verificaLote" id="verificaLote" required onchange="verificarLote()">
                    <option value="N">Não</option>
                    <option value="S">Sim</option>
                </select>
            </div>

            <div id="lotes" style="display:none;">
                <label for="lote">Lote:</label>
                <input type="text" name="lote">
            </div><p>

            <div class="form-group">
                <label for="contagem">Quantidade Contagem:</label>
                <input type="number" id="contagem" name="contagem">
            </div>
            <p>
            <button type="submit">Solicitar Ajuste</button>
            <button type="button" onclick="window.location.href='../php/index.php';">Voltar</button>
        </form>
    </div>
</body>
</html>
