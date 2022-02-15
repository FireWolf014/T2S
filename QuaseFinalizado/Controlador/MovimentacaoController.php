<?php
class MovimentacaoController
{
    function abrirCadastro()
    {
        include_once "model/Conteiner.php";
        $Con = new Conteiner();
        $dadosConteiner = $Con->consultar();

        include_once "view/CadastroMovimentacao.php";//exibir a tela de cadastro
    }

    function cadastrarMovimentacao()
    {
        include_once "model/Movimentacao.php";
        $mov = new Movimentacao(); //instanciando a classe Movimentacao (Model)
        //enviando valores do form HTML para a objeto da classe Movimentacao (Model)
        $mov->codconteiner   = $_POST["codconteiner"];
        $mov->movimentacao   = $_POST["movimentacao"];
        $mov->inicio  = $_POST["inicio"];
        $mov->fim  = $_POST["fim"];
        $mov->cadastrar();//executando o método da classe Movimentacao (model)
        //exibindo uma mensagem e voltando para a página de cadastro
        echo "<script>
                alert('Dados gravados com sucesso!');
                window.location='index.php?classe=MovimentacaoController&metodo=abrirCadastro';
              </script>"; 
    }

    function abrirConsulta()
    {
        
        include_once "model/Movimentacao.php"; //incluir model
        $usu = new Movimentacao();//intancia da model
        $dadosMovimentacao = $usu->consultar(); //executar consultar da model

        include_once "view/ConsultaMovimentacao.php"; //abrir tela de consulta
    }

    function excluirMovimentacao()
    {
        include_once "model/Movimentacao.php";
        $usu = new Movimentacao();
        $usu->codmovimentacao = $_GET["codmovimentacao"];
        $usu->excluir();
        //direcionar novamente para a página de consulta
        header("Location:index.php?classe=MovimentacaoController&metodo=abrirConsulta");
    }

    function editarMovimentacao()
    {
        include_once "model/Movimentacao.php"; //incluir arquivo Movimentacao.php (MODEL)
        $usu = new Movimentacao(); //instanciar a classe Movimentacao (Model)
        $usu->codmovimentacao = $_GET["codmovimentacao"]; //enviar o código através do link (URL)
        $dadosMovimentacao = $usu->retornar(); //executar o método na MODEL que retorna os dados de 1 usuário

        //direcionar para a tela de editar cadastro de usuário
        include_once "view/EditarMovimentacao.php";
    }

    function atualizarMovimentacao()
    {
        include_once "model/Movimentacao.php";
        $usu = new Movimentacao(); //instanciando a classe Movimentacao (Model)
       
        //enviando valores do form HTML para a objeto da classe Movimentacao (Model)
        $usu->codcontainer          = $_POST["codcontainer"];
        $usu->movimentacao         = $_POST["movimentacao"];
        //$usu->inicio         = $_POST["inicio"]
        //$usu->fim        = $_POST["fim"];
        $usu->codmovimentacao    = $_POST["codmovimentacao"];

        $usu->atualizar();//executando o método da classe Movimentacao (model)
        //exibindo uma mensagem e voltando para a página de cadastro
        echo "<script>
                alert('Dados atualizado com sucesso!');
                window.location='index.php?classe=MovimentacaoController&metodo=abrirConsulta';
              </script>"; 
    }

}
?>