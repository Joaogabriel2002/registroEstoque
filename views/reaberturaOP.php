<?php
require_once "../php/Usuario.php";
require_once "../php/reabertura.php";
$usuario = new Usuario();

$usuarios = $usuario->consultarUsuarios();


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $usuario_id = isset($_POST['usuario']) ? $_POST['usuario'] : null;
    $nrOP= isset($_POST['nrop']) ? $_POST['nrop']: null;
    $motivo= isset($_POST['motivo']) ? $_POST['motivo']: null;
    $descricao= isset($_POST['descricao']) ? $_POST['descricao']:null;

    if($usuario_id && $nrOP &&$motivo !== null){
        $reaberturaOp= new reabertura();
        $reaberturaOp->setUsuario_id($usuario_id);
        $reaberturaOp->setNrOp($nrOP);
        $reaberturaOp->setMotivo($motivo);
        $reaberturaOp->setDescricao($descricao);

        $novaReabertura = $reaberturaOp->solicitarReabertura();

    }else{

        echo "Erro: Alguns dados não foram enviados corretamente.";

    }

}

?>

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
        <form action="reaberturaOP.php" method="POST">
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
            </div><p>


        <label for="numeroOP">Número da O.P.</label>
        <input type="number" name="nrop" id="nrop">
        <p>
        <label for="motivo">Motivo:</label>
        <select name="motivo" id="motivo"> 
            <option value="">Selecione</option>
            <option value="Ajuste"> Ajuste Necessário</option>
            <option value="Erro na Quantidade do PA">Erro na Quantidade do PA</option>
            <option value="Erro na Baixa dos Insumos">Erro na Baixa dos Insumos</option>
        </select><p>

        <label for="motivo">Detalhes:</label>
        <input type="text" name="descricao" id="descricao"><p>

        <button type="submit">Abrir solicitação</button>
        <button type="button" onclick="window.location.href='../php/index.php';">Voltar</button>
    </form>
        
</body>
</html>