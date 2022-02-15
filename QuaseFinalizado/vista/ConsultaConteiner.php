<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Contêiner</title>
</head>
<body>
    <h1>Consulta Contêiner</h1>
    <a href="index.php">Voltar para a página inicial</a><br>
    <table border="1">
        <thead>
            <th>Nome</th>
            <th>Número do contêiner </th>
            <th>Tipo</th>
            <th>Status</th>
            <th>Categoria</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php
            foreach ($dadosConteiner as $key => $value) {
                echo "<tr>
                        <td>$value->cliente</td>
                        <td>$value->numero</td>
                        <td>$value->tipo</td>
                        <td>$value->statu</td>
                        <td>$value->categoria</td>
                        <td>
                            <a onclick=\"return confirm('Deseja excluir?')\" href='index.php?classe=ConteinerController&metodo=excluirConteiner&codconteiner=$value->codconteiner'>Excluir</a>
                            <a href='index.php?classe=ConteinerController&metodo=editarConteiner&codconteiner=$value->codconteiner'>Editar</a>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>

   
</body>
</html>