<?php
class Movimentacao
{
    //atributos
    private $codmovimentacao;
    private $movimentacao;
    private $inicio;
    private $fim;
    private $codconteiner;

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
        $cmd = $con->prepare("INSERT INTO movimentacoes (codconteiner, movimentacao, inicio, fim)
        VALUES (:codconteiner, :movimentacao, :inicio, :fim)"); //preparando o comando SQL a ser executado
        //enviando os valores para os parâmetros de banco de dados
        $cmd->bindParam(":codconteiner",    $this->codconteiner);
        $cmd->bindParam(":movimentacao",    $this->movimentacao);
        $cmd->bindParam(":inicio",          $this->inicio);
        $cmd->bindParam(":fim",             $this->fim);
        $cmd->execute();//executar o comando 
    } 

    function consultar()
    {
        $con = Conexao::conectar();
        $cmd = $con->prepare("SELECT codmovimentacao,codconteiner, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(movimentacao,'1','Embarque'),'2','Descarga'),'3','Gate in'),'4','Gate out'),'5','Reposicionamento'),'6','Pesagem'),'7','Scanner') 
        AS movimentacao, inicio, fim FROM movimentacoes");
        $cmd->execute();
        return $cmd->fetchALL(PDO::FETCH_OBJ);

    }

    //método para atualizar
    function atualizar()
    {
        $con = Conexao::conectar();//carregar a conexão
        $cmd = $con->prepare("UPDATE movimentacoes SET codconteiner = :codconteiner, movimentacao = :movimentacao, inicio = :inicio, fim = :fim
                             WHERE codmovimentacao = :codmovimentacao"); //preparando o comando SQL a ser executado
        
        //enviando os valores para os parâmetros de banco de dados
        $cmd->bindParam(":codconteiner",    $this->codconteiner);
        $cmd->bindParam(":movimentacao",    $this->movimentacao);
        $cmd->bindParam(":inicio",    $this->inicio);
        $cmd->bindParam(":fim",    $this->fim);
        $cmd->bindParam(":codmovimentacao", $this->codmovimentacao);
        
        $cmd->execute();//executar o comando 
    }

    function excluirMovimentacao()
    {
        include_once "model/Movimentacao.php";
        $cat = new Movimentacao();
        $cat->codmovimentacao = $_GET["codmovimentacao"];
        $cat->excluir();
        //direcionar novamente para a página de consulta
        header("Location:index.php?classe=MovimentacaoController&metodo=abrirConsulta");
    }

    function editarMovimentacao()
    {
        include_once "model/Movimentacao.php";
        $cat = new editarMovimentacao();
        $cat->codmovimentacao = $_GET["codmovimentacao"];
        $dadosMovimentacao = $cat->retornar(); 

        //direcionar para a tela de editar cadastro de usuário
        include_once "view/EditarMovimentacao.php";
    }

    function atualizareditarMovimentacao()
    {
        include_once "model/editarMovimentacao.php";
        $cat = new editarMovimentacao();
        $cat->codconteiner = $_POST["codconteiner"];
        $cat->movimentacao = $_POST["movimentacao"];
        $cat->inicio = $_POST["inicio"];
        $cat->fim = $_POST["fim"];
        $cat->codmovimentacao  = $_POST["codmovimentacao"];
        $cat->atualizar();
        //exibindo uma mensagem e voltando para a página de cadastro
        echo "<script>
                alert('Dados atualizado com sucesso!');
                window.location='index.php?classe=MovimentacaoController&metodo=abrirConsulta';
              </script>"; 
    }

}
?>

