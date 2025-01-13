<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajuste de Estoque</title>
    
</head>
<body>

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
                <label for="codigo">Código do Item:</label>
                <input type="text" id="codigo" name="codigo" oninput="buscarDescricao()">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" id="descricao" name="descricao" readonly>
            </div>

            <div class="form-group">
                <label for="diferenca">Qtd que Falta/Sobra:</label>
                <input type="number" id="diferenca" name="diferenca">
                <label for="kglt">kg/lt</label>
            </div>

            <button type="submit">Solicitar Ajuste</button>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>
