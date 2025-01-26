<?php
require_once "../php/Usuario.php";
require_once "../php/opproblema.php";
$usuario = new Usuario();

$usuarios = $usuario->consultarUsuarios();

    if($_SERVER['REQUEST_METHOD']==='POST'){
        $usuario_id = isset($_POST['usuario']) ? $_POST['usuario'] : null;
        $itens_IdItem = isset($_POST['idItem']) ? $_POST['idItem'] : null;
        $nrOp = isset($_POST['nrop']) ? $_POST['nrop']: null;
        $descricao = isset($_POST['detalhes']) ? $_POST['detalhes'] :null;
       
      
            $opproblema = new opproblema();
            $opproblema->setUsuario_Id($usuario_id);
            $opproblema->setItens_idItem($itens_IdItem);
            $opproblema->setNrOp($nrOp);
            $opproblema->setDescricao($descricao);

            $novoOpProb = $opproblema->abrirSolicitacao();

  
            if($novoOpProb){
                header("Location: fechamentoAberto.php?idProblema=". $novoOpProb);
            exit();
             }else{
                echo "Erro ao abrir chamado!";
            }
    }
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
    <form action="fechamentoOP.php" method="POST">

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
        <input type="number" name="nrop" id="nrop">
        <p>
        <div class="form-group">
                <label for="codigo">Código do Item:</label>
                <input type="text" id="codigo" name="codigo" oninput="buscarDescricao()">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" id="descricao" name="descricao" readonly>
                <input type="hidden" id="idItem" name="idItem">
            </div><p>

            <div id="detalhes" >
            <label for="outro">Detalhes do Problema(opcional):</label>
            <input type="text" id="detalhes" name="detalhes">
        </div><p>

        <button type="submit"> Abrir Solicitação:</button>
        <button type="button" onclick="window.location.href='../php/index.php';">Voltar</button>
    </form>
</body>
</html>
