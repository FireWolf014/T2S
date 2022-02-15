<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
</head>
<body>
<h1>Relatório</h1>
    <a href="index.php">Voltar para a página inicial</a><br>
    <table border="1">
        <thead>
            <th>Cliente</th>
            <th>Tipo de movimentação</th>
            
        </thead>
        <tbody>
            <?php
            foreach ($dadosConsulta as $key => $value) {
                echo "<tr>
                        <td>$value->cliente</td>
                        <td>$value->acesso</td>
                        
                    </tr>";
            }
            ?>
        </tbody>
    </table>

    


    
</body>
</html>