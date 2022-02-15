<?php
class Consulta
{
    
    //construtor da classe, será executado automáticamente ao instanciar esta classe
    function __construct()
    {
        include_once "Conexao.php"; //incluir arquivo que conecta no BD
    } 

    function relatorio()
    {
        $con = Conexao::conectar();//carregar a conexão
        $cmd = $con->prepare("SELECT cliente, codmovimentacao, conteiner.codconteiner, movimentacoes.codconteiner,
        REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(movimentacao,'1','Embarque'),'2','Descarga'),'3','Gate in'),'4','Gate out'),'5','Reposicionamento'),'6','Pesagem'),'7','Scanner') 
        AS acesso FROM movimentacoes JOIN conteiner
        ON movimentacoes.codconteiner = conteiner.codconteiner");
        $cmd->execute();
        return $cmd->fetchALL(PDO::FETCH_OBJ); //retornar dados em forma de VETOR (array)
 
    }

    function relatorio2()
    {
        $con = Conexao::conectar();//carregar a conexão
        $cmd = $con->prepare("SELECT COUNT(categoria) AS [QUANTIDADE] FROM CLIENTE");
        $cmd->execute();
        return $cmd->fetchALL(PDO::FETCH_OBJ); //retornar dados em forma de VETOR (array)
 
    }

}
?>

