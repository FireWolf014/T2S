<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimentações</title>
</head>
<body>

    <h1>Movimentações</h1>
    <a href="index.php">Voltar para a página inicial</a><br><br>
    
    <form action="index.php?classe=MovimentacaoController&metodo=cadastrarMovimentacao" method="post">

    Tipo de Movimentação: <br>
    <select name="movimentacao">
            <option value="1">Embarque</option>
            <option value="2">Descarga</option>
            <option value="3">Gate in</option>
            <option value="4">Gate out</option>
            <option value="5">Reposicionamento</option>
            <option value="6">Pesagem</option>
            <option value="7">Scanner</option>
    </select><br><br>
    Data e Hora do Início: <br>
    <input type="datetime-local" name="inicio" required><br><br>

    Data e Hora do Fim: <br>
    <input type="datetime-local" name="fim" required><br><br>
 
    Cliente: <br>
    <select name="codconteiner">
            <?php 
            foreach($dadosConteiner as $value)
            {
                echo "<option value='$value->codconteiner'>$value->cliente</option>";
            }
            ?>
        </select><br><br>

    <input type="submit" value="Gravar">
    </form>
    
</body>
</html>

