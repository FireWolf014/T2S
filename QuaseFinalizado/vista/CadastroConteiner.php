<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contêiner</title>
</head>
<body>

    <?php

	require_once('model/Conexao.php');

	?>

    <h1>Contêiner</h1>
    <a href="index.php">Voltar para a página inicial</a><br><br>
    
    <form action="index.php?classe=ConteinerController&metodo=cadastrarConteiner" method="post">

    Cliente: <br>
    <input type="text" name="cliente" required><br><br>

    Número do contêiner: <br>
    <input type="text" name="numero" placeholder="TEST1234567" pattern="[A-Z]{4}[0-9]{7}" maxlength="11" required><br>
    <small>Formato: TEST1234567</small><br><br>
    
    Tipo: <br>
    <select name="tipo">
            <option value="20">20</option>
            <option value="40">40</option>
    </select><br><br>

    Status: <br>
    <select name="statu">
            <option value="1">Cheio</option>
            <option value="2">Vazio</option>
    </select><br><br>

    Categoria: <br>
    <select name="categoria">
            <option value="1">Importação</option>
            <option value="2">Exportação</option>
    </select><br><br>


    <input type="submit" value="Gravar">
    </form>
    
</body>
</html>

