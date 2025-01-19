<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordens de Produção</title>
    <script src="script.js" defer></script>
</head>
<body>
    <h1>Problema com Fechamento de O.P.</h1>
    <h2> Selecione a solicitação:</h2>
    <button type="button"> Reabrir O.P.</button>
    <button type="button"> Problema com Fechamento</button>
    <br><br>
    <form id="reabertura" style="display:none;>
        <h2>Rebertura de OP</h2>

        <label for="usuario">Usuário:</label>
        <input type="text" id="usuario"><p>
        <label for="setor">Setor:</label>
        <select name="setor" id="setor">
            <option value="aerossol">Aerossol</option>
            <option value="cosmeticos">Cosmético</option>
            <option value="saneantes">Saneantes</option>
        </select><p>
        <br>

        <label for="numeroOP">Número da O.P.</label>
        <input type="number">
        <p>
        <div class="form-group">
                <label for="codigo">Código do Item:</label>
                <input type="text" id="codigo" name="codigo" oninput="buscarDescricao()">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" id="descricao" name="descricao" readonly disabled>
            </div><p>

        <label for="motivo">Motivo:</label>
        <select name="motivo" id="motivo">
            <option value="">Selecione</option>
            <option value="">Erro na Quantidade do PA</option>
            <option value="">Erro na Baixa dos Insumos</option>
        </select><p>

        <label for="descricao">Detalhes:</label>
        <input type="text"><p>

        <button type="submit">Abrir solicitação</button>
    </form>

    <!--<form id="fechamentoOp" style="display:none;>-->
    <form id="fechamentoOp">
        <h2> Erro no Fechamento de O.P.</h2>

        <label for="usuario">Usuário:</label>
        <input type="text" id="usuario"><p>
        <label for="setor">Setor:</label>
        <select name="setor" id="setor">
            <option value="aerossol">Aerossol</option>
            <option value="cosmeticos">Cosmético</option>
            <option value="saneantes">Saneantes</option>
        </select><p>
        <br>

        <label for="numeroOP">Número da O.P.</label>
            <input type="number">
        <p>
        <label for="motivo">Motivo:</label>
        <select name="motivo" id="motivo">
            <option value="">Selecione:</option>
            <option value="Erro de Lote:">Erro de Lote</option>
            <option value="Erro de Reserva">Erro de Estoque Reservado</option>
            <option value="Não Identificado">Erro de Sistema</option>
           <option value="Falta Insumo">Falta de Insumo</option>

        </select>
        
</body>
</html>