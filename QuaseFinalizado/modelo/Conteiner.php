<?php
class Conteiner
{
    //atributos
    private $codconteiner;
    private $cliente;
    private $numero;
    private $tipo;
    private $statu;
    private $categoria;

    //GET e SET
    function __get($atributo)
    {
        return $this->$atributo;
    }

    function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    //construtor da classe, será executado automáticamente ao instanciar esta classe
    function __construct()
    {
        include_once "Conexao.php"; //incluir arquivo que conecta no BD
    } 

    //método para cadastrar
    function cadastrar()
    {
        $con = Conexao::conectar();//carregar a conexão
        $cmd = $con->prepare("INSERT INTO conteiner (cliente, numero, tipo, statu, categoria)
        VALUES (:cliente, :numero, :tipo, :statu, :categoria)"); //preparando o comando SQL a ser executado
        //enviando os valores para os parâmetros de banco de dados
        $cmd->bindParam(":cliente",    $this->cliente);
        $cmd->bindParam(":numero",          $this->numero);
        $cmd->bindParam(":tipo",             $this->tipo);
        $cmd->bindParam(":statu",          $this->statu);
        $cmd->bindParam(":categoria",             $this->categoria);
        $cmd->execute();//executar o comando 
    } 

    function consultar()
    {
        $con = Conexao::conectar();
        $cmd = $con->prepare("SELECT codconteiner, cliente, numero, tipo, REPLACE(REPLACE(statu,'1','Cheio'),'2','Vazio') AS statu, REPLACE(REPLACE(categoria,'1','Importação'),'2','Exportação') AS categoria FROM conteiner");
        $cmd->execute();
        return $cmd->fetchALL(PDO::FETCH_OBJ);
    }

    function excluir()
    {
        $con = Conexao::conectar();
        $cmd = $con->prepare("DELETE FROM conteiner WHERE codconteiner = :codconteiner");
        $cmd->bindParam(":codconteiner", $this->codconteiner);
        $cmd->execute();
    }

    //método para atualizar
    function atualizar()
    {
        $con = Conexao::conectar();//carregar a conexão
        $cmd = $con->prepare("UPDATE conteiner SET cliente = :cliente, numero = :numero, tipo = :tipo, statu = :statu, categoria = :categoria
                             WHERE codconteiner = :codconteiner"); //preparando o comando SQL a ser executado
        
        //enviando os valores para os parâmetros de banco de dados
        $cmd->bindParam(":cliente",    $this->cliente);
        $cmd->bindParam(":numero",    $this->numero);
        $cmd->bindParam(":tipo",    $this->tipo);
        $cmd->bindParam(":statu",    $this->statu);
        $cmd->bindParam(":categoria",    $this->categoria);
        $cmd->bindParam(":codconteiner", $this->codconteiner);
        
        $cmd->execute();//executar o comando 
    }

    function excluirConteiner()
    {
        include_once "model/Conteiner.php";
        $cat = new Conteiner();
        $cat->codconteiner = $_GET["codconteiner"];
        $cat->excluir();
        //direcionar novamente para a página de consulta
        header("Location:index.php?classe=ConteinerController&metodo=abrirConsulta");
    }

    function editarConteiner()
    {
        include_once "model/Conteiner.php";
        $cat = new Conteiner();
        $cat->codconteiner = $_GET["codconteiner"];
        $dadosConteiner = $cat->retornar(); 

        //direcionar para a tela de editar cadastro de usuário
        include_once "view/EditarConteiner.php";
    }

    function atualizarConteiner()
    {
        include_once "model/Conteiner.php";
        $cat = new Conteiner();
        $cat->cliente = $_POST["cliente"];
        $cat->numero = $_POST["numero"];
        $cat->tipo = $_POST["tipo"];
        $cat->statu = $_POST["statu"];
        $cat->categoria = $_POST["categoria"];
        $cat->codconteiner  = $_POST["codconteiner"];
        $cat->atualizar();
        //exibindo uma mensagem e voltando para a página de cadastro
        echo "<script>
                alert('Dados atualizado com sucesso!');
                window.location='index.php?classe=ConteinerController&metodo=abrirConsulta';
              </script>"; 
    }

    function retornar()
    {
        $con = Conexao::conectar();//carregar a conexão
        $cmd = $con->prepare("SELECT * FROM conteiner WHERE codconteiner = :codconteiner");
        $cmd->bindParam(":codconteiner", $this->codconteiner);
        $cmd->execute();
        return $cmd->fetch(PDO::FETCH_OBJ); //retornar dados em forma de VETOR (array)
    }
}
?>