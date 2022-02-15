<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contêiner</title>
</head>
<body>
    <h1>Editar Contêiner</h1>
    <a href="index.php?classe=ConteinerController&metodo=abrirConsulta">Voltar para a página de consulta</a><br>
    
    <form action="index.php?classe=ConteinerController&metodo=atualizarConteiner" method="post">
        
        <input type="hidden" name="codconteiner" value="<?php echo $dadosConteiner->codconteiner; ?>" readonly>
    
        Cliente:<br>
        <input type="text" name="cliente" value="<?php echo $dadosConteiner->cliente; ?>"><br><br>

        Número do contêiner:<br>
        <input type="text" name="numero" placeholder="TEST1234567" pattern="[A-Z]{4}[0-9]{7}" maxlength="11" required value="<?php echo $dadosConteiner->numero;?>"><br>
        <small>Formato: TEST1234567</small><br><br>
        

        tipo:<br>
        <select name="tipo">
            <option value="1">20</option>
            <option value="2">40</option>
        </select><br><br>

        status:<br>
        <select name="statu">
            <option value="1">Cheio</option>
            <option value="2">Vazio</option>
        </select><br><br>

        Categoria:<br>
        <select name="categoria">
            <option value="1">Importação</option>
            <option value="2">Exportação</option>
    </select><br><br>

        <input type="submit" value="Gravar">
    </form>
</body>
</html>