<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Movimentações</title>
</head>
<body>
    <h1>Consulta Movimentações</h1>
    <a href="index.php">Voltar para a página inicial</a><br><br>
    <table border="1">
        <thead>
            <th>Cliente</th>
            <th>Tipo de Movimentação  </th>
            <th>Data e Hora do Início</th>
            <th>Data e Hora do Fim</th>
            
            <th>Ações</th>
        </thead>
        <tbody>
            <?php
            foreach ($dadosMovimentacao as $key => $value) {
                echo "<tr>
                        <td>$value->codconteiner</td>
                        
                        <td>$value->movimentacao</td>
                        <td>$value->inicio</td>
                        <td>$value->fim</td>
                        
                        <td>
                            <a onclick=\"return confirm('Deseja excluir?')\" href='index.php?classe=MovimentacaoController&metodo=excluirMovimentacao&codmovimentacao=$value->codmovimentacao'>Excluir</a>
                            <a href='index.php?classe=Movimentacao&metodo=editarMovimentacao&codmovimentacao=$value->codmovimentacao'>Editar</a>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>

   
</body>
</html>