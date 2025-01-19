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
        <form action="index.php" method="POST">
            <h3>Preencha as informações abaixo:</h3>
            
            <div class="form-group">
                <label for="setor">Setor:</label>
                <select id="setor" name="setor">
                    <option value="aerossol">Aerossol</option>
                    <option value="cosmetico">Cosmético</option>
                    <option value="saneantes">Saneantes</option>
                </select>
            </div>

            <div class="form-group">
                <label for="usuario">Usuário Solicitante:</label>
                    <input type="text" name="usuario">
            </div><p>

            <div class="form-group">
                <label for="codigo">Código do Item:</label>
                <input type="text" id="codigo" name="codigo" oninput="buscarDescricao()">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" id="descricao" name="descricao" readonly>
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

    <script src="script.js"></script>
</body>
</html>
