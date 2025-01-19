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

        <label for="usuario">Usuário:</label>
        <input type="text" id="usuario">
        <p>

        <label for="setor">Setor:</label>
        <select name="setor" id="setor">
            <option value="aerossol">Aerossol</option>
            <option value="cosmeticos">Cosmético</option>
            <option value="saneantes">Saneantes</option>
        </select>
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
            </div><p>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" id="descricao" name="descricao" readonly>
            </div><br>
        </div>
        <button type="submit"> Abrir Solicitação:</button>
        <button type="button" onclick="window.location.href='../php/index.php';">Voltar</button>
    </form>
</body>
</html>
