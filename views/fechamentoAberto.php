<?php
    if(isset($_GET['idProblema'])){
        $idProblema = htmlspecialchars($_GET['idProblema']);
        //echo $idSolicitacao;
    }else{
        $idProblema=null;
        //echo "Erro";
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajuste Solicitado</title>
    </head>
    <body>
        <h1>Ajuste Solicitado!</h1>
        <?php if ($idProblema):?>
            <p>Ajuste Solicitado com Sucesso! Informar o ID ao resposável.<p>
            <p>ID: <strong><?php echo $idProblema;?></strong></p>
        <?php else:?>
            <p>Erro: O ID não foi recebido corretamente.</p>
        <?php endif;?>
        <a href="..\php\index.php"> Voltar</a>
    </body>
    </html>