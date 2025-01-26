<?php
require_once "../php/Usuario.php";
require_once "../php/ajusteEstoque.php";
$usuario = new Usuario();

$usuarios = $usuario->consultarUsuarios();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordens de Produção</title>
    <script src="../js/op.js" defer></script>
    <script src="../js/script.js" defer> </script>
       
</head>
<body>
    <h1>Problema com Fechamento de O.P.</h1>
    <br>
    <form id="fechamentoOp">

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
        <p>
        <br>

        <label for="numeroOP">Número da O.P.</label>
        <input type="number" id="numeroOP">
        <p>

        <label for="motivo">Motivo:</label>
        <select name="motivo" id="motivo" required onchange="verificaMotivo()">
            <option value="">Selecione:</option>
            <option value="ErroSistema">Erro de Sistema</option>
            <option value="FaltaInsumo">Falta de Insumo</option>
            <option value="Outro">Outro</option>
        </select>

        <div id="detalhes" style="display:none;">
            <label for="outro">Descreva:</label>
            <input type="text" id="outro">
        </div><p>

        <div id="funcao" style="display:none;">
        <div class="form-group">
                <label for="codigo">Código do Item:</label>
                <input type="text" id="codigo" name="codigo" oninput="buscarDescricao()">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" id="descricao" name="descricao" readonly>
                <input type="hidden" id="idItem" name="idItem">
            </div><p>
        </div>
        <button type="submit"> Abrir Solicitação:</button>
        <button type="button" onclick="window.location.href='../php/index.php';">Voltar</button>
    </form>
</body>
</html>
