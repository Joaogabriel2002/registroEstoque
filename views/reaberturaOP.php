<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordens de Produção</title>
    <script src="../js/script.js" defer></script>
</head>
<body>
    <h1>Rebertura de OP</h1><br>

    <form id="reabertura">
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

        <label for="motivo">Detalhes:</label>
        <input type="text"><p>

        <button type="submit">Abrir solicitação</button>
        <button type="button" onclick="window.location.href='../php/index.php';">Voltar</button>
    </form>
        
</body>
</html>